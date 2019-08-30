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
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['kode'],
        computed: {
            dis() {
                return this.form.kode
            }
        },
        data() {
            return {
                form: {
                    kode: '',
                }
            }
        },

        methods: {

            save() {
                axios.get(this.kode, this.form)
                    .then(res => console.log(res))
                    .catch(err => console.log(err.data))
            }
        },
    }

</script>

<style scoped>

</style>
