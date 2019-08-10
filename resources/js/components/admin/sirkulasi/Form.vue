<template>
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0" v-if="this.fetch.jenis_bahasa">Update Data Bahasa</h3>
                    <h3 class="mb-0" v-else>Tambah Data Bahasa</h3>
                </div>
                <div class="col-4 text-right">
                    <a :href="this.index" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form @submit.prevent="simpan">
                <h6 class="heading-small text-muted mb-4">Bahasa information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="jenis_bahasa">Jenis Bahasa</label>
                                <input type="text" v-model="form.jenis_bahasa" id="jenis_bahasa"
                                    class="form-control form-control-alternative" name="jenis_bahasa"
                                    placeholder="Nama Penerbit">
                                <template v-if="err.jenis_bahasa">
                                    <span class="text-danger">{{ err.jenis_bahasa[0] }}</span>
                                </template>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="jenis_bahasa">Nama GMD</label>
                                <input type="text" v-model="form.jenis_bahasa" id="jenis_bahasa"
                                    class="form-control form-control-alternative" name="jenis_bahasa"
                                    placeholder="NAMA GMD">
                                <template v-if="err.jenis_bahasa">
                                    <span class="text-danger">{{ err.jenis_bahasa[0] }}</span>
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
                        <template v-if="this.fetch.jenis_bahasa">
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
                return (this.form.jenis_bahasa.length == '' ? true : false)
            }
        },

        data() {
            return {
                form: {
                    jenis_bahasa: this.fetch.jenis_bahasa || '',
                    _method: (this.fetch.jenis_bahasa ? 'PUT' : 'POST')
                },

                loading: false,

                err: {},
            }
        },

        methods: {
            simpan() {
                this.loading = true;

                if (!this.fetch.jenis_bahasa) {
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
