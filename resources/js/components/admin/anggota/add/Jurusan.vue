<template>
    <div class="container p-4">
        <h3>Tambah Data Jurusan</h3>
        <form @submit.prevent="submit">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="prefix">Nama Jurusan</label>
                        <input v-focus autocomplete="off" type="text" class="form-control" v-model="form.nama_jurusan"
                            placeholder="Nama jurusan">
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

        props: ['jurusan'],

        components: {
            SpinnerComponent: Spinner,
        },

        data() {
            return {
                form: {
                    nama_jurusan: ''
                },
                loading: false,
            }
        },

        methods: {
            submit() {
                this.loading = true,
                    axios.post(this.jurusan, this.form)
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
                            this.$emit('closeJurusan');
                            this.$emit('updateJurusan');
                            this.form.nama_jurusan = ''
                        }, 2200)

                    })
                    .catch(err => console.log(err))
            }
        },

        computed: {

            check() {
                return (
                    this.form.nama_jurusan == '' ? true : false
                );
            },
        }

    }

</script>
