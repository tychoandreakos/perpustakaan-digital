<template>
    <div class="row">
        <div class="col-xl-12 mb-12 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Sirkulasi Peminjaman</h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <div class="card-body">
                        <template v-if="datas">
                            <form @submit.prevent="go">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mt-4">
                                            <label for="">Cari Anggota</label>
                                            <multiselect v-model="form" :options="options" :custom-label="nameWithLang"
                                                placeholder="Select one" label="id" track-by="id">
                                                <template slot="singleLabel"
                                                    slot-scope="{ option }"><strong>{{ option.user.id }}</strong> -
                                                    <strong>
                                                        {{ option.user.name }}</strong></template>
                                            </multiselect>
                                        </div>

                                        <template v-if="loading">
                                            <div class="pull-right">
                                                <spinner-component></spinner-component>
                                            </div>
                                        </template>
                                        <template v-else>
                                            <button :disabled="ds" class="btn btn-icon btn-3 btn-primary" type="submit">
                                                <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>

                                                <span class="btn-inner--text">Lanjut</span>

                                            </button>
                                        </template>
                                    </div>
                                </div>

                            </form>

                        </template>

                        <template v-else>
                            <div class="jumbotron">
                                <div class="row">
                                    <div class="col col-lg-4">
                                        <div class="form-group">
                                            <label style="font-size: 14px" for="nama">Nama Anggota</label>
                                            <h4>{{ form.user.name | capitalize }}</h4>
                                        </div>
                                    </div>
                                    <div class="col col-lg-4">
                                        <div class="form-group">
                                            <label style="font-size: 14px" for="nama">Email</label>
                                            <h4>{{ form.user.email | capitalize }}a</h4>
                                        </div>
                                    </div>
                                    <div class="col col-lg-4">
                                        <div class="form-group">
                                            <label style="font-size: 14px" for="nama">Tanggal Registrasi</label>
                                            <h4>{{ form.user.anggota.tgl_registrasi }}</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col col-lg-4">
                                        <div class="form-group">
                                            <label style="font-size: 14px" for="nama">ID Anggota</label>
                                            <h4>{{ form.user.id }}</h4>
                                        </div>
                                    </div>
                                    <div class="col col-lg-4">
                                        <div class="form-group">
                                            <label style="font-size: 14px" for="nama">Tipe Keanggotaan</label>
                                            <h4>{{ form.tipe_anggota.tipe_anggota | capitalize }}</h4>
                                        </div>
                                    </div>
                                    <div class="col col-lg-4">
                                        <div class="form-group">
                                            <label style="font-size: 14px" for="nama">Berlaku Hingga</label>
                                            <h4>{{ form.user.anggota.tgl_expired }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary mt-3 btn-lg btn-block">Selesai
                                    Transaksi</button>
                            </div>
                        </template>

                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    import Spinner from '../tools/Spanner';

    export default {
        components: {
            Multiselect,
            SpinnerComponent: Spinner,
        },
        props: ['route', 'fetch', 'index'],
        data() {
            return {
                loading: false,
                datas: [],
                options: [],
                form: '',
            }
        },

        computed: {
            ds() {
                return (this.form != '' ? false : true)
            }
        },

        methods: {
            getAnggota() {
                return axios.get(this.fetch)
                    .then(res => this.options = res.data.data)
                    .catch(err => console.log(err));
            },

            go() {
                this.loading = true;
                setTimeout(() => {
                    this.datas = false;
                    this.loading = false
                }, 2000);

            },
        },

        created() {
            this.getAnggota();
        },
    }

</script>

<style scoped>

</style>
