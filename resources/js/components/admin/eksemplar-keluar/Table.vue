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
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Kode Eksemplar</th>
                                <th scope="col">ID Anggota</th>
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
                                <td>
                                    {{ item.buku.judul | capitalize }}
                                </td>
                                <td>
                                    {{ item.pinjam_transaksi.tgl_pinjam }}
                                </td>
                                <td>
                                    {{ item.pinjam_transaksi.tanggal_habis_pinjam }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mx-auto mt-3">
                    <pagination :data="datas" @pagination-change-page="getResults"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['fetch', 'index'],
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
