<template>
    <div class="row">
        <div class="col-xl-12 mb-12 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Daftar Anggota</h3>
                        </div>
                        <div class="col text-right">
                            <a :href="this.route" class="btn btn-sm btn-primary"><i
                                    class="ni ni-fat-add text-white"></i> Tambah Anggota</a>
                        </div>
                    </div>
                </div>
                <template v-if="datas.data.length > 0">
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Aksi</th>
                                    <th scope="col">ID Anggota</th>
                                    <th></th>
                                    <th scope="col">Nama Anggota</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Tipe Keanggotaan</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Perubahan Terakhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in datas.data" :key="item.id">
                                    <th scope="row" style="width: 19%">
                                        <button v-if="item.approved_at == null" @click="app(item.id)"
                                            class="btn btn-success btn-sm"><i class="ni ni-check-bold text-white"></i>
                                            Approve</button>
                                        <a :href="edit(item.id)" class="btn btn-primary btn-sm"><i
                                                class="ni ni-check-bold text-white"></i> Edit</a>
                                        <button @click="deleted(item.id)" class="btn btn-danger btn-sm"><i
                                                class="ni ni-fat-remove text-white"></i> Hapus</button>
                                    </th>
                                    <td>
                                        {{ item.id | capitalize}}
                                    </td>
                                    <td><img class="avatar avatar-sm rounded-circle" :src="'../../../../storage/preview/'+item.anggota.foto" alt="profil"> </td>
                                    <td>{{ item.name | capitalize}}</td>
                                    <td>{{ item.anggota.jurusan.nama_jurusan }}</td>
                                    <td>{{ item.anggota_transaksi.tipe_anggota.tipe_anggota | capitalize }}</td>
                                    <td>{{ item.email | capitalize }}</td>
                                    <td>
                                        {{ item.updated_at | dateUpdate}}
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
                return `anggota/${val}/edit`;
            },

            app(val) {
                this.$swal({
                    title: 'Setujui Anggota?',
                    text: "Jika anda yakin silahkan tekan yes!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, setujui!'
                }).then((result) => {
                    if (result.value) {
                        axios.post('anggota-approve/' + val)
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
                        axios.post('/pustakawan/anggota/' + val, {
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
                axios.get('/pustakawan/anggota-search?q=' + query)
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
