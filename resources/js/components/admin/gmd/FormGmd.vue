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
                                <input type="text"  v-model="form.kode_gmd" id="kode_gmd"
                                    class="form-control form-control-alternative" placeholder="KODE GMD">
                                <template v-if="err.kode_gmd">
                                    <span class="text-danger">{{ err.kode_gmd[0] }}</span>
                                </template>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="nama_gmd">Nama GMD</label>
                                <input type="text" v-model="form.nama_gmd"  id="nama_gmd"
                                    class="form-control form-control-alternative" placeholder="NAMA GMD">
                                     <template v-if="err.nama_gmd">
                                    <span class="text-danger">{{ err.nama_gmd[0] }}</span>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="float-right">
                    <button class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
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

                err: {}
            }
        },

        methods: {
            simpan() {
                axios.post(this.store, this.form)
                    .then()
                    .catch(err => this.err = err.response.data.errors)
            }
        }
    }

</script>

<style>

</style>
