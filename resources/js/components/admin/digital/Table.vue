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
                    <div class="container">
                        <form @submit.prevent="save">
                            <div class="form-group">
                                <label for="f">User ID</label>
                                <input type="text" v-model="forms.user_id" class="form-control"
                                    placeholder="Masukkan User ID">
                            </div>
                            <div class="form-group">
                                <label for="f">Pola Eksemplar Buku</label>
                                <input type="text" v-model="forms.pola_eksemplar" class="form-control"
                                    placeholder="Masukkan pola eksemplar buku">
                            </div>
                            <button :disabled="!dis" type="submit" class="btn btn-success mb-4">Pinjam Buku</button>
                        </form>
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['kode', 'kode2'],
        computed: {
            dis() {
                return this.form.kode
            },
        },
        data() {
            return {
                form: {
                    kode: '',
                },

                forms: {
                    id: '',
                    pola_eksemplar: '',
                },

                data: {},
            }
        },

        methods: {

            save() {
                if (!this.data.length) {
                    axios.post(this.kode, this.form)
                        .then(res => this.data = res.data)
                        .catch(err => console.log(err.data))
                } else {
                    axios.post(this.kode2, this.forms)
                        .then(res => this.data = res.data)
                        .catch(err => console.log(err.data))
                }
            }
        },
    }

</script>

<style scoped>

</style>
