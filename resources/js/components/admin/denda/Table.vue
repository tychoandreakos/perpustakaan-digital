<template>
    <div class="row">
        <div class="col-xl-12 mb-12 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Daftar Denda</h3>
                        </div>
                        <div class="col text-right">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-danger dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Opsi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" :href="this.harian">Cetak Data Harian</a>
                                    <a class="dropdown-item" :href="this.mingguan">Cetak Data Mingguan</a>
                                    <a class="dropdown-item" :href="this.tahunan">Cetak Data Tahunan</a>
                                </div>
                            </div>
                            <a :href="this.bulanan" class="btn btn-sm btn-primary">Cetak Data Bulanan</a>
                        </div>
                    </div>
                </div>
                <template v-if="datas.data.length > 0">
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID / NPM</th>
                                    <th scope="col">Nama Anggota</th>
                                    <th scope="col">Kode Eksemplar</th>
                                    <th scope="col">Buku</th>
                                    <th scope="col">Total Hari Terlambat</th>
                                    <th scope="col">Jumlah Bayar</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Perubahan Terakhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in datas.data" :key="item.id">
                                    <td>
                                        {{ item.user.id }}
                                    </td>
                                    <td>
                                        {{ item.user.name | capitalize}}
                                    </td>
                                    <td>
                                        {{ item.pinjam_transaksi.bibliobigrafi.pola_eksemplar.toUpperCase() }}
                                    </td>
                                    <td>{{ item.buku.judul | capitalize }}</td>
                                    <td class="text-danger">
                                        {{ denda(item.pinjam_transaksi.tanggal_habis_pinjam, item.user.anggota_transaksi.tipe_anggota.denda) }}
                                    </td>
                                    <td>
                                        {{ item.jumlah_bayar }}
                                    </td>
                                    <td>
                                        <span class="badge badge-success">Lunas</span>
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
                    <pagination :data="datas" @pagination-change-page="getResults"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import * as moment from 'moment'
    var momentRange = require('moment-range');
    momentRange.extendMoment(moment);
    export default {
        props: ['route', 'fetch', 'index', 'harian', 'tahunan', 'mingguan', 'bulanan'],
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
            denda(val, dend) {
                var a = moment();
                var b = val;
                this.total = a.diff(b, 'days') * dend;
                return a.diff(b, 'days') + ' Hari'
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
                axios.get('/pustakawan/denda-search?q=' + query)
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
