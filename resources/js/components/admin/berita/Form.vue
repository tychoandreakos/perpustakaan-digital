<template>
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0" v-if="this.fetch.judul">Update Data Berita</h3>
                    <h3 class="mb-0" v-else>Tambah Data Berita</h3>
                </div>
                <div class="col-4 text-right">
                    <a :href="this.index" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form @submit.prevent="simpan">
                <h6 class="heading-small text-muted mb-4">Berita information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="judul">Judul Berita</label>
                                <input type="text" autocomplete="off" v-model="form.judul" id="judul"
                                    class="form-control form-control-alternative" name="judul"
                                    placeholder="Judul Berita">
                                <template v-if="err.judul">
                                    <span class="text-danger">{{ err.judul[0] }}</span>
                                </template>
                            </div>
                        </div>
                         <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="catatan">Upload Gambar</label>
                                <div class="custom-file">
                                    <input type="file" v-on:change="onImageChange" class="custom-file-input"
                                        id="validatedCustomFile">
                                    <label class="custom-file-label" for="validatedCustomFile">{{ img }}</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                    <!-- <span class="text-danger mt-2">{{ img }}</span> -->
                                </div>
                                <template v-if="err.catatan">
                                    <span class="text-danger">{{ err.catatan[0] }}</span>
                                </template>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="isi">Isi Berita</label>
                                <ckeditor :editor="editor" v-model.lazy="form.isi" :config="editorConfig"></ckeditor>
                                <template v-if="err.isi">
                                    <span class="text-danger">{{ err.isi[0] }}</span>
                                </template>
                            </div>
                        </div>
                       
                        <!-- <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="judul">Nama GMD</label>
                                <input type="text" v-model="form.judul" id="judul"
                                    class="form-control form-control-alternative" name="judul"
                                    placeholder="NAMA GMD">
                                <template v-if="err.judul">
                                    <span class="text-danger">{{ err.judul[0] }}</span>
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
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
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
                return (this.form.judul.length == '' ? true : false)
            }
        },

        data() {
            return {
                form: {
                    judul: this.fetch.judul || '',
                    isi: this.fetch.isi || '',
                    image: this.fetch.img || '',
                    old: this.fetch.img || '',
                    _method: (this.fetch.judul ? 'PUT' : 'POST')
                },

                editor: ClassicEditor,
                editorConfig: {
                    // The configuration of the editor.
                },

                loading: false,
                img: this.fetch.img || 'Pilih Gambar Cover Berita',

                err: {},
            }
        },

        methods: {
            onImageChange(e) {
                this.img = e.target.files[0].name;
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.form.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
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
                    axios.post('/pustakawan/berita/' + this.fetch.id, this.form)
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
