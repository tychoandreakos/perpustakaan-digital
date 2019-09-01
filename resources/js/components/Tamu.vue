<template>
    <div>
        <form class="mb-6" @submit.prevent="simpan">
            <div class="form-group">
                <label for="keperluan">
                   NPM / ID*
                </label>
                <input autocomplete="off" type="text" v-model="form.keperluan" class="form-control" id="keperluan"
                    placeholder="Masukkan NPM / ID">
                <template v-if="err.keperluan">
                    <span class="text-danger">{{ err.keperluan[0] }}</span>
                </template>
            </div>



            <!-- Submit -->
            <template v-if="loading">
                <div class="spinner-border text-right text-success" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </template>
            <template v-else>
                <button :disabled="!check" class="btn btn-block btn-primary" type="submit">
                    Submit
                </button>
            </template>


        </form>
    </div>
</template>

<script>
    export default {

        computed: {
            check() {
                let nama = this.form.nama;
                let jurusan = this.form.jurusan;
                let alamat = this.form.alamat;
                let keperluan = this.form.keperluan;

                return nama && jurusan && alamat && keperluan;
            }
        },

        props: [
            'store'
        ],

        data() {
            return {

                form: {
                    nama: '',
                    jurusan: '',
                    alamat: '',
                    keperluan: '',
                    _method: 'POST'
                },
                loading: false,
                err: {},
            }
        },



        methods: {
            simpan() {
                this.loading = true;
                axios.post(this.store, this.form)
                    .then(res => {
                        this.$swal({
                            position: 'top-end',
                            type: 'success',
                            title: res.data.message.toUpperCase(),
                            showConfirmButton: false,
                            timer: 3000
                        });
                        this.form.nama = '';
                        this.form.jurusan = '';
                        this.form.keperluan = '';
                        this.form.alamat = '';
                        setTimeout(() => {
                            this.loading = false;
                            this.err = {};
                        }, 3200);
                    })
                    .catch(err => {
                        this.err = err.response.data.errors;
                        this.loading = false;
                    })
            }

        },

    }

</script>

<style scoped>
    * {
        overflow: hidden !important;
    }

</style>
