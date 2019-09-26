<template>
    <div class="row">
        <div class="col-xl-12 mb-12 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Sirkulasi Peminjaman</h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <div class="card-body">
                        <template v-if="datas">
                            <form @submit.prevent="go">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mt-4">
                                            <label for="">Cari Anggota</label>
                                            <multiselect v-model="form" :options="options" placeholder="Select one"
                                                label="id" track-by="id">
                                                <template slot="singleLabel"
                                                    slot-scope="{ option }"><strong>{{ option.id }}</strong> -
                                                    <strong>
                                                        {{ option.name }}</strong></template>
                                            </multiselect>
                                        </div>

                                        <template v-if="loading">
                                            <div class="pull-right">
                                                <spinner-component></spinner-component>
                                            </div>
                                        </template>
                                        <template v-else>
                                            <button :disabled="ds" class="btn btn-icon btn-3 btn-primary" type="submit">
                                                <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>

                                                <span class="btn-inner--text">Lanjut</span>

                                            </button>
                                        </template>
                                    </div>
                                </div>

                            </form>

                        </template>

                        <template v-else>
                            <div class="jumbotron">
                                <div class="row">
                                    <div class="col col-lg-4">
                                        <div class="form-group">
                                            <label style="font-size: 14px" for="nama">Nama Anggota</label>
                                            <h4>{{ form.name | capitalize }}</h4>
                                        </div>
                                    </div>
                                    <div class="col col-lg-4">
                                        <div class="form-group">
                                            <label style="font-size: 14px" for="nama">Email</label>
                                            <h4>{{ form.email | capitalize }}a</h4>
                                        </div>
                                    </div>
                                    <div class="col col-lg-4">
                                        <div class="form-group">
                                            <label style="font-size: 14px" for="nama">Tanggal Registrasi</label>
                                            <h4>{{ form.anggota.tgl_registrasi }}</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col col-lg-4">
                                        <div class="form-group">
                                            <label style="font-size: 14px" for="nama">ID Anggota</label>
                                            <h4>{{ form.id }}</h4>
                                        </div>
                                    </div>
                                    <div class="col col-lg-4">
                                        <div class="form-group">
                                            <label style="font-size: 14px" for="nama">Tipe Keanggotaan</label>
                                            <h4>{{ form.anggota_transaksi.tipe_anggota.tipe_anggota | capitalize }}</h4>
                                        </div>
                                    </div>
                                    <div class="col col-lg-4">
                                        <div class="form-group">
                                            <label style="font-size: 14px" for="nama">Berlaku Hingga</label>
                                            <h4>{{ form.anggota.tgl_expired }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <button @click.prevent="simpan" :disabled="disabled" type="button"
                                    class="btn btn-primary mt-3 btn-lg btn-block">Selesai
                                    Transaksi</button>
                            </div>

                            <vue-tabs>
                                <v-tab title="Peminjaman Buku">
                                    <div>
                                        <div class="card card-stats mb-4 mb-lg-0">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="label">Cari Eksemplar Buku</label>
                                                            <multiselect v-model="value" :options="option"
                                                                :multiple="true" :close-on-select="false"
                                                                :clear-on-select="false" :preserve-search="true"
                                                                placeholder="Pick some" label="pola_eksemplar"
                                                                track-by="pola_eksemplar" :preselect-first="true">
                                                                <template slot="singleLabel"
                                                                    slot-scope="{ value }"><strong>{{ value.pola_eksemplar }}</strong>
                                                                    -
                                                                    <strong>
                                                                        {{ value.pola_eksemplar }}</strong></template>
                                                            </multiselect>

                                                            <template>
                                                                <div class="table-responsive mt-3">
                                                                    <div>
                                                                        <table class="table align-items-center">
                                                                            <thead class="thead-light">
                                                                                <tr>
                                                                                    <th scope="col">
                                                                                        Pola Eksemplar
                                                                                    </th>
                                                                                    <th scope="col">
                                                                                        Judul Buku
                                                                                    </th>
                                                                                    <th scope="col">
                                                                                        Tanggal Pinjam
                                                                                    </th>
                                                                                    <th scope="col">
                                                                                        Tanggal Harus Kembali
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody class="list">
                                                                                <tr v-for="item in value"
                                                                                    :key="item.id">
                                                                                    <td>{{ item.pola_eksemplar | capitalize }}
                                                                                    </td>
                                                                                    <td>{{ item.buku.judul | capitalize }}
                                                                                    </td>
                                                                                    <td>{{ dates }}</td>
                                                                                    <td>{{ kembali(form.anggota_transaksi.tipe_anggota.masa_pinjaman_buku) }}
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>

                                                                </div>


                                                            </template>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                </v-tab>

                                <v-tab title="Pinjaman Saat Ini">
                                    <template v-if="ini.length > 0">
                                        <div class="table-responsive">
                                            <div>
                                                <table class="table align-items-center">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col" style="width: 120px;">
                                                                Aksi
                                                            </th>
                                                            <th scope="col">
                                                                Kode Eksemplar
                                                            </th>
                                                            <th scope="col">
                                                                Judul
                                                            </th>
                                                            <th scope="col">Tipe Koleksi</th>
                                                            <th scope="col">
                                                                Tanggal Pinjam
                                                            </th>
                                                            <th scope="col">Tanggal Harus Kembali</th>
                                                            <th scope="col">Status Terlambat</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="list">

                                                        <tr v-for="item in ini" :key="item.id">
                                                            <template v-if="item.status_pinjam == 1">
                                                                <th scope="row" class="name">
                                                                    <!-- <form @submit.prevent="back2(item.id)"
                                                                        style="display: inline">
                                                                        <button type="submit"
                                                                            class="btn btn-sm btn-success"
                                                                            data-toggle="tooltip"
                                                                            data-placement="bottom"
                                                                            title="Kembalikan Eksemplar Ini">
                                                                            <i class="ni ni-curved-next text-white"></i>
                                                                        </button>
                                                                    </form> -->
                                                                    <form style="display: inline"
                                                                        @submit.prevent="perpanjang(item.id, form.anggota_transaksi.tipe_anggota.masa_pinjaman_buku)">
                                                                        <button type="submit"
                                                                            class="btn btn-sm btn-primary"
                                                                            data-toggle="tooltip"
                                                                            data-placement="bottom"
                                                                            title="Perpanjang Buku">
                                                                            <i class="ni ni-fat-add text-white"></i>
                                                                        </button>
                                                                    </form>
                                                                </th>
                                                                <td>
                                                                    {{ item.bibliobigrafi.pola_eksemplar | capitalize }}
                                                                </td>
                                                                <td>
                                                                    {{ item.bibliobigrafi.buku.judul | capitalize }}
                                                                </td>

                                                                <td>
                                                                    {{ item.bibliobigrafi.klasifikasi.tipe_klasifikasi | capitalize }}
                                                                </td>
                                                                <td>
                                                                    {{ item.tgl_pinjam }}
                                                                </td>
                                                                <td>
                                                                    {{ item.tanggal_habis_pinjam }}
                                                                </td>
                                                                <td v-if="check(item.tanggal_habis_pinjam) > 0">
                                                                    <span
                                                                        class="badge badge-danger">{{ item.tanggal_habis_pinjam | convert }}</span>
                                                                </td>
                                                                <td v-else>
                                                                    <span class="badge badge-secondary">Tidak
                                                                        Ada.</span>
                                                                </td>
                                                            </template>
                                                        </tr>


                                                    </tbody>
                                                </table>

                                                <div class="mx-auto mt-3">
                                                    <pagination :limit="4" :data="ini2"
                                                        @pagination-change-page="getIni"></pagination>
                                                </div>
                                            </div>

                                        </div>
                                    </template>
                                    <template v-else>
                                        <h3 class="text-center mt-3">Belum ada data!</h3>
                                    </template>


                                </v-tab>

                                <v-tab title="Denda">
                                    <template v-if="denda.length > 0">
                                        <div class="table-responsive">
                                            <div>
                                                <table class="table align-items-center">
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
                                                            <th scope="col">Tanggal Harus Kembali</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="list">

                                                        <tr v-for="item in denda" :key="item.id">
                                                            <td>
                                                                <button-component :send="send" :item="item">
                                                                </button-component>
                                                            </td>
                                                            <td class="text-center">
                                                                <bayar-component :index="index3"
                                                                    :val="item.tanggal_habis_pinjam" :dend="form.anggota_transaksi.tipe_anggota.denda"
                                                                    :item2="item" :stores="stores"></bayar-component>
                                                            </td>
                                                            <td>
                                                                {{ form.id }}
                                                            </td>
                                                            <td>
                                                                {{ form.name | capitalize}}
                                                            </td>
                                                            <td>
                                                                {{ item.bibliobigrafi.pola_eksemplar | capitalize}}
                                                            </td>
                                                            <td>
                                                                {{ item.bibliobigrafi.buku.judul }}
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-danger">
                                                                    {{ denda3(item.tanggal_habis_pinjam, form.anggota_transaksi.tipe_anggota.denda) }}}</span>

                                                            </td>
                                                            <td>
                                                                {{ item.tgl_pinjam | dateFormat }}
                                                            </td>
                                                            <td>
                                                                {{ item.tanggal_habis_pinjam | dateFormat }}
                                                            </td>

                                                            <!-- <modal height="auto" name="eksemplar">
                                                                <denda-component :user="user" @closeDenda="hideDenda"
                                                                    @updateDenda="getResults" :denda="item"
                                                                    :total="total" :store="stores">
                                                                </denda-component>
                                                            </modal> -->
                                                        </tr>



                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </template>
                                    <template v-else>
                                        <h3 class="text-center mt-3">Belum ada data!</h3>
                                    </template>
                                </v-tab>

                                <v-tab title="Histori Peminjaman">
                                    <template v-if="pinjam.length > 0">
                                        <div class="table-responsive">
                                            <div>
                                                <table class="table align-items-center">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col">
                                                                Kode Eksemplar
                                                            </th>
                                                            <th scope="col">
                                                                Judul
                                                            </th>
                                                            <th scope="col">Tipe Koleksi</th>
                                                            <th scope="col">
                                                                Tanggal Pinjam
                                                            </th>
                                                            <th scope="col">Tanggal Dikembalikan</th>
                                                            <th scope="col">Status Terlambat</th>
                                                            <th scope="col">Status Bayar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="list">

                                                        <tr v-for="item in pinjam" :key="item.id">
                                                            <template v-if="item.status_pinjam == 0">
                                                                <td>
                                                                    {{ item.bibliobigrafi.pola_eksemplar | capitalize }}
                                                                </td>
                                                                <td>
                                                                    {{ item.bibliobigrafi.buku.judul | capitalize }}
                                                                </td>

                                                                <td>
                                                                    {{ item.bibliobigrafi.klasifikasi.tipe_klasifikasi | capitalize }}
                                                                </td>
                                                                <td>
                                                                    {{ item.tgl_pinjam }}
                                                                </td>
                                                                <td>
                                                                    {{ item.tgl_kembali }}
                                                                </td>
                                                                <td v-if="item.status_denda">
                                                                    <span
                                                                        class="badge badge-danger">{{ item.tanggal_habis_pinjam | convert }}</span>
                                                                </td>
                                                                <td v-else>
                                                                    <span class="badge badge-secondary">Tidak
                                                                        Ada.</span>
                                                                </td>
                                                                <td v-if="item.status_denda">
                                                                    <span class="badge badge-success">Lunas</span>
                                                                </td>
                                                                <td v-else>
                                                                    <span class="badge badge-secondary">Tidak
                                                                        Ada.</span>
                                                                </td>
                                                            </template>
                                                        </tr>


                                                    </tbody>
                                                </table>

                                                <div class="mx-auto mt-3">
                                                    <pagination :limit="4" :data="data4"
                                                        @pagination-change-page="getPinjam"></pagination>
                                                </div>
                                            </div>

                                        </div>
                                    </template>
                                    <template v-else>
                                        <h3 class="text-center mt-3">Belum ada data!</h3>
                                    </template>
                                </v-tab>
                            </vue-tabs>
                        </template>

                        <input type="text" hidden v-model="forms">

                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    import Spinner from '../tools/Spanner';
    import * as moment from 'moment'
    var momentRange = require('moment-range');
    // import Denda from './Denda';
    import Button from '../keterlambatan/Button';
    import Bayar from '../keterlambatan/Bayar';

    momentRange.extendMoment(moment);
    import {
        VueTabs,
        VTab
    } from 'vue-nav-tabs';
    import 'vue-nav-tabs/themes/vue-tabs.css';

    export default {
        components: {
            Multiselect,
            VueTabs,
            VTab,
            SpinnerComponent: Spinner,
            BayarComponent: Bayar,
            ButtonComponent: Button,

        },
        props: ['fetch', 'index', 'eksemplar', 'index3', 'store', 'perpanjangs', 'back', 'terlambat', 'stores2', 'saat', 'send'],
        data() {
            return {
                loading: false,
                datas: [],
                options: [],
                form: '',
                value: [],
                option: [],
                date2: '',
                pinjam: {},
                data4: {},
                denda: {},
                ini2: {},
                ini: '',
                total: '',
                stores: this.stores2,
                user: ''
            }
        },

        computed: {
            ds() {
                return (this.form != '' ? false : true)
            },

            disabled() {
                if (this.value.length > 0) {
                    return false
                } else {
                    return true;
                }
            },

            forms() {
                if (this.value.length > 0) {
                    this.user = {
                        id: this.form.id,
                        name: this.form.name
                    }

                    return {
                        user_id: this.form.id,
                        bibliobigrafi: this.value.map(r => r.id),
                        tanggal_habis_pinjam: this.date2,
                        jumlah_pinjaman: this.form.anggota_transaksi.tipe_anggota.jumlah_pinjaman
                    }
                }
            },
            dates() {
                var d = new Date(),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;

                return [year, month, day].join('-');
            },
        },

        filters: {
            dateFormat(val) {
                moment.locale('id')
                return moment(val).format('MMMM Do YYYY');
            },

            convert(val) {
                var a = moment();
                var b = val;
                return a.diff(b, 'days') + ' Hari'
            }
        },

        methods: {
            getAnggota() {
                return axios.get(this.fetch)
                    .then(res => this.options = res.data.data)
                    .catch(err => console.log(err));
            },

            check(val) {
                var a = moment();
                var b = val;
                return a.diff(b)
            },

            getResults() {
                return window.location = this.terlambat;
            },

            // getPinjaman() {
            //     axios.post('/pustakawan/p3injaman', {
            //             params: {
            //                 id: this.form.id
            //             }
            //         })
            //         .then(res => this.pinjam = res.data.data)
            //         .catch(err => console.log(err))
            // },

            showDenda() {
                this.$modal.show('eksemplar');
            },
            hideDenda() {
                this.$modal.hide('eksemplar');
            },

            denda3(val, dend) {
                var a = moment();
                var b = val;
                this.total = a.diff(b, 'days') * dend;
                return a.diff(b, 'days') + ' Hari'
            },

            geDenda() {
                axios.get('denda-user/' + this.form.id)
                    .then(res => this.denda = res.data.data)
                    .catch(err => console.log(err));
            },

            back2(id) {

                this.$swal({
                    title: 'Kembalian Buku?',
                    text: "Apakah anda ingin mengembalikan buku ini?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Kembalikan!'
                }).then((result) => {
                    axios.post(this.back, {
                        id,
                    })
                    then(res => {
                            this.$swal({
                                position: 'top-end',
                                type: 'success',
                                title: res.data.message.toUpperCase(),
                                showConfirmButton: false,
                                timer: 3000
                            });
                        })
                        .catch(err => console.log(err))
                })
            },

            perpanjang(id, duration) {

                this.$swal({
                    title: 'Perpanjang Buku?',
                    text: "Apakah anda ingin memperpanjang durasi buku ini?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Perpanjang!'
                }).then((result) => {
                    axios.post(this.perpanjangs, {
                            id,
                            duration,
                        })
                        .then(res => {
                            this.$swal({
                                position: 'top-end',
                                type: 'success',
                                title: res.data.message.toUpperCase(),
                                showConfirmButton: false,
                                timer: 3000
                            });

                            setTimeout(() => {
                                window.location = this.index;
                            }, 3200)
                        })
                        .catch(err => console.log(err))
                })
            },

            simpan() {
                this.loading = true;
                axios.post(this.store, this.forms)
                    .then(res => {
                        if (res.data.condition) {
                            this.$swal({
                                position: 'top-end',
                                type: 'success',
                                title: res.data.message.toUpperCase(),
                                showConfirmButton: false,
                                timer: 3000
                            });

                            setTimeout(() => {
                                window.location = this.index;
                            }, 3200)
                        } else {
                            this.$swal({
                                position: 'center',
                                type: 'warning',
                                title: res.data.message.toUpperCase(),
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    })
                    .catch(err => {
                        this.err = err.response.data.errors;
                        this.loading = false;
                    })
            },
            kembali(val) {
                var d = new Date(),
                    month = '' + (d.getMonth() + 1),
                    day = '' + (d.getDate() + val),
                    year = d.getFullYear();

                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;

                this.date2 = [year, month, day].join('-');
                return [year, month, day].join('-');
            },

            getEksemplar() {
                return axios.get(this.eksemplar)
                    .then(res => this.option = res.data.data)
                    .catch(err => console.log(err));
            },

            getIni(page = 1) {
                axios.get(this.saat + '?page=' + page, {
                        params: {
                            id: this.form.id
                        }
                    })
                    .then(res => {
                        this.ini = res.data.data
                        this.ini2 = res.data
                    })
                    .catch(err => console.log(err))
            },

            getPinjam(page = 1) {
                axios.get('/pustakawan/pinjaman' + '?page=' + page, {
                        params: {
                            id: this.form.id
                        }
                    })
                    .then(res => {
                        this.pinjam = res.data.data
                        this.data4 = res.data
                    })
                    .catch(err => console.log(err))
                setTimeout(() => {
                    this.datas = false;
                    this.loading = false
                }, 2000);
            },


            go() {
                this.loading = true;
                this.geDenda();

                // pinjaman saat ini
                this.getIni();

                // pinjaman
                this.getPinjam();


            },
        },


        created() {
            this.getAnggota();
            this.getEksemplar();
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

    .pagination {
        display: flex;
        justify-content: center;
    }

</style>
