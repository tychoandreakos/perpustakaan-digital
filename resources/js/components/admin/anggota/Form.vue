<template>
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0" v-if="this.fetch.id">Update Data Anggota</h3>
                    <h3 class="mb-0" v-else>Tambah Data Anggota</h3>
                </div>
                <div class="col-4 text-right">
                    <a :href="this.index" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form @submit.prevent="simpan">
                <h6 class="heading-small text-muted mb-4">Anggota information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="id">ID Anggota</label>
                                <input type="text" v-model="form.id" id="id"
                                    class="form-control form-control-alternative" name="id" placeholder="ID Anggota">
                                <template v-if="err.id">
                                    <span class="text-danger">{{ err.id[0] }}</span>
                                </template>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="name">Nama Anggota</label>
                                <input type="text" v-model="form.name" id="name"
                                    class="form-control form-control-alternative" name="name"
                                    placeholder="Nama Anggota">
                                <template v-if="err.name">
                                    <span class="text-danger">{{ err.name[0] }}</span>
                                </template>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="id">Tipe Anggota</label>
                                <multiselect v-model="value" tag-placeholder="Add this as new tag"
                                    placeholder="Search or add a tag" label="tipe_anggota" track-by="tipe_anggota"
                                    :options="options"></multiselect>
                                <template v-if="err.id">
                                    <span class="text-danger">{{ err.id[0] }}</span>
                                </template>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="id">Tanggal Lahir</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input class="form-control datepicker" placeholder="Pilih tanggal lahir" type="text"
                                        value="06/20/2019">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="id">Jenis Kelamin</label>
                                <multiselect v-model="jk" :options="jkelamin" :searchable="false"
                                    :close-on-select="false" :show-labels="false" placeholder="Pilih jenis kelamin">
                                </multiselect>
                                <template v-if="err.id">
                                    <span class="text-danger">{{ err.id[0] }}</span>
                                </template>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="alamat">Alamat</label>
                                <input type="text" v-model="form.alamat" id="alamat"
                                    class="form-control form-control-alternative" name="alamat" placeholder="Alamat">
                                <template v-if="err.alamat">
                                    <span class="text-danger">{{ err.alamat[0] }}</span>
                                </template>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="email">Email</label>
                                <input type="email" v-model="form.email" id="email"
                                    class="form-control form-control-alternative" name="email" placeholder="Email">
                                <template v-if="err.email">
                                    <span class="text-danger">{{ err.email[0] }}</span>
                                </template>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="no_telp">No Telp</label>
                                <input type="text" v-model="form.no_telp" id="no_telp"
                                    class="form-control form-control-alternative" name="no_telp"
                                    placeholder="Number Telp">
                                <template v-if="err.no_telp">
                                    <span class="text-danger">{{ err.no_telp[0] }}</span>
                                </template>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="alamat">Alamat</label>
                                <textarea rows="5" type="text" v-model="form.alamat" id="alamat"
                                    class="form-control form-control-alternative" name="alamat"
                                    placeholder="Alamat"></textarea>
                                <template v-if="err.alamat">
                                    <span class="text-danger">{{ err.alamat[0] }}</span>
                                </template>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="password">Password</label>
                                <input type="password" v-model="form.password" id="password"
                                    class="form-control form-control-alternative" name="password"
                                    placeholder="***********">
                                <template v-if="err.password">
                                    <span class="text-danger">{{ err.password[0] }}</span>
                                </template>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="password_confirmation">Password
                                    Confirmation</label>
                                <input type="password" v-model="form.password_confirmation" id="password_confirmation"
                                    class="form-control form-control-alternative"
                                    password_confirmation="password_confirmation" placeholder="***********">
                                <template v-if="err.password_confirmation">
                                    <span class="text-danger">{{ err.password_confirmation[0] }}</span>
                                </template>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="id">Upload Foto Anggota</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="float-right">

                    <template v-if="loading">
                        <spinner-component></spinner-component>
                    </template>
                    <template v-else>
                        <template v-if="this.fetch.id">
                            <button :disabled="isDisabled" class="btn btn-success">
                                Perbarui</button>
                        </template>
                        <template v-else>
                            <button :disabled="isDisabled" class="btn btn-success">
                                Tambah</button>
                        </template>
                    </template>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import Spinner from '../tools/Spanner';
    import Multiselect from 'vue-multiselect'
    export default {

        components: {
            SpinnerComponent: Spinner,
            Multiselect
        },

        props: [
            'index',
            'fetch',
            'tipe'
        ],

        computed: {
            isDisabled() {
                return (this.form.id.length == '' ? true : false)
            }
        },

        data() {
            return {

                value: '',
                jk: '',
                jkelamin: ['Pria', 'Wanita'],
                options: [],


                form: {
                    id: this.fetch.id || '',
                    name: this.fetch.name || '',
                    email: this.fetch.email || '',
                    password: this.fetch.password || '',
                    password_confirmation: this.fetch.password_confirmation || '',
                    tgl_lahir: this.fetch.tgl_lahir || '',
                    tgl_registrasi: this.fetch.tgl_registrasi || '',
                    tgl_ekspired: this.fetch.tgl_ekspired || '',
                    alamat: this.fetch.alamat || '',
                    jk: this.fetch.jk || '',
                    no_telp: this.fetch.no_telp || '',
                    foto: this.fetch.foto || '',
                    tipe_anggota_id: this.fetch.tipe_anggota_id || '',
                    _method: (this.fetch.name ? 'PUT' : 'POST')
                },

                loading: false,

                err: {},
            }
        },

        created() {
            this.getTipe();
        },

        methods: {
            getTipe() {
                return axios.get(this.tipe)
                    .then(res => this.options = res.data.data)
                    .catch(err => console.log(err));
            },

            simpan() {
                this.loading = true;

                if (!this.fetch.id) {
                    // create
                    axios.post(this.fetch, this.form)
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
                } else {
                    // update
                    axios.post('/pustakawan/bahasa/' + this.fetch.id, this.form)
                        .then(res => {
                            this.$swal({
                                position: 'top-end',
                                type: 'success',
                                title: res.data.message.toUpperCase(),
                                showConfirmButton: false,
                                timer: 2500

                            });
                            setTimeout(() => {
                                window.location = this.index;
                            }, 2800);
                        })
                        .catch(err => {
                            console.log(err);
                            this.loading = false;
                        })
                }
            },
        }
    }

</script>
