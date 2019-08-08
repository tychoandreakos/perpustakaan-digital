<template>
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0" v-if="this.fetch.judul">Update Data Buku</h3>
                    <h3 class="mb-0" v-else>Tambah Data Buku</h3>
                </div>
                <div class="col-4 text-right">
                    <a :href="this.index" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form @submit.prevent="simpan">
                <h6 class="heading-small text-muted mb-4">Buku information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="judul">Judul</label>
                                <input autocomplete="off" type="text" v-model="form.judul" id="judul"
                                    class="form-control form-control-alternative" name="judul" placeholder="KODE GMD">
                                <template v-if="err.judul">
                                    <span class="text-danger">{{ err.judul[0] }}</span>
                                </template>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="edisi">Edisi</label>
                                <input autocomplete="off" type="text" v-model="form.edisi" id="edisi"
                                    class="form-control form-control-alternative" name="edisi" placeholder="NAMA GMD">
                                <template v-if="err.edisi">
                                    <span class="text-danger">{{ err.edisi[0] }}</span>
                                </template>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="isbn_isnn">ISBN ISNN</label>
                                <input type="text" v-model="form.isbn_isnn" id="isbn_isnn"
                                    class="form-control form-control-alternative" name="isbn_isnn"
                                    placeholder="KODE GMD">
                                <template v-if="err.isbn_isnn">
                                    <span class="text-danger">{{ err.isbn_isnn[0] }}</span>
                                </template>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="deskripsi">Deskripsi Fisik</label>
                                <input type="text" v-model="form.deskripsi_fisik" id="deskripsi"
                                    class="form-control form-control-alternative" name="deskripsi"
                                    placeholder="KODE GMD">
                                <template v-if="err.deskripsi">
                                    <span class="text-danger">{{ err.deskripsi[0] }}</span>
                                </template>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="judul_seri">Judul Seri</label>
                                <input autocomplete="off" type="text" v-model="form.judul_seri" id="judul_seri"
                                    class="form-control form-control-alternative" name="judul_seri"
                                    placeholder="KODE GMD">
                                <template v-if="err.judul_seri">
                                    <span class="text-danger">{{ err.judul_seri[0] }}</span>
                                </template>
                            </div>
                        </div>
                    </div>

                     <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="catatan">Catatan</label>
                                <textarea autocomplete="off" name="catatan" class="form-control form-control-alternative" v-model="form.catatan" id="catatan" placeholder="" cols="30" rows="10"></textarea>
                                <template v-if="err.catatan">
                                    <span class="text-danger">{{ err.catatan[0] }}</span>
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
                        <template v-if="this.fetch.judul">
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
                return (this.form.judul.length == '' && this.form.edisi == '' ? true : false)
            }
        },

        data() {
            return {
                form: {
                    judul: this.fetch.judul || '',
                    edisi: this.fetch.edisi || '',
                    isbn_isnn: this.fetch.isbn_isnn || '',
                    deskripsi_fisik: this.fetch.deskripsi_fisik || '',
                    judul_seri: this.fetch.judul_seri || '',
                    catatan: this.fetch.catatan || '',
                    _method: (this.fetch.judul ? 'PUT' : 'POST')
                },

                loading: false,

                err: {},
            }
        },

        methods: {
            simpan() {
                this.loading = true;

                if (!this.fetch.judul) {
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
                    axios.post('/pustakawan/buku/' + this.fetch.id, this.form)
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
