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
  import Spinner from '../tools/Spanner';
    export default {
        props: ['index'],
          components: {
            SpinnerComponent: Spinner,
        },
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
        
            }
        },


        methods: {

            save() {
                console.log(this.form.kode)
                    axios.post('sirkulasi-verifikasi/'+ this.form.kode)
                        .then(res => console.log(res))
                        .catch(err => console.log(err.data))
            }
        },
    }

</script>

<style scoped>

</style>
