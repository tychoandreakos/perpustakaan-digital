<template>
    <div class="container p-4">
        <h3>Tambah Data Penerbit</h3>
        <form @submit.prevent="submit">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="prefix">Nama Penerbit</label>
                        <input v-focus autocomplete="off" type="text" class="form-control" v-model="form.nama_penerbit"
                            placeholder="Nama Penerbit">
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

        props: ['pengo'],

        components: {
            SpinnerComponent: Spinner,
        },

        data() {
            return {
                form: {
                    nama_penerbit: ''
                },
                loading: false,
            }
        },

        methods: {
            submit() {
                console.log(this.form);
                this.loading = true,
                    axios.post(this.pengo, this.form)
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
                            this.$emit('closePenerbit');
                            this.$emit('updatePenerbit');
                            this.form.nama_penerbit = ''
                        }, 2200)

                    })
                    .catch(err => console.log(err))
            }
        },

        computed: {

            check() {
                return (
                    this.form.nama_penerbit == '' ? true : false
                );
            },
        }

    }

</script>
