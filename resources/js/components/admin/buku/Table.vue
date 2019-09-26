<template>
    <div class="row">
        <div class="col-xl-12 mb-12 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Daftar Buku</h3>
                        </div>
                    </div>
                </div>
                  <template v-if="datas.data.length > 0">
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Judul Buku</th>
                                <th scope="col">Pengarang</th>
                                <th scope="col">Penerbit</th>
                                <th scope="col">ISBN ISNN</th>
                                <th scope="col">Terakhir Diubah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in datas.data" :key="item.id">
                                <th scope="row">
                                    <!-- <a :href="edit(item.id)" class="btn btn-primary btn-sm"><i
                                            class="ni ni-check-bold text-white"></i> Edit</a> -->
                                    <button @click="deleted(item.id)" class="btn btn-danger btn-sm"><i
                                            class="ni ni-fat-remove text-white"></i> Hapus</button>
                                </th>
                                <td>
                                    <div @click="show(item.id)" class="buku">{{ item.judul | capitalize }}</div>
                                </td>
                                <td>
                                <span style="font-size: 11px" class=" mt-2 badge badge-pill badge-success" v-for="pengarang in item.buku_transaksi" :key="pengarang.item">{{ pengarang.pengarang.nama_pengarang | capitalize }}</span>
                                </td>
                                <td>{{ item.buku_transaksi.map(data => data.penerbit.nama_penerbit)[0] | capitalize }}</td>
                                <td >{{ item.isbn_isnn }}</td>
                                <td>
                                    {{ item.updated_at }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </template>

                <template v-else>
                    <h4 class="text-center">Belum Ada Data!</h4>
                </template>

                <modal name="buku">
                    <modal-component></modal-component>
                </modal>

                <div class="mx-auto mt-3
                ">
                    <pagination :limit="4" :data="datas" @pagination-change-page="getResults"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Modal from './Modal';

    export default {
        components: {
            ModalComponent: Modal,
        },

        props: ['route', 'fetch', 'index'],
        data() {
            return {
                datas: {},
            }
        },

        methods: {
            edit(val) {
                return `buku/${val}/edit`;
            },

            show() {
                this.$modal.show('buku');
            },
            hide() {
                this.$modal.hide('buku');
            },

            deleted(val) {
                this.$swal({
                    title: 'Hapus Data?',
                    text: "Data yang sudah dihapus tidak dapat dikembalikan",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, hapus!'
                }).then((result) => {
                    if (result.value) {
                        axios.post('/pustakawan/buku/' + val, {
                                _method: 'DELETE'
                            })
                            .then(res => {
                                this.$swal({
                                    position: 'top-end',
                                    type: 'success',
                                    title: res.data.message.toUpperCase(),
                                    showConfirmButton: false,
                                    timer: 1500
                                });

                                setTimeout(() => {
                                    window.location = this.index;
                                }, 1800);
                            })
                            .catch(err => console.log(err))
                    }
                });
            },

            getResults(page = 1) {
                return axios.get(this.fetch + '?page=' + page)
                    .then(res => this.datas = res.data)
                    .catch(err => console.log(err));
            }
        },

        created() {

            Fire.$on('searching', () => {
                let query = this.$parent.search;
                axios.get('/pustakawan/buku-search?q=' + query)
                    .then(res => {
                        // console.log(res)
                        this.datas = res.data
                    })
                    .catch(err => console.log(err))
            })

            this.getResults();
        },
    }

</script>

<style scoped>
    .table td,
    .table th {
        font-size: 0.8125rem;
        white-space: normal !important;
    }

    .buku {
        color: #5e72e4;
        cursor: pointer;
    }

    .buku:hover {
        color: #233dd2;
    }

</style>
