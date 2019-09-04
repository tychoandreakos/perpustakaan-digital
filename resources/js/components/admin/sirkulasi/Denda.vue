<template>
    <div class="container p-4">
        <h3>Bayar Denda</h3>
        <form @submit.prevent="submit">
            <div class="row">
                <div class="col-md-12">

                    <div class="form-group mt-2">
                        <label for="prefix">Kode Eksemplar</label>
                        <input autocomplete="off" :value="this.denda.bibliobigrafi.pola_eksemplar | capitalize" disabled type="text"
                            class="form-control" v-focus placeholder="Kode Eksemplar">
                    </div>

                     <div class="form-group">
                        <label for="prefix">Judul Buku</label>
                        <input autocomplete="off" :value="this.denda.bibliobigrafi.buku.judul | capitalize" disabled type="text"
                            class="form-control" v-focus placeholder="Kode Eksemplar">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col col-lg-6">
                                <div class="form-group">
                                    <label for="prefix">ID Anggota</label>
                                    <input autocomplete="off" :value="this.user.id" disabled type="text"
                                        class="form-control" placeholder="Nama Gmd">
                                </div>
                            </div>
                            <div class="col col-lg-6">
                                <div class="form-group">
                                    <label for="prefix">Nama Anggota</label>
                                    <input autocomplete="off" :value="this.user.name | capitalize" disabled type="text"
                                        class="form-control" placeholder="Nama Gmd">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="prefix">Total Bayar</label>
                            <input autocomplete="off" :value="'Rp.' + this.total" disabled type="text"
                                class="form-control" placeholder="Nama Gmd">
                        </div>

                        <div class="form-group mt-2">
                            <label for="prefix">Deksripsi</label>
                            <textarea v-model="form.deskripsi" autocomplete="off" type="text" class="form-control" placeholder="Kosongkan jika tidak perlu"></textarea>
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
                        <button type="submit" :disabled="check" class="btn btn-5 btn-success">Bayar</button>
                    </template>

                </div>

            </div>
        </form>


    </div>
</template>

<script>
    import Spinner from '../tools/Spanner';
    export default {

        props: ['denda', 'total', 'store', 'user'],

        components: {
            SpinnerComponent: Spinner,
        },

        data() {
            return {
                form: {
                    user_id: this.user.id,
                    pinjam_transaksi_id: this.denda.id,
                    buku_id: this.denda.bibliobigrafi.buku.id,
                    // jumlah_denda: '',
                    jumlah_bayar: this.total,
                    deskripsi: '',
                    bilio_id: this.denda.bibliobigrafi.id,
                    _method: 'POST'
                },
                loading: false,
            }
        },

        methods: {
            submit() {
                this.loading = true,
                    axios.post(this.store, this.form)
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
                            this.$emit('closeDenda');
                            this.$emit('updateDenda');
                        }, 2200)

                    })
                    .catch(err => console.log(err))
            }
        },

        computed: {

            check() {
                return (
                    this.user.id == '' ? true : false
                );
            },
        }

    }

</script>
