<template>
    <div>
        <h3 class="mt-5 ml-3 text-center">
            Daftar Tamu
        </h3>
        <h6 class="text-center">Harap isi identitas diri anda dibawah ini.</h6>

        <form @submit.prevent="simpan">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <div class="input-group mb-4">
                            <input class="form-control" v-model.lazy="form.nama" placeholder="Masukkan Nama"
                                type="text">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama">Jurusan</label>
                        <multiselect v-model="jurusan" :options="options" :custom-label="nameWithLang"
                            placeholder="Select one" label="name" track-by="name"></multiselect>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nama">Keperluan</label>
                        <multiselect v-model="keperluan" :options="options" :custom-label="nameWithLang"
                            placeholder="Select one" label="name" track-by="name"></multiselect>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nama">Alamat</label>
                        <div class="input-group mb-4">
                            <textarea refs="h" v-model.lazy="form.alamat" class="form-control"
                                id="exampleFormControlTextarea1" rows="3"
                                placeholder="Write a large text here ..."></textarea>

                        </div>
                    </div>
                </div>
            </div>

            <template v-if="err.nama">
                <li><span class="text-danger">{{ err.nama[0] }}</span></li>
                <br>
            </template>
            <template v-if="err.alamat">
                <li><span class="text-danger">{{ err.alamat[0] }}</span></li>
                <br>
            </template>
            <template v-if="err.jurusan">
                <li><span class="text-danger">{{ err.jurusan[0] }}</span></li>
                <br>
            </template>
            <template v-if="err.keperluan">
                <li><span class="text-danger">{{ err.keperluan[0] }}</span></li>
                <br>
            </template>

            <div class="row">
                <template v-if="loading">
                    <spinner-component></spinner-component>
                </template>
                <template v-else>
                    <div class="col col-md-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </template>

                <div class="col col-md-9">
                    <app-modal>
                        <button type="button" class="btn btn-block btn-outline-warning mb-3" data-toggle="modal"
                            data-target="#modal-notification">Cari Koleksi Buku</button>
                    </app-modal>
                </div>

            </div>


        </form>
    </div>
</template>

<script>
    import Modal from './Modal';
    import Multiselect from 'vue-multiselect'
    import Spinner from './admin/tools/Spanner';

    import {
        setTimeout
    } from 'timers';

    export default {
        components: {
            appModal: Modal,
            Multiselect,
            SpinnerComponent: Spinner,
        },

        computed: {
            form() {
                return {
                    nama: '',
                    jurusan: this.jurusan.name,
                    keperluan: this.keperluan.name,
                    alamat: '',
                }
            },
        },

        props: [
            'store'
        ],

        data() {
            return {
                jurusan: {
                    name: 'Vue.js',
                    language: 'JavaScript'
                },

                keperluan: {
                    name: 'Vue.js',
                    language: 'JavaScript'
                },

                loading: false,
                err: {},

                options: [{
                        name: 'Vue.js',
                        language: 'JavaScript'
                    },
                    {
                        name: 'Rails',
                        language: 'Ruby'
                    },
                    {
                        name: 'Sinatra',
                        language: 'Ruby'
                    },
                    {
                        name: 'Laravel',
                        language: 'PHP'
                    },
                    {
                        name: 'Phoenix',
                        language: 'Elixir'
                    }
                ]
            }
        },



        methods: {
            nameWithLang({
                name,
                language
            }) {
                return `${name} — [${language}]`
            },

            simpan() {
                this.loading = true;
                axios.post(this.store, this.form)
                    .then(res => {
                        this.$swal({
                            position: 'top-end',
                            type: 'success',
                            title: res.data.message.toUpperCase(),
                            showConfirmButton: false,
                            timer: 3000
                        });
                        this.nama = '';
                        this.jurusan = '';
                        this.keperluan = '';
                        this.alamat = '';
                        setTimeout(() => {
                            this.loading = false;
                            this.err = {};
                        }, 3200);
                    })
                    .catch(err => {
                        this.err = err.response.data.errors;
                        this.loading = false;
                    })
            }

        },

    }

</script>

<style>

</style>
