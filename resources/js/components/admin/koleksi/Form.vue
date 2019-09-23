<template>
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0" v-if="this.fetch.tipe_koleksi">Update Data Koleksi</h3>
                    <h3 class="mb-0" v-else>Tambah Data Koleksi</h3>
                </div>
                <div class="col-4 text-right">
                    <a :href="this.index" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form @submit.prevent="simpan">
                <h6 class="heading-small text-muted mb-4">Koleksi information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="tipe_koleksi">Tipe Koleksi</label>
                                <input autocomplete="off" type="text" v-model="form.tipe_koleksi" id="tipe_koleksi"
                                    class="form-control form-control-alternative" name="tipe_koleksi"
                                    placeholder="Nama Penerbit">
                                <template v-if="err.tipe_koleksi">
                                    <span class="text-danger">{{ err.tipe_koleksi[0] }}</span>
                                </template>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="tipe_koleksi">Nama GMD</label>
                                <input type="text" v-model="form.tipe_koleksi" id="tipe_koleksi"
                                    class="form-control form-control-alternative" name="tipe_koleksi"
                                    placeholder="NAMA GMD">
                                <template v-if="err.tipe_koleksi">
                                    <span class="text-danger">{{ err.tipe_koleksi[0] }}</span>
                                </template>
                            </div>
                        </div> -->
                    </div>
                </div>

                <div class="float-right">

                    <template v-if="loading">
                        <spinner-component></spinner-component>
                    </template>
                    <template v-else>
                        <template v-if="this.fetch.tipe_koleksi">
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
                return (this.form.tipe_koleksi.length == '' ? true : false)
            }
        },

        data() {
            return {
                form: {
                    tipe_koleksi: this.fetch.tipe_koleksi || '',
                    _method: (this.fetch.tipe_koleksi ? 'PUT' : 'POST')
                },

                loading: false,

                err: {},
            }
        },

        methods: {
            simpan() {
                this.loading = true;

                if (!this.fetch.tipe_koleksi) {
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
                    axios.post('/pustakawan/koleksi /' + this.fetch.id, this.form)
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
