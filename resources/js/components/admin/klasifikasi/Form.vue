<template>
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0" v-if="this.fetch.tipe_klasifikasi">Update Data Klasifikasi</h3>
                    <h3 class="mb-0" v-else>Tambah Data Klasifikasi</h3>
                </div>
                <div class="col-4 text-right">
                    <a :href="this.index" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form @submit.prevent="simpan">
                <h6 class="heading-small text-muted mb-4">Klasifikasi information</h6>
                <div class="pl-lg-4">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="kode_klasifikasi">Kode Klasifikasi</label>
                                <input autocomplete="off" type="text" v-model="form.kode_klasifikasi" id="kode_klasifikasi"
                                    class="form-control form-control-alternative" name="kode_klasifikasi"
                                    placeholder="Kode Klasifikasi">
                                <template v-if="err.kode_klasifikasi">
                                    <span class="text-danger">{{ err.kode_klasifikasi[0] }}</span>
                                </template>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="tipe_klasifikasi">Jenis Klasifikasi</label>
                                <input autocomplete="off" type="text" v-model="form.tipe_klasifikasi" id="tipe_klasifikasi"
                                    class="form-control form-control-alternative" name="tipe_klasifikasi"
                                    placeholder="Tipe Klasifikasi">
                                <template v-if="err.tipe_klasifikasi">
                                    <span class="text-danger">{{ err.tipe_klasifikasi[0] }}</span>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="float-right">

                    <template v-if="loading">
                        <spinner-component></spinner-component>
                    </template>
                    <template v-else>
                        <template v-if="this.fetch.tipe_klasifikasi">
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
    export default {

        components: {
            SpinnerComponent: Spinner,
        },

        props: [
            'index',
            'fetch',
        ],

        computed: {
            isDisabled() {
                return (this.form.tipe_klasifikasi.length == '' ? true : false)
            }
        },

        data() {
            return {
                form: {
                    tipe_klasifikasi: this.fetch.tipe_klasifikasi || '',
                    kode_klasifikasi: this.fetch.kode_klasifikasi || '',
                    _method: (this.fetch.tipe_klasifikasi ? 'PUT' : 'POST')
                },

                loading: false,

                err: {},
            }
        },

        methods: {
            simpan() {
                this.loading = true;

                if (!this.fetch.tipe_klasifikasi) {
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
                    axios.post('/pustakawan/klasifikasi/' + this.fetch.id, this.form)
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
