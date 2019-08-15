<template>
    <div class="container p-4">
        <h3>Tambah Data Koleksi</h3>
        <form @submit.prevent="submit">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="prefix">Tipe Koleksi</label>
                        <input v-focus autocomplete="off" type="text" class="form-control" v-model="form.tipe_koleksi"
                            placeholder="Tipe Koleksi">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col col-md-12">
                    <template v-if="loading">
                        <spinner-component></spinner-component>
                    </template>
                    <template v-else>
                        <button type="submit" :disabled="check" class="btn btn-5 btn-success">Simpan</button>
                    </template>

                </div>

            </div>
        </form>


    </div>
</template>

<script>
    import Spinner from '../../tools/Spanner';
    export default {

        props: ['koleksi'],

        components: {
            SpinnerComponent: Spinner,
        },

        data() {
            return {
                form: {
                    tipe_koleksi: ''
                },
                loading: false,
            }
        },

        methods: {
            submit() {
                console.log(this.form);
                this.loading = true,
                    axios.post(this.koleksi, this.form)
                    .then(res => {
                        this.$swal({
                            position: 'top-end',
                            type: 'success',
                            title: res.data.message.toUpperCase(),
                            showConfirmButton: false,
                            timer: 2000
                        });
                        setTimeout(() => {
                            this.loading = false
                            this.$emit('closeKoleksi');
                            this.$emit('updateKoleksi');
                            this.form.tipe_koleksi = ''
                        }, 2200)

                    })
                    .catch(err => console.log(err))
            }
        },

        computed: {

            check() {
                return (
                    this.form.tipe_koleksi == '' ? true : false
                );
            },
        }

    }

</script>
