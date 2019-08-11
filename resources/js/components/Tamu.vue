<template>
    <div>
        <h3 class="mt-5 ml-3 text-center">
            Daftar Tamu
        </h3>

        <form>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <div class="input-group mb-4">
                            <input class="form-control" placeholder="Masukkan Nama" type="text">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama">Jurusan</label>
                         <multiselect v-model="value" :options="options" :custom-label="nameWithLang" placeholder="Select one" label="name" track-by="name"></multiselect>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nama">Alamat</label>
                        <div class="input-group mb-4">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                placeholder="Write a large text here ..."></textarea>

                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col col-md-3">
                    <button class="btn btn-primary">Simpan</button>
                </div>

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

    export default {
        components: {
            appModal: Modal,
            Multiselect
        },

        data() {
            return {
                value: {
                    name: 'Vue.js',
                    language: 'JavaScript'
                },
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
                }
           
        }
    }

</script>

<style>

</style>
