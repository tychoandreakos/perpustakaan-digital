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
                                            <multiselect v-model="form" :options="options"
                                                placeholder="Select one" label="id" track-by="id">
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
                                    <template v-if="pinjam.length > 0">
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
                                                        <th scope="col">Tanggal Kembali</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">

                                                    <tr v-for="item in pinjam" :key="item.id">
                                                        <th scope="row" class="name">
                                                            <button type="button" class="btn btn-sm btn-success"
                                                                data-toggle="tooltip" data-placement="bottom"
                                                                title="Kembalikan Eksemplar Ini">
                                                                <i class="ni ni-curved-next text-white"></i>
                                                            </button>
                                                            <button @click="perpanjang(

                                                                item.bibliobigrafi.pola_eksemplar,
                                                                item.user_id,
                                                                item.bibliobigrafi_id,
                                                                item.tgl_pinjam,
                                                                item.status_pinjam
                                                                
                                                                )" type="button" class="btn btn-sm btn-primary"
                                                                data-toggle="tooltip" data-placement="bottom"
                                                                title="Perpanjang Buku">
                                                                <i class="ni ni-fat-add text-white"></i>
                                                            </button>
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

                                <v-tab title="Denda">
                                    Third tab content
                                </v-tab>

                                <v-tab title="Histori Peminjaman">
                                    Third tab content
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
        },
        props: ['fetch', 'index', 'eksemplar', 'store', 'perpanjangs'],
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
            }
        },

        computed: {
            ds() {
                return (this.form != '' ? false : true)
            },

            disabled(){
                if (this.value.length > 0) {
                    return false
                } else {
                    return true;
                }
            },

            forms() {
                return {
                    user_id: this.form.id,
                    bibliobigrafi: this.value.map(r => r.id),
                    tanggal_habis_pinjam: this.date2,
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

        methods: {
            getAnggota() {
                return axios.get(this.fetch)
                    .then(res => this.options = res.data.data)
                    .catch(err => console.log(err));
            },


            getPinjaman() {
                axios.post('/pustakawan/pinjaman', {
                        params: {
                            id: this.form.id
                        }
                    })
                    .then(res => this.pinjam = res.data.data)
                    .catch(err => console.log(err))
            },

            perpanjang(id, user_id, bibliobigrafi_id, tgl_pinjam, status_pinjam) {
                axios.post(this.perpanjangs, {
                    params: {
                        id,
                        user: this.form.anggota_transaksi.tipe_anggota.masa_pinjaman_buku,
                        user_id,
                        bibliobigrafi_id,
                        tgl_pinjam,
                        status_pinjam
                    }
                }).
                then(res => {
                        axios.get('/pustakawan/pinjaman', {
                                params: {
                                    id: this.form.id
                                }
                            })
                            .then(res => this.pinjam = res.data.data)
                            .catch(err => console.log(err))
                    })
                    .catch(err => console.log(err))
            },

            simpan() {
                this.loading = true;
                axios.post(this.store, this.forms)
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



            go() {
                this.loading = true;
                axios.get('/pustakawan/pinjaman', {
                        params: {
                            id: this.form.id
                        }
                    })
                    .then(res => this.pinjam = res.data.data)
                    .catch(err => console.log(err))
                setTimeout(() => {
                    this.datas = false;
                    this.loading = false
                }, 2000);

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

</style>
