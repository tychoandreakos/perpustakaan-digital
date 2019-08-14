<template>
    <div class="container p-4">
        <h3>Tambah Data Lokasi Rak</h3>
        <form @submit.prevent="submit">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="prefix">Kode Lokasi</label>
                        <input v-focus autocomplete="off" type="text" class="form-control" v-model="form.kode_lokasi"
                            placeholder="Kode Lokasi">
                    </div>

                     <div class="form-group">
                        <label for="prefix">Nama Lokasi</label>
                        <input v-focus autocomplete="off" type="text" class="form-control" v-model="form.nama_lokasi"
                            placeholder="Nama Lokasi">
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

        props: ['lokasi3'],

        components: {
            SpinnerComponent: Spinner,
        },

        data() {
            return {
                form: {
                    kode_lokasi: '',
                    nama_lokasi: ''
                },
                loading: false,
            }
        },

        methods: {
            submit() {
                this.loading = true,
                    axios.post(this.lokasi3, this.form)
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
                            this.$emit('closeLokasi');
                            this.$emit('updateLokasi');
                            this.form.nama_lokasi = ''
                        }, 2200)

                    })
                    .catch(err => console.log(err))
            }
        },

        computed: {

            check() {
                return (
                    this.form.nama_lokasi == '' ? true : false
                );
            },
        }

    }

</script>
