<template>
    <div class="row">
        <div class="col-xl-12 mb-12 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Daftar Eksemplar</h3>
                        </div>
                    </div>
                </div>
                <template v-if="datas.data.length > 0">
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush text-center">
                            <thead class="thead-light text-center">
                                <tr>
                                    <th scope="col">Aksi</th>
                                    <th scope="col">Kode Eksemplar</th>
                                    <th scope="col">Judul</th>
                                    <!-- <th scope="col">Tipe Koleksi</th>
                                <th scope="col">Lokasi</th> -->
                                    <th scope="col">Klasifikasi</th>
                                    <th scope="col">Terakhir Dipinjam</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in datas.data" :key="item.id">
                                    <th scope="row" style="width: 10%">
                                         <button @click="deleted(item.id)" class="btn btn-danger btn-sm">Hapus</button>
                                    </th>
                                    <td class="text-center">
                                        {{ item.pola_eksemplar | capitalize}}
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col col-lg-12 text-left">
                                                {{ item.buku.judul }}
                                            </div>
                                            <!-- <div class="mt-2" v-for="buku_transaksi in item.buku.buku_transaksi"
                                            :key="buku_transaksi.id">
                                            <span
                                                class="ml-2 badge badge-pill badge-success">{{ buku_transaksi.pengarang.nama_pengarang }}
                                            </span>
                                        </div> -->
                                        </div>
                                    </td>
                                    <td>
                                        {{ item.klasifikasi.tipe_klasifikasi }}
                                    </td>
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

                <div class="mx-auto mt-3">
                    <pagination :limit="4" :data="datas" @pagination-change-page="getResults"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['route', 'fetch', 'index'],
        data() {
            return {
                datas: {},
            }
        },

         filters: {
            dateFormat(val) {
                moment.locale('id')
                return moment(val).format('MMMM Do YYYY');
            }
        },

        methods: {
            edit(val) {
                return `transaksi-eksemplar/${val}/edit`;
            },

            getResults(page = 1) {
                return axios.get(this.fetch + '?page=' + page)
                    .then(res => this.datas = res.data)
                    .catch(err => console.log(err));
            },

             deleted(val) {
                this.$swal({
                    title: 'Hapus Data?',
                    text: "Jika anda menghapus data ini, data lain kemungkinan besar akan ikut terhapus",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, hapus!'
                }).then((result) => {
                    if (result.value) {
                        axios.post('/pustakawan/transaksi-eksemplar/' + val, {
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
        },

        created() {

            Fire.$on('searching', () => {
                let query = this.$parent.search;
                axios.get('/pustakawan/transaksi-eksemplar?q=' + query)
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

</style>
