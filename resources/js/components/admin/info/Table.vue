<template>
    <div class="row">
        <div class="col-xl-12 mb-12 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Info Perpustakaan</h3>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="card card-stats mb-4 mb-lg-0">
                        <div class="card-body">
                            <form @submit.prevent="simpan">
                                <!-- <div class="form-group">
                                    <label for="">Jadwal Perpustakaan</label>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <select class="form-control">
                                                    <option value="senin">Senin</option>
                                                    <option value="selasa">Selasa</option>
                                                    <option value="rabu">Rabu</option>
                                                    <option value="kamis">Kamis</option>
                                                    <option value="jumat">Jumat</option>
                                                    <option value="sabtu">Sabtu</option>
                                                    <option value="minggu">Minggu</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <select class="form-control">
                                                    <option value="senin">Senin</option>
                                                    <option value="selasa">Selasa</option>
                                                    <option value="rabu">Rabu</option>
                                                    <option value="kamis">Kamis</option>
                                                    <option value="jumat">Jumat</option>
                                                    <option value="sabtu">Sabtu</option>
                                                    <option value="minggu">Minggu</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <select class="form-control">
                                                    <option value="06:00">06:00</option>
                                                    <option value="06:30">06:30</option>
                                                    <option value="07:00">07:00</option>
                                                    <option value="07:30">07:30</option>
                                                    <option value="08:00">08:00</option>
                                                    <option value="08:30">08:30</option>
                                                    <option value="09:00">09:00</option>
                                                    <option value="09:30">09:30</option>
                                                    <option value="10:00">10:00</option>
                                                    <option value="10:30">10:30</option>
                                                    <option value="11:00">11:00</option>
                                                    <option value="11:30">11:30</option>
                                                    <option value="12:00">12:00</option>
                                                    <option value="12:30">12:30</option>
                                                    <option value="13:00">13:00</option>
                                                    <option value="13:30">13:30</option>
                                                    <option value="14:00">14:00</option>
                                                    <option value="14:30">14:30</option>
                                                    <option value="15:00">15:00</option>
                                                    <option value="15:30">15:30</option>
                                                    <option value="16:00">16:00</option>
                                                    <option value="16:30">16:30</option>
                                                    <option value="17:00">17:00</option>
                                                    <option value="17:30">17:30</option>
                                                    <option value="18:00">18:00</option>
                                                    <option value="18:30">18:30</option>
                                                    <option value="19:00">19:00</option>
                                                    <option value="19:30">19:30</option>
                                                    <option value="20:00">20:00</option>
                                                    <option value="20:30">20:30</option>
                                                    <option value="21:00">21:00</option>
                                                    <option value="21:30">21:30</option>
                                                    <option value="22:00">22:00</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <select class="form-control">
                                                    <option value="06:00">06:00</option>
                                                    <option value="06:30">06:30</option>
                                                    <option value="07:00">07:00</option>
                                                    <option value="07:30">07:30</option>
                                                    <option value="08:00">08:00</option>
                                                    <option value="08:30">08:30</option>
                                                    <option value="09:00">09:00</option>
                                                    <option value="09:30">09:30</option>
                                                    <option value="10:00">10:00</option>
                                                    <option value="10:30">10:30</option>
                                                    <option value="11:00">11:00</option>
                                                    <option value="11:30">11:30</option>
                                                    <option value="12:00">12:00</option>
                                                    <option value="12:30">12:30</option>
                                                    <option value="13:00">13:00</option>
                                                    <option value="13:30">13:30</option>
                                                    <option value="14:00">14:00</option>
                                                    <option value="14:30">14:30</option>
                                                    <option value="15:00">15:00</option>
                                                    <option value="15:30">15:30</option>
                                                    <option value="16:00">16:00</option>
                                                    <option value="16:30">16:30</option>
                                                    <option value="17:00">17:00</option>
                                                    <option value="17:30">17:30</option>
                                                    <option value="18:00">18:00</option>
                                                    <option value="18:30">18:30</option>
                                                    <option value="19:00">19:00</option>
                                                    <option value="19:30">19:30</option>
                                                    <option value="20:00">20:00</option>
                                                    <option value="20:30">20:30</option>
                                                    <option value="21:00">21:00</option>
                                                    <option value="21:30">21:30</option>
                                                    <option value="22:00">22:00</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>

                                 <div class="form-group">
                                    <label for="">Jadwal Hari Weekend</label>
                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <select class="form-control">
                                                    <option value="jumat">Jumat</option>
                                                    <option value="sabtu">Sabtu</option>
                                                    <option value="minggu">Minggu</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <select class="form-control">
                                                    <option value="06:00">06:00</option>
                                                    <option value="06:30">06:30</option>
                                                    <option value="07:00">07:00</option>
                                                    <option value="07:30">07:30</option>
                                                    <option value="08:00">08:00</option>
                                                    <option value="08:30">08:30</option>
                                                    <option value="09:00">09:00</option>
                                                    <option value="09:30">09:30</option>
                                                    <option value="10:00">10:00</option>
                                                    <option value="10:30">10:30</option>
                                                    <option value="11:00">11:00</option>
                                                    <option value="11:30">11:30</option>
                                                    <option value="12:00">12:00</option>
                                                    <option value="12:30">12:30</option>
                                                    <option value="13:00">13:00</option>
                                                    <option value="13:30">13:30</option>
                                                    <option value="14:00">14:00</option>
                                                    <option value="14:30">14:30</option>
                                                    <option value="15:00">15:00</option>
                                                    <option value="15:30">15:30</option>
                                                    <option value="16:00">16:00</option>
                                                    <option value="16:30">16:30</option>
                                                    <option value="17:00">17:00</option>
                                                    <option value="17:30">17:30</option>
                                                    <option value="18:00">18:00</option>
                                                    <option value="18:30">18:30</option>
                                                    <option value="19:00">19:00</option>
                                                    <option value="19:30">19:30</option>
                                                    <option value="20:00">20:00</option>
                                                    <option value="20:30">20:30</option>
                                                    <option value="21:00">21:00</option>
                                                    <option value="21:30">21:30</option>
                                                    <option value="22:00">22:00</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <select class="form-control">
                                                    <option value="06:00">06:00</option>
                                                    <option value="06:30">06:30</option>
                                                    <option value="07:00">07:00</option>
                                                    <option value="07:30">07:30</option>
                                                    <option value="08:00">08:00</option>
                                                    <option value="08:30">08:30</option>
                                                    <option value="09:00">09:00</option>
                                                    <option value="09:30">09:30</option>
                                                    <option value="10:00">10:00</option>
                                                    <option value="10:30">10:30</option>
                                                    <option value="11:00">11:00</option>
                                                    <option value="11:30">11:30</option>
                                                    <option value="12:00">12:00</option>
                                                    <option value="12:30">12:30</option>
                                                    <option value="13:00">13:00</option>
                                                    <option value="13:30">13:30</option>
                                                    <option value="14:00">14:00</option>
                                                    <option value="14:30">14:30</option>
                                                    <option value="15:00">15:00</option>
                                                    <option value="15:30">15:30</option>
                                                    <option value="16:00">16:00</option>
                                                    <option value="16:30">16:30</option>
                                                    <option value="17:00">17:00</option>
                                                    <option value="17:30">17:30</option>
                                                    <option value="18:00">18:00</option>
                                                    <option value="18:30">18:30</option>
                                                    <option value="19:00">19:00</option>
                                                    <option value="19:30">19:30</option>
                                                    <option value="20:00">20:00</option>
                                                    <option value="20:30">20:30</option>
                                                    <option value="21:00">21:00</option>
                                                    <option value="21:30">21:30</option>
                                                    <option value="22:00">22:00</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>

                                 <div class="form-group">
                                    <label for="">Jam Istirahat</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <select class="form-control">
                                                    <option value="06:00">06:00</option>
                                                    <option value="06:30">06:30</option>
                                                    <option value="07:00">07:00</option>
                                                    <option value="07:30">07:30</option>
                                                    <option value="08:00">08:00</option>
                                                    <option value="08:30">08:30</option>
                                                    <option value="09:00">09:00</option>
                                                    <option value="09:30">09:30</option>
                                                    <option value="10:00">10:00</option>
                                                    <option value="10:30">10:30</option>
                                                    <option value="11:00">11:00</option>
                                                    <option value="11:30">11:30</option>
                                                    <option value="12:00">12:00</option>
                                                    <option value="12:30">12:30</option>
                                                    <option value="13:00">13:00</option>
                                                    <option value="13:30">13:30</option>
                                                    <option value="14:00">14:00</option>
                                                    <option value="14:30">14:30</option>
                                                    <option value="15:00">15:00</option>
                                                    <option value="15:30">15:30</option>
                                                    <option value="16:00">16:00</option>
                                                    <option value="16:30">16:30</option>
                                                    <option value="17:00">17:00</option>
                                                    <option value="17:30">17:30</option>
                                                    <option value="18:00">18:00</option>
                                                    <option value="18:30">18:30</option>
                                                    <option value="19:00">19:00</option>
                                                    <option value="19:30">19:30</option>
                                                    <option value="20:00">20:00</option>
                                                    <option value="20:30">20:30</option>
                                                    <option value="21:00">21:00</option>
                                                    <option value="21:30">21:30</option>
                                                    <option value="22:00">22:00</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div> -->


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="alamat">Hari Regular</label>
                                            <input id="alamat" class="form-control" v-model="form.regular"
                                                placeholder="Alamat">
                                            <template v-if="err.regular">
                                                <span class="text-danger">{{ err.regular[0] }}</span>
                                            </template>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="alamat">Jam Regular</label>
                                            <input id="alamat" class="form-control" v-model="form.waktu_regular"
                                                placeholder="Alamat">
                                            <template v-if="err.waktu_regular">
                                                <span class="text-danger">{{ err.waktu_regular[0] }}</span>
                                            </template>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="alamat">Hari Weekend</label>
                                            <input id="alamat" class="form-control" v-model="form.weekend"
                                                placeholder="Alamat">
                                            <template v-if="err.weekend">
                                                <span class="text-danger">{{ err.weekend[0] }}</span>
                                            </template>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="alamat">Jam Weekend</label>
                                            <input id="alamat" class="form-control" v-model="form.waktu_weekend"
                                                placeholder="Alamat">
                                            <template v-if="err.waktu_weekend">
                                                <span class="text-danger">{{ err.waktu_weekend[0] }}</span>
                                            </template>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="alamat">Jam Istirahat</label>
                                    <input id="alamat" class="form-control" v-model="form.waktu_istirahat" placeholder="Alamat">
                                    <template v-if="err.waktu_istirahat">
                                        <span class="text-danger">{{ err.waktu_istirahat[0] }}</span>
                                    </template>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="alamat">Alamat</label>
                                    <textarea id="alamat" class="form-control" v-model="form.alamat"
                                        placeholder="Alamat"></textarea>
                                    <template v-if="err.alamat">
                                        <span class="text-danger">{{ err.alamat[0] }}</span>
                                    </template>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="no_telp">No Telepon</label>
                                    <input type="text" v-model="form.no_telp" id="no_telp"
                                        class="form-control form-control-alternative" name="no_telp"
                                        placeholder="No Telepon">
                                    <template v-if="err.no_telp">
                                        <span class="text-danger">{{ err.no_telp[0] }}</span>
                                    </template>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="pustakawan">Pustakawan</label>
                                    <input type="text" v-model="form.pustakawan" id="pustakawan"
                                        class="form-control form-control-alternative" name="pustakawan"
                                        placeholder="Nama Pustakawan">
                                    <template v-if="err.pustakawan">
                                        <span class="text-danger">{{ err.pustakawan[0] }}</span>
                                    </template>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="email">Email</label>
                                    <input type="text" v-model="form.email" id="email"
                                        class="form-control form-control-alternative" name="email"
                                        placeholder="Email Kampus">
                                    <template v-if="err.email">
                                        <span class="text-danger">{{ err.email[0] }}</span>
                                    </template>
                                </div>

                                <div class="float-right">

                                    <template v-if="loading">
                                        <spinner-component></spinner-component>
                                    </template>
                                    <template v-else>
                                        <button class="btn btn-success">
                                            Perbaharui</button>
                                    </template>
                                </div>
                            </form>


                        </div>
                    </div>


                </div>


            </div>
        </div>

        <input type="hidden" :value="alamat">
        <input type="hidden" :value="no_telp">
        <input type="hidden" :value="pustakawan">
        <input type="hidden" :value="email">
        <input type="hidden" :value="regular">
        <input type="hidden" :value="waktu_regular">
        <input type="hidden" :value="weekend">
        <input type="hidden" :value="waktu_weekend">
        <input type="hidden" :value="waktu_istirahat">

    </div>
</template>

<script>
    import Spinner from '../tools/Spanner';
    export default {
        props: ['route', 'fetch', 'index'],
        components: {
            SpinnerComponent: Spinner,
        },
        computed: {
            alamat() {
                return this.form.alamat = this.datas.alamat;
            },
            no_telp() {
                return this.form.no_telp = this.datas.no_telp;
            },
            regular() {
                return this.form.regular = this.datas.regular;
            },
            waktu_regular() {
                return this.form.waktu_regular = this.datas.waktu_regular;
            },
            weekend() {
                return this.form.weekend = this.datas.weekend;
            },
            waktu_weekend() {
                return this.form.waktu_weekend = this.datas.waktu_weekend;
            },
            pustakawan() {
                return this.form.pustakawan = this.datas.pustakawan;
            },
            email() {
                return this.form.email = this.datas.email;
            },
            waktu_istirahat() {
                return this.form.waktu_istirahat = this.datas.waktu_istirahat;
            }
        },

        data() {
            return {
                datas: {},
                form: {
                    alamat: '',
                    no_telp: '',
                    pustakawan: '',
                    email: '',
                    regular: '',
                    waktu_regular: '',
                    weekend: '',
                    waktu_weekend: '',
                    waktu_istirahat: '',
                    _method: 'PUT'
                },
                err: {},
                loading: false,
            }
        },

        methods: {
            simpan() {
                this.loading = true;
                // update
                axios.post('/pustakawan/info/' + this.datas.id, this.form)
                    .then(res => {
                        this.$swal({
                            position: 'top-end',
                            type: 'success',
                            title: res.data.message.toUpperCase(),
                            showConfirmButton: false,
                            timer: 2500

                        });
                        setTimeout(() => {
                            this.loading = false;
                        }, 2800);
                    })
                    .catch(err => {
                        this.err = err;
                        this.loading = false;
                    })
            },

            getResults(page = 1) {
                return axios.get(this.fetch + '?page=' + page)
                    .then(res => this.datas = res.data)
                    .catch(err => console.log(err));
            }
        },

        created() {
            this.getResults();


        },
    }

</script>

<style scoped>

</style>
