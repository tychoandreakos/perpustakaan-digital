<template>
    <div class="container p-4">
        <h3>Tambah Data Jenis Bahasa</h3>
        <form @submit.prevent="submit">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="prefix">Jenis Bahasa</label>
                        <input v-focus autocomplete="off" type="text" class="form-control" v-model="form.jenis_bahasa"
                            placeholder="Jenis Bahasa">
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

        props: ['bahasa'],

        components: {
            SpinnerComponent: Spinner,
        },

        data() {
            return {
                form: {
                    jenis_bahasa: ''
                },
                loading: false,
            }
        },

        methods: {
            submit() {
                this.loading = true,
                    axios.post(this.bahasa, this.form)
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
                            this.$emit('closeBahasa');
                            this.$emit('updateBahasa');
                            this.form.jenis_bahasa = ''
                        }, 2200)

                    })
                    .catch(err => console.log(err))
            }
        },

        computed: {

            check() {
                return (
                    this.form.jenis_bahasa == '' ? true : false
                );
            },
        }

    }

</script>
