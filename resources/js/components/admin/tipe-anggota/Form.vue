<template>
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0" v-if="this.fetch.tipe_anggota">Update Data Tipe Anggota</h3>
                    <h3 class="mb-0" v-else>Tambah Data Tipe Anggota</h3>
                </div>
                <div class="col-4 text-right">
                    <a :href="this.index" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form @submit.prevent="simpan">
                <h6 class="heading-small text-muted mb-4">Tipe Anggota information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="tipe_anggota">Tipe Anggota</label>
                                <input autocomplete="off" type="text" v-model="form.tipe_anggota" id="tipe_anggota"
                                    class="form-control form-control-alternative" name="tipe_anggota"
                                    placeholder="Tipe Anggota">
                                <template v-if="err.tipe_anggota">
                                    <span class="text-danger">{{ err.tipe_anggota[0] }}</span>
                                </template>
                            </div>
                        </div>

                         <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="masa_pinjaman_buku">Masa Pinjaman Per Buku (hari)</label>
                                <input autocomplete="off" type="number" v-model="form.masa_pinjaman_buku" id="masa_pinjaman_buku"
                                    class="form-control form-control-alternative" name="masa_pinjaman_buku"
                                    placeholder="Tipe Anggota">
                                <template v-if="err.masa_pinjaman_buku">
                                    <span class="text-danger">{{ err.tipe_anggota[0] }}</span>
                                </template>
                            </div>
                        </div>
                    </div>

                     <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="jumlah_pinjaman">Max Jumlah Pinjaman Buku Per Anggota</label>
                                <input autocomplete="off" type="number" v-model="form.jumlah_pinjaman" id="jumlah_pinjaman"
                                    class="form-control form-control-alternative" name="jumlah_pinjaman"
                                    placeholder="Jumlah Pinjaman">
                                <template v-if="err.jumlah_pinjaman">
                                    <span class="text-danger">{{ err.jumlah_pinjaman[0] }}</span>
                                </template>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="masa_berlaku_anggota">Masa Berlaku Anggota (tahun)</label>
                                <input type="number" v-model="form.masa_berlaku_anggota" id="masa_berlaku_anggota"
                                    class="form-control form-control-alternative" name="masa_berlaku_anggota"
                                    placeholder="Masa Berlaku">
                                <template v-if="err.masa_berlaku_anggota">
                                    <span class="text-danger">{{ err.masa_berlaku_anggota[0] }}</span>
                                </template>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="batas_perpanjangan_anggota">Max Batas Perpanjangan Anggota (kali)</label>
                                <input autocomplete="off" type="number" v-model="form.batas_perpanjangan_anggota" id="batas_perpanjangan_anggota"
                                    class="form-control form-control-alternative" name="batas_perpanjangan_anggota"
                                    placeholder="Batas Perpanjangan">
                                <template v-if="err.batas_perpanjangan_anggota">
                                    <span class="text-danger">{{ err.batas_perpanjangan_anggota[0] }}</span>
                                </template>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="denda">Denda</label>
                                <input autocomplete="off" type="number" v-model="form.denda" id="denda"
                                    class="form-control form-control-alternative" name="denda"
                                    placeholder="Denda">
                                <template v-if="err.denda">
                                    <span class="text-danger">{{ err.denda[0] }}</span>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="float-right">

                    <template v-if="loading">
                        <spinner-component></spinner-component>
                    </template>
                    <template v-else>
                        <template v-if="this.fetch.tipe_anggota">
                            <button :disabled="isDisabled" class="btn btn-success">
                                Perbarui</button>
                        </template>
                        <template v-else>
                            <button :disabled="isDisabled" class="btn btn-success">
                                Tambah</button>
                        </template>
                    </template>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import Spinner from '../tools/Spanner';
    export default {

        components: {
            SpinnerComponent: Spinner,
        },

        props: [
            'index',
            'fetch',
        ],

        computed: {
            isDisabled() {
                return (this.form.tipe_anggota.length == '' ? true : false)
            }
        },

        data() {
            return {
                form: {
                    tipe_anggota: this.fetch.tipe_anggota || '',
                    jumlah_pinjaman: this.fetch.jumlah_pinjaman || '',
                    masa_berlaku_anggota: this.fetch.masa_berlaku_anggota || '',
                    masa_pinjaman_buku: this.fetch.masa_pinjaman_buku || '',
                    batas_perpanjangan_anggota: this.fetch.batas_perpanjangan_anggota || '',
                    denda: this.fetch.denda || '',
                    _method: (this.fetch.tipe_anggota ? 'PUT' : 'POST')
                },

                loading: false,

                err: {},
            }
        },

        methods: {
            simpan() {
                this.loading = true;

                if (!this.fetch.tipe_anggota) {
                    // create
                    axios.post(this.fetch, this.form)
                        .then(res => {
                            this.$swal({
                                position: 'top-end',
                                type: 'success',
                                title: res.data.message.toUpperCase(),
                                showConfirmButton: false,
                                timer: 3000
                            });

                             setTimeout(() => {
                                window.location = this.index;
                            }, 3200)
                        })
                        .catch(err => {
                            this.err = err.response.data.errors;
                            this.loading = false;
                        })
                } else {
                    // update
                    axios.post('/pustakawan/tipe-anggota/' + this.fetch.id, this.form)
                        .then(res => {
                            this.$swal({
                                position: 'top-end',
                                type: 'success',
                                title: res.data.message.toUpperCase(),
                                showConfirmButton: false,
                                timer: 2500

                            });
                            setTimeout(() => {
                                window.location = this.index;
                            }, 2800);
                        })
                        .catch(err => {
                            console.log(err);
                            this.loading = false;
                        })
                }
            },
        }
    }

</script>
