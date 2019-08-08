<template>
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">Tambah Data GMD</h3>
                </div>
                <div class="col-4 text-right">
                    <a :href="this.index" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form @submit.prevent="simpan">
                <h6 class="heading-small text-muted mb-4">GMD information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="kode_gmd">Kode GMD</label>
                                <input type="text" v-model="form.kode_gmd" id="kode_gmd"
                                    class="form-control form-control-alternative" placeholder="KODE GMD">
                                <template v-if="err.kode_gmd">
                                    <span class="text-danger">{{ err.kode_gmd[0] }}</span>
                                </template>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="nama_gmd">Nama GMD</label>
                                <input type="text" v-model="form.nama_gmd" id="nama_gmd"
                                    class="form-control form-control-alternative" placeholder="NAMA GMD">
                                <template v-if="err.nama_gmd">
                                    <span class="text-danger">{{ err.nama_gmd[0] }}</span>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="float-right">

                    <template v-if="loading">
                        <div class="lds-roller">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </template>
                    <template v-else>
                        <button class="btn btn-success">
                            Simpan</button>
                    </template>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import {
        setTimeout
    } from 'timers';
    export default {
        props: [
            'index',
            'store'
        ],

        data() {
            return {
                form: {
                    kode_gmd: '',
                    nama_gmd: '',
                },

                loading: false,

                err: {},
                msg: null,
            }
        },

        methods: {
            simpan() {
                this.loading = true;

                setTimeout(() => {
                    this.form.kode_gmd = '';
                    this.form.nama_gmd = '';
                    this.loading = false;
                }, 3000)

                axios.post(this.store, this.form)
                    .then(res => this.msg = res.data.message)
                    .catch(err => this.err = err)



            }
        }
    }

</script>

<style>
    /* spinner */
    .lds-roller {
        display: inline-block;
        position: relative;
        width: 64px;
        height: 64px;
    }

    .lds-roller div {
        animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        transform-origin: 32px 32px;
    }

    .lds-roller div:after {
        content: " ";
        display: block;
        position: absolute;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #2dce89;
        margin: -3px 0 0 -3px;
    }

    .lds-roller div:nth-child(1) {
        animation-delay: -0.036s;
    }

    .lds-roller div:nth-child(1):after {
        top: 50px;
        left: 50px;
    }

    .lds-roller div:nth-child(2) {
        animation-delay: -0.072s;
    }

    .lds-roller div:nth-child(2):after {
        top: 54px;
        left: 45px;
    }

    .lds-roller div:nth-child(3) {
        animation-delay: -0.108s;
    }

    .lds-roller div:nth-child(3):after {
        top: 57px;
        left: 39px;
    }

    .lds-roller div:nth-child(4) {
        animation-delay: -0.144s;
    }

    .lds-roller div:nth-child(4):after {
        top: 58px;
        left: 32px;
    }

    .lds-roller div:nth-child(5) {
        animation-delay: -0.18s;
    }

    .lds-roller div:nth-child(5):after {
        top: 57px;
        left: 25px;
    }

    .lds-roller div:nth-child(6) {
        animation-delay: -0.216s;
    }

    .lds-roller div:nth-child(6):after {
        top: 54px;
        left: 19px;
    }

    .lds-roller div:nth-child(7) {
        animation-delay: -s0.252s;
    }

    .lds-roller div:nth-child(7):after {
        top: 50px;
        left: 14px;
    }

    .lds-roller div:nth-child(8) {
        animation-delay: -0.288s;
    }

    .lds-roller div:nth-child(8):after {
        top: 45px;
        left: 10px;
    }

    @keyframes lds-roller {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

</style>
