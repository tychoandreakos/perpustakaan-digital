<template>
    <div class="row">
        <div class="col-xl-12 mb-12 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Daftar Tipe Anggota</h3>
                        </div>
                        <div class="col text-right">
                            <a :href="this.route" class="btn btn-sm btn-primary"><i
                                    class="ni ni-fat-add text-white"></i> Tambah Tipe Anggota</a>
                        </div>
                    </div>
                </div>
                <template v-if="datas.data.length > 0">
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Aksi</th>
                                    <th scope="col">Tipe Anggota</th>
                                    <th scope="col">Jumlah Pinjaman</th>
                                    <th scope="col">Masa Berlaku</th>
                                    <th scope="col">Batas Perpanjangan</th>
                                    <th scope="col">Denda</th>
                                    <th scope="col">Perubahan Terakhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in datas.data" :key="item.id">
                                    <th scope="row" style="width: 19%">
                                        <a :href="edit(item.id)" class="btn btn-primary btn-sm"><i
                                                class="ni ni-check-bold text-white"></i> Edit</a>
                                        <button @click="deleted(item.id)" class="btn btn-danger btn-sm"><i
                                                class="ni ni-fat-remove text-white"></i> Hapus</button>
                                    </th>
                                    <td>
                                        {{ item.tipe_anggota | capitalize }}
                                    </td>
                                    <td>
                                        {{ item.jumlah_pinjaman }} Buku
                                    </td>
                                    <td>
                                        {{ item.masa_berlaku_anggota }} Tahun
                                    </td>
                                    <td>
                                        {{ item.batas_perpanjangan_anggota }} Kali
                                    </td>
                                    <td>
                                        RP. {{ item.denda }}
                                    </td>
                                    <td>
                                        {{ item.updated_at | dateUpdate }}
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
                    <pagination :data="datas" @pagination-change-page="getResults"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import * as moment from 'moment'
    export default {
        props: ['route', 'fetch', 'index'],
        data() {
            return {
                datas: {},
            }
        },

        filters: {
            dateUpdate(val) {
                moment.locale('id')
                return moment().format('MMMM Do YYYY, h:mm:ss a')
            }
        },


        methods: {
            edit(val) {
                return `tipe-anggota/${val}/edit`;
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
                        axios.post('/pustakawan/tipe-anggota/' + val, {
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
                axios.get('/pustakawan/tipe-anggota-search?q=' + query)
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

</style>
