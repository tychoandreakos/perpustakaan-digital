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
                    <div class="container">
                        <form @submit.prevent="save">
                            <div class="form-group">
                                <label for="f">Kode Verifikasi</label>
                                <input type="text" v-model="form.kode" class="form-control"
                                    placeholder="Masukkan Kode Verifikasi">
                            </div>
                            <button :disabled="!dis" type="submit" class="btn btn-success mb-4">Verifikasi</button>
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
                            <button type="submit" class="btn btn-success mb-4">Pinjam Buku</button>
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

                wow: {
                    user_id: '',
                    id: '',
                    pola_eksemplar: '',
                },

                data: {},
            }
        },

        created() {
            this.getData();
        },

        methods: {

            getData() {
                axios.get(this.fetch)
                    .then(res => this.option = res.data)
                    .catch(err => console.log(err))
            },

            update() {
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
                            window.location = this.index;
                        }, 3200)
                    })
                    .catch(err => console.log(err.data))
            },

            save() {
                axios.post(this.kode, this.form)
                    .then(res => this.data = res.data)
                    .catch(err => console.log(err.data))
            }
        },
    }

</script>

<style scoped>

</style>
