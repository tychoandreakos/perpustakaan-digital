<template>
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0" v-if="this.fetch.jenis_topik">Update Data Topik</h3>
                    <h3 class="mb-0" v-else>Tambah Data Topik</h3>
                </div>
                <div class="col-4 text-right">
                    <a :href="this.index" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form @submit.prevent="simpan">
                <h6 class="heading-small text-muted mb-4">Topik information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="jenis_topik">Jenis Topik</label>
                                <input type="text" autocomplete="off" v-model="form.jenis_topik" id="jenis_topik"
                                    class="form-control form-control-alternative" name="jenis_topik"
                                    placeholder="Judul Topik">
                                <template v-if="err.Jenis_topik">
                                    <span class="text-danger">{{ err.jenis_topik[0] }}</span>
                                </template>
                            </div>
                        </div>

                    </div>
                </div>

                <input type="hidden" name="" v-model="som">

                <div class="float-right">

                    <template v-if="loading">
                        <spinner-component></spinner-component>
                    </template>
                    <template v-else>
                        <template v-if="this.fetch.jenis_topik">
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
    var randomColor = require('randomcolor');

    export default {

        components: {
            SpinnerComponent: Spinner,
        },

        props: [
            'index',
            'fetch',
            'datas'
        ],

        computed: {
            isDisabled() {
                return (this.form.jenis_topik.length == '' ? true : false)
            },

        },

        data() {
            return {
                form: {
                    jenis_topik: this.fetch.jenis_topik || '',
                    warna: this.fetch.warna || randomColor(),
                    _method: (this.fetch.jenis_topik ? 'PUT' : 'POST')
                },

                loading: false,

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

                if (!this.fetch.jenis_topik) {
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
                    axios.post('/pustakawan/topik/' + this.fetch.id, this.form)
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
