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
                                        <button style="display: inline" @click="email(item.id)" type="button" class="btn btn-sm btn-white"
                                            data-toggle="tooltip" data-placement="top"
                                            :title="'Kirim email ke '+item.user.email">
                                            Kirim Email
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button @click="showDenda" style="display: inline" type="button"
                                            class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top"
                                            title="Bayar Disini">
                                            RP. {{ total }}
                                        </button>

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

                                    <modal height="auto" name="eksemplar">
                                        <denda-component @closeDenda="hideDenda" @updateDenda="getResults"
                                            :denda="item" :total="total" :store="stores">
                                        </denda-component>
                                    </modal>
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
    import Denda from './Denda';

    export default {
        props: ['fetch', 'store', 'send'],
        data() {
            return {
                datas: {},
                total: '',
                stores: this.store
            }
        },

        components:{
            DendaComponent: Denda,
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

            showDenda() {
                this.$modal.show('eksemplar');
            },
            hideDenda() {
                this.$modal.hide('eksemplar');
            },

            email(item) {
                axios.post(this.send, {
                    id: item
                })
                .then(res => {

                })
                .catch(err => console.log(err));
            },

            denda(val, dend) {
                var a = moment();
                var b = val;
                this.total = a.diff(b, 'days') * dend;
                return a.diff(b, 'days') + ' Hari'
            }
        },

        created() {

            Fire.$on('searching', () => {
                let query = this.$parent.search;
                axios.get('/pustakawan/terlambat-search?q=' + query)
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
