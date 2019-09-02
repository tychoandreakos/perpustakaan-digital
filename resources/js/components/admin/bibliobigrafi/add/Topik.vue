<template>
    <div class="container p-4">
        <h3>Tambah Data Topik Buku</h3>
        <form @submit.prevent="submit">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="jenis">Jenis Topik</label>
                        <input v-focus autocomplete="off" type="text" class="form-control" v-model="form.jenis_topik"
                            placeholder="Jenis Topik">
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
    var randomColor = require('randomcolor');
    export default {

        props: ['topik'],

        components: {
            SpinnerComponent: Spinner,
        },

        data() {
            return {
                form: {
                    jenis_topik: '',
                    warna: randomColor()
                },
                loading: false,
            }
        },

        methods: {
            submit() {
                this.loading = true,
                    axios.post(this.topik, this.form)
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
                            this.$emit('closeTopik');
                            this.$emit('updateTopik');
                            this.form.jenis_topik = ''
                        }, 2200)

                    })
                    .catch(err => console.log(err))
            }
        },

        computed: {

            check() {
                return (
                    this.form.jenis_topik == '' ? true : false
                );
            },
        }

    }

</script>
