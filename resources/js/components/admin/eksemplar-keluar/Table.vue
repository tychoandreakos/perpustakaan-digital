<template>
    <div class="row">
        <div class="col-xl-12 mb-12 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Daftar Eksemplar Keluar</h3>
                        </div>
                    </div>
                </div>
                <template v-if="datas.data.length > 0">
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Kode Eksemplar</th>
                                    <th scope="col">ID Anggota</th>
                                    <th scope="col">Nama Anggota</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Tanggal Pinjam</th>
                                    <th scope="col">Tanggal Kembali</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in datas.data" :key="item.id">
                                    <td>
                                        {{ item.pola_eksemplar | capitalize}}
                                    </td>
                                    <td>
                                        {{ item.pinjam_transaksi.user_id }}
                                    </td>
                                    <td>{{ item.pinjam_transaksi.user.name | capitalize }}</td>
                                    <td class="text-left">
                                        {{ item.buku.judul | capitalize }}
                                    </td>
                                    <td>
                                        {{ item.pinjam_transaksi.tgl_pinjam | dateFormat }}
                                    </td>
                                    <td>
                                        {{ item.pinjam_transaksi.tanggal_habis_pinjam | dateFormat }}
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
        props: ['fetch', 'index'],
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
            getResults(page = 1) {
                return axios.get(this.fetch + '?page=' + page)
                    .then(res => this.datas = res.data)
                    .catch(err => console.log(err));
            }
        },

        created() {

            Fire.$on('searching', () => {
                let query = this.$parent.search;
                axios.get('/pustakawan/eksemplar-keluar-search?q=' + query)
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
