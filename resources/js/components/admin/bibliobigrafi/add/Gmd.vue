<template>
    <div class="container p-4">
        <h3>Tambah Data GMD</h3>
        <form @submit.prevent="submit">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="prefix">Kode GMD</label>
                        <input autocomplete="off" type="text" class="form-control" v-model="form.kode_gmd" v-focus
                            placeholder="Kode Gmd">

                               <div class="form-group mt-2">
                            <label for="prefix">Nama GMD</label>
                            <input autocomplete="off" type="text" class="form-control" v-model="form.nama_gmd"
                                placeholder="Nama Gmd">
                        </div>
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

        props: ['gmd'],

        components: {
            SpinnerComponent: Spinner,
        },

        data() {
            return {
                form: {
                    kode_gmd: '',
                    nama_gmd: ''
                },
                loading: false,
            }
        },

        methods: {
            submit() {
                this.loading = true,
                    axios.post(this.gmd, this.form)
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
                            this.$emit('closeGmd');
                            this.$emit('updateGmd');
                            this.form.nama_gmd = ''
                            this.form.kode_gmd = ''
                        }, 2200)

                    })
                    .catch(err => console.log(err))
            }
        },

        computed: {

            check() {
                return (
                    this.form.nama_gmd == '' ? true : false
                );
            },
        }

    }

</script>
