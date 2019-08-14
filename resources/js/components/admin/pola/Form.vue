<template>
    <div class="container p-4">
        <h3>Tambah Pola Eksemplar</h3>
        <form @submit.prevent="submit">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="prefix">Prefix</label>
                        <input autocomplete="off" type="text" class="form-control" v-model="form.prefix" id="prefix"
                            placeholder="prefix">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="suffix">Suffix</label>
                        <input autocomplete="off" type="text" class="form-control" v-model="form.suffix" id="suffix"
                            placeholder="suffix">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="serial">Panjang Serial Number</label>
                        <input autocomplete="off" type="number" v-model="form.serial" class="form-control" id="serial"
                            placeholder="serial">
                    </div>
                </div>
                <div class="col col-md-2"></div>
                <div class="col col-md-4">
                    <div class="form-group mt-4">
                        <label for="hasil">Hasil Pratinjau</label>
                        <h2 v-if="var22 != 0">{{ var22 | capitalize }}</h2>
                        <h2 v-else>Belum Ada.</h2>
                    </div>
                </div>

                <input type="text" hidden v-model="pratinjau2">
                <input type="text" hidden v-model="pratinjau">

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
    import Spinner from '../tools/Spanner';
    export default {

        props: ['pola'],

        components: {
            SpinnerComponent: Spinner,
        },

        data() {
            return {
                var22: '',

                form: {
                    kode_eksemplar: this.pratinjau2,
                    prefix: '',
                    suffix: '',
                    serial: 0,
                },

                loading: false,
            }
        },

        methods: {
            submit() {
                console.log(this.form);
                this.loading = true,
                    axios.post(this.pola, this.form)
                    .then(res => {
                        this.$swal({
                            position: 'top-end',
                            type: 'success',
                            title: res.data.message.toUpperCase(),
                            showConfirmButton: false,
                            timer: 2000
                        });
                        setTimeout(() => {
                            this.loading = false;
                            this.$emit('closeEksemplar');
                            this.$emit('updateEksemplar');
                        }, 2200)

                        this.form.kode_eksemplar = '',
                            this.form.prefix = '',
                            this.form.suffix = '',
                            this.form.serial = 0,
                            this.var22 = ''
                    })
                    .catch(err => console.log(err))
            }
        },

        computed: {

            check() {
                return (
                    this.form.prefix == '' ? true : false
                );
            },

            pratinjau2() {
                return this.form.kode_eksemplar = this.var22;
            },

            pratinjau() {
                if (this.form.serial > 20) {
                    return false;
                }

                return this.var22 = `${this.form.prefix}${_.padStart(0, this.form.serial, '0')}${this.form.suffix}`
            }
        }

    }

</script>
