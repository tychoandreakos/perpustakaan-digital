<template>
    <section>

        <!-- Content -->
        <div class="container d-flex flex-column">
            <div class="row align-items-center justify-content-between no-gutters min-vh-100">
                <div class="col-12 col-md-5 align-self-stretch">

                    <!-- Image (mobile) -->
                    <img src="http://localhost:8000/img/photos/photo-5.jpg" class="d-md-none img-cover" alt="...">

                    <!-- Image -->
                    <div class="d-none d-md-block vw-50 h-100 float-right bg-cover"
                        style="background-image: url(http://localhost:8000/img/covers/cover-10.jpg);"></div>

                </div>
                <div class="col-12 col-md-6 py-8 py-md-11">

                    <!-- Heading -->
                    <h2 class="font-weight-bold text-center mb-2">
                        Halo, Elang Indra
                    </h2>

                    <!-- Text -->
                    <p class="font-size-lg text-center text-muted mb-0">
                        Lengkapi Data!
                    </p>

                    <!-- Divider -->
                    <hr class="hr-sm my-6 my-md-8 border-gray-300">

                    <!-- Form -->
                    <form @submit.prevent="save">
                        <div class="form-group mb-5">

                            <!-- Label -->
                            <label for="contactName">
                                Jurusan
                            </label>

                            <!-- Input -->
                            <input type="text" v-model="form.jurusan" class="form-control" id="contactName"
                                placeholder="Full name">

                        </div>
                        <div class="form-group mb-5">

                            <!-- Label -->
                            <label for="contactEmail">
                                Tanggal Lahir
                            </label>

                            <!-- Input -->
                            <datepicker :bootstrap-styling="true" :typeable="true" :required="true"
                                placeholder="Masukkan Tanggal Lahir" v-model="date" name="uniquename"></datepicker>

                        </div>
                        <div class="form-group mb-5">

                            <!-- Label -->
                            <label for="contactEmail">
                                Alamat
                            </label>

                            <!-- Input -->
                            <textarea type="text" v-model="form.alamat" class="form-control"
                                placeholder="Masukkan alamat lengkap"></textarea>

                        </div>
                        <div class="form-group mb-5">

                            <!-- Label -->
                            <label for="contactEmail">
                                Jenis Kelamin
                            </label>

                            <!-- Input -->
                            <multiselect v-model="form.jk" :options="jkelamin" :searchable="false"
                                :close-on-select="false" :show-labels="false" placeholder="Pilih jenis kelamin">
                            </multiselect>
                            <template v-if="err.id">
                                <span class="text-danger">{{ err.jk[0] }}</span>
                            </template>

                        </div>
                        <div class="form-group mb-5">

                            <!-- Label -->
                            <label for="contactEmail">
                                No Telepon
                            </label>

                            <!-- Input -->
                            <input type="text" v-model="form.no_telp" class="form-control"
                                placeholder="Masukkan No Telp">

                        </div>
                        <div class="form-group mb-0">

                            <!-- Submit -->
                            <button class="btn btn-block btn-primary lift">
                                Simpan
                            </button>

                        </div>
                    </form>

                    <input type="hidden" name="" v-model="this.date2">

                </div>
            </div> <!-- / .row -->
        </div>
    </section>

</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    import Multiselect from 'vue-multiselect'
    import * as moment from 'moment'
    export default {
        props: ['name', 'store', 'anggota'],
        components: {
            Datepicker,
            Multiselect
        },

        methods: {
            save() {
                axios.post(this.store, this.form)
                    .then(res => {
                        this.$swal({
                            position: 'top-end',
                            type: 'success',
                            title: res.data.message.toUpperCase(),
                            showConfirmButton: false,
                            timer: 3000
                        });

                        // setTimeout(() => {
                        //     window.location = this.index;
                        // }, 3200)
                    })
                    .catch(err => console.log(err))
            }
        },

        computed: {
            date2() {
                var dateTime = this.date;
                return this.form.tgl_lahir = dateTime = moment(dateTime).format("YYYY-MM-DD");
            },

            jk() {
                return (typeof (this.anggota.jk) == 'undefined' ? this.form.jk = (this.anggota.jk == 0 ? 'Pria' :
                    'Wanita') : '');
            }


        },

        data() {
            return {
                jkelamin: ['Pria', 'Wanita'],
                err: {},
                date: (typeof (this.anggota.tgl_lahir) == 'undefined' ? this.anggota.tgl_lahir : ''),
                form: {
                    jurusan: (typeof (this.anggota.jurusan) == 'undefined' ? this.anggota.jurusan.toUpperCase() : ''),
                    tgl_lahir: '',
                    alamat: (typeof (this.anggota.alamat) == 'undefined' ? this.anggota.alamat : ''),
                    jk: this.jk,
                    no_telp: (typeof (this.anggota.no_telp) == 'undefined' ? this.anggota.no_telp : ''),
                }
            }
        }
    }

</script>

<style>

</style>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>