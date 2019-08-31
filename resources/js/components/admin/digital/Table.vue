<template>
    <div class="row">
        <div class="col-xl-12 mb-12 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Sirkulasi Digital</h3>
                        </div>
                    </div>
                </div>
                <template v-if="!data.length">
                <div class="pr-5 pl-5">
                    <div v-if="error" class="alert alert-danger" role="alert">
                        Kode verifikasi tidak dapat ditemukan
                    </div>
                </div>
                    <div class="container">
                        <form @submit.prevent="save">
                            <div class="form-group">
                                <label for="f">Kode Verifikasi</label>
                                <input type="text" v-model="form.kode" class="form-control"
                                    placeholder="Masukkan Kode Verifikasi">
                            </div>
                            <template v-if="loading">
                                <spinner-component></spinner-component>
                            </template>
                            <template v-else>
                                <button :disabled="!dis" type="submit" class="btn btn-success mb-4">Verifikasi</button>
                            </template>
                        </form>
                    </div>
                </template>
                <template v-else>
                    <input type="hidden" v-model="user_id">
                    <input type="hidden" v-model="id">
                    <input type="hidden" v-model="eksemplar">
                    <div class="container">
                        <form @submit.prevent="update">

                            <div class="form-group">
                                <label for="f">Pola Eksemplar Buku</label>
                                <multiselect v-model="pola_eksemplar" :options="option" placeholder="Select one"
                                    label="pola_eksemplar" track-by="pola_eksemplar">
                                    <template slot="singleLabel"
                                        slot-scope="{ option }"><strong>{{ option.pola_eksemplar | capitalize}}</strong>
                                    </template>
                                </multiselect>
                            </div>
                            <template v-if="loading">
                                <spinner-component></spinner-component>
                            </template>
                            <template v-else>
                                <button type="submit" class="btn btn-success mb-4">Pinjam Buku</button>
                            </template>
                        </form>
                    </div>
                </template>

            </div>
        </div>

    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    import Spinner from '../tools/Spanner';
    export default {
        props: ['kode', 'kode2', 'index', 'fetch'],
        components: {
            Multiselect,
            SpinnerComponent: Spinner,
        },
        computed: {
            dis() {
                return this.form.kode
            },

            //  dos() {
            //     return this.form.pola_eksemplar
            // },

            id() {
                return this.wow.id = this.data[0].id
            },

            user_id() {
                return this.wow.user_id = this.data[0].user_id
            },

            eksemplar() {
                return this.wow.pola_eksemplar = this.pola_eksemplar.pola_eksemplar
            }
        },
        data() {
            return {
                form: {
                    kode: '',
                },

                pola_eksemplar: '',

                option: {},
                loading: false,
                error: false,

                wow: {
                    user_id: '',
                    id: '',
                    pola_eksemplar: '',
                },

                data: {},
            }
        },

        methods: {

            getData() {
                axios.post(this.fetch, this.form)
                    .then(res => this.option = res.data)
                    .catch(err => console.log(err))
            },

            update() {
                this.loading = true;
                axios.post(this.kode2, this.wow)
                    .then(res => {
                        this.$swal({
                            position: 'top-end',
                            type: 'success',
                            title: res.data.message.toUpperCase(),
                            showConfirmButton: false,
                            timer: 3000
                        });

                        setTimeout(() => {
                            this.loading = false;
                            window.location = this.index;
                        }, 3200)
                    })
                    .catch(err => {
                        this.loading = false;
                        this.error = true;
                    })
            },

            save() {
                this.loading = true;
                axios.post(this.kode, this.form)
                    .then(res => {
                        setTimeout(() => {
                            this.getData();
                            this.data = res.data;
                            this.loading = false;
                            this.error = true;
                        }, 2000);
                    })
                    .catch(err => {
                        this.loading = false;
                    })
            }
        },
    }

</script>

<style scoped>

</style>
