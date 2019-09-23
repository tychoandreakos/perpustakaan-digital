<template>
    <div class="row">
        <div class="col-xl-12 mb-12 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Daftar Pengunjung</h3>
                        </div>
                    </div>
                </div>
                <template v-if="datas.data.length > 0">
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">NPM / ID</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Jam Masuk</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in datas.data" :key="item.id">
                                    <td>
                                        {{ item.user_id }}
                                    </td>
                                    <td>
                                        {{ item.user.name | capitalize}}
                                    </td>

                                    <template v-if="item.user.anggota.jurusan">
                                        <td>
                                            {{ item.user.anggota.jurusan.nama_jurusan| capitalize}}
                                        </td>
                                    </template>
                                    <template v-else>
                                        <td class="small font-weight-light">
                                            Tidak ada data!
                                        </td>
                                    </template>
                                    
                                    <td>
                                        {{ item.user.email | capitalize}}
                                    </td>

                                     <template v-if="item.user.anggota.alamat">
                                        <td>
                                            {{ item.user.anggota.alamat| capitalize}}
                                        </td>
                                    </template>
                                    <template v-else>
                                        <td class="small font-weight-light">
                                            Tidak ada data!
                                        </td>
                                    </template>


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
        props: ['fetch'],
        data() {
            return {
                datas: {},
            }
        },

        methods: {
            getResults(page = 1) {
                return axios.get(this.fetch + '?page=' + page)
                    .then(res => this.datas = res.data)
                    .catch(err => console.log(err));
            }
        },

        created() {

            Fire.$on('searching', () => {
                let query = this.$parent.search;
                axios.get('/pustakawan/pengunjung-search?q=' + query)
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