<template>
    <div class="row">
        <div class="col-xl-12 mb-12 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Daftar Buku Terlambat</h3>
                        </div>
                    </div>
                </div>
                <template v-if="datas.data.length > 0">
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width: 250px" scope="col">Aksi</th>
                                    <th scope="col">Jumlah Denda</th>
                                    <th scope="col">ID / NPM</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">No Eksemplar</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Total Hari Terlambat</th>
                                    <th scope="col">Tanggal Pinjam</th>
                                    <th scope="col">Tanggal Kembali</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in datas.data" :key="item.id">
                                    <td>
                                        <button-component :send="send" :item="item"></button-component>
                                    </td>
                                    <td class="text-center">
                                        <bayar-component :index="index" :val="item.tanggal_habis_pinjam" :dend="item.user.anggota_transaksi.tipe_anggota.denda" :item2="item" :stores="stores"></bayar-component>
                                    </td>
                                    <td>
                                        {{ item.user.id }}
                                    </td>
                                    <td>
                                        {{ item.user.name | capitalize}}
                                    </td>
                                    <td>
                                        {{ item.bibliobigrafi.pola_eksemplar | capitalize}}
                                    </td>
                                    <td>
                                        {{ item.bibliobigrafi.buku.judul }}
                                    </td>
                                    <td class="text-danger">
                                        {{ denda(item.tanggal_habis_pinjam, item.user.anggota_transaksi.tipe_anggota.denda) }}
                                    </td>
                                    <td>
                                        {{ item.tgl_pinjam | dateFormat }}
                                    </td>
                                    <td>
                                        {{ item.tanggal_habis_pinjam | dateFormat }}
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
    var momentRange = require('moment-range');
    momentRange.extendMoment(moment);

    import Button from './Button';
    import Bayar from './Bayar';


    export default {
        props: ['fetch', 'store', 'send', 'index'],
        data() {
            return {
                datas: {},
                stores: this.store,
                loading: false,
            }
        },

        components: {
            BayarComponent: Bayar,
            ButtonComponent: Button,

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
            },


            denda(val, dend) {
                var a = moment();
                var b = val;
                return a.diff(b, 'days') + ' Hari'
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
