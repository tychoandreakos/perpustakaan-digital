<template>
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0" v-if="this.fetch.judul">Update Data Bibliobigrafi</h3>
                    <h3 class="mb-0" v-else>Tambah Data Bibliobigrafi</h3>
                </div>
                <div class="col-4 text-right">
                    <a :href="this.index" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form @submit.prevent="simpan">
                <h6 class="heading-small text-muted mb-4">Bibliobigrafi information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="judul">Judul</label>
                                <input type="text" v-model="form.judul" id="judul"
                                    class="form-control form-control-alternative" name="judul"
                                    placeholder="Nama Penerbit">
                                <template v-if="err.judul">
                                    <span class="text-danger">{{ err.judul[0] }}</span>
                                </template>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div :class="{ 'invalid': isInvalid }">
                                    <label class="form-control-label" for="judul">Pengarang</label>
                                    <multiselect v-model="value" :options="options" :multiple="true"
                                        group-label="language" :group-select="true" placeholder="Type to search"
                                        track-by="nama_pengarang" label="nama_pengarang"><span slot="noResult">Oops! No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <pre class="language-json"><code>{{ value  }}</code></pre>
                                    <label class="typo__label form__label" v-show="isInvalid">Minimal harus ada 1
                                        pengarang</label>
                                </div>

                                <!-- <input type="text" v-model="form.judul" id="judul"
                                class="form-control form-control-alternative" name="judul" placeholder="Nama Penerbit"> -->

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="edisi">Edisi</label>
                                <input type="text" v-model="form.edisi" id="edisi"
                                    class="form-control form-control-alternative" name="edisi" placeholder="Edisi">
                                <template v-if="err.edisi">
                                    <span class="text-danger">{{ err.edisi[0] }}</span>
                                </template>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="deskripsi_fisik">Deksripsi Fisik</label>
                                <input type="text" v-model="form.deskripsi_fisik" id="deskripsi_fisik"
                                    class="form-control form-control-alternative" name="deskripsi_fisik"
                                    placeholder="Deksripsi Fisik">
                                <template v-if="err.deskripsi_fisik">
                                    <span class="text-danger">{{ err.deskripsi_fisik[0] }}</span>
                                </template>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="isbn_isnn">ISBN ISNN</label>
                                <input type="text" v-model="form.isbn_isnn" id="isbn_isnn"
                                    class="form-control form-control-alternative" name="isbn_isnn" placeholder="Edisi">
                                <template v-if="err.isbn_isnn">
                                    <span class="text-danger">{{ err.isbn_isnn[0] }}</span>
                                </template>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <div :class="{ 'invalid': isInvalid }">
                                    <label class="form-control-label" for="penerbit">Penerbit</label>
                                    <multiselect v-model="valuePenerbit" :options="penerbitData" :multiple="true"
                                        group-label="language" :group-select="true" placeholder="Type to search"
                                        track-by="nama_penerbit" label="nama_penerbit"><span slot="noResult">Oops! No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <pre class="language-json"><code>{{ valuePenerbit  }}</code></pre>
                                    <label class="typo__label form__label" v-show="isInvalid">Minimal harus ada 1
                                        penerbit</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="tahun_terbit">Tahun Terbit</label>
                                <input type="text" v-model="form.tahun_terbit" id="tahun_terbit"
                                    class="form-control form-control-alternative" name="tahun_terbit"
                                    placeholder="Edisi">
                                <template v-if="err.tahun_terbit">
                                    <span class="text-danger">{{ err.tahun_terbit[0] }}</span>
                                </template>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <div :class="{ 'invalid': isInvalid }">
                                    <label class="form-control-label" for="tempat">Tempat Terbit</label>
                                    <multiselect v-model="valueKota" :options="kotaData" :multiple="true"
                                        group-label="language" :group-select="true" placeholder="Type to search"
                                        track-by="nama_kota" label="nama_kota"><span slot="noResult">Oops! No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <pre class="language-json"><code>{{ valueKota  }}</code></pre>
                                    <label class="typo__label form__label" v-show="isInvalid">Minimal harus ada 1
                                        kota</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="tahun_terbit">No Panggil</label>
                                <input type="text" class="form-control form-control-alternative">
                                <!-- <input type="text" v-model="form.tahun_terbit" id="tahun_terbit"
                                    class="form-control form-control-alternative" name="tahun_terbit"
                                    placeholder="Edisi">
                                <template v-if="err.tahun_terbit">
                                    <span class="text-danger">{{ err.tahun_terbit[0] }}</span>
                                </template> -->
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <div :class="{ 'invalid': isInvalid }">
                                    <label class="form-control-label" for="gmd">GMD</label>
                                    <multiselect v-model="valueGmd" :options="gmdData" :multiple="true"
                                        group-label="language" :group-select="true" placeholder="Type to search"
                                        track-by="nama_gmd" label="nama_gmd"><span slot="noResult">Oops! No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <pre class="language-json"><code>{{ valueGmd  }}</code></pre>
                                    <label class="typo__label form__label" v-show="isInvalid">Minimal harus ada 1
                                        gmd</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="judul_seri">Judul Seri</label>
                                <input type="text" v-model="form.judul_seri" id="judul_seri"
                                    class="form-control form-control-alternative" name="judul_seri" placeholder="Edisi">
                                <template v-if="err.judul_seri">
                                    <span class="text-danger">{{ err.judul_seri[0] }}</span>
                                </template>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <div :class="{ 'invalid': isInvalid }">
                                    <label class="form-control-label" for="klasifikasi">Klasifikasi</label>
                                    <multiselect v-model="valueKlasifikasi" :options="klasifikasiData" :multiple="true"
                                        group-label="language" :group-select="true" placeholder="Type to search"
                                        track-by="tipe_klasifikasi" label="tipe_klasifikasi"><span slot="noResult">Oops!
                                            No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <pre class="language-json"><code>{{ valueKlasifikasi  }}</code></pre>
                                    <label class="typo__label form__label" v-show="isInvalid">Minimal harus ada 1
                                        klasfikasi</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div :class="{ 'invalid': isInvalid }">
                                    <label class="form-control-label" for="lokasi">Lokasi Rak</label>
                                    <multiselect v-model="valueLokasi" :options="lokasiData" :multiple="true"
                                        group-label="language" :group-select="true" placeholder="Type to search"
                                        track-by="kode_lokasi" label="nama_lokasi"><span slot="noResult">Oops!
                                            No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <pre class="language-json"><code>{{ valueLokasi  }}</code></pre>
                                    <label class="typo__label form__label" v-show="isInvalid">Minimal harus ada 1
                                        lokasi</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <div :class="{ 'invalid': isInvalid }">
                                    <label class="form-control-label" for="bahasa">Bahasa</label>
                                    <multiselect v-model="valueBahasa" :options="bahasaData" :multiple="true"
                                        group-label="language" :group-select="true" placeholder="Type to search"
                                        track-by="jenis_bahasa" label="jenis_bahasa"><span slot="noResult">Oops!
                                            No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <pre class="language-json"><code>{{ valueBahasa  }}</code></pre>
                                    <label class="typo__label form__label" v-show="isInvalid">Minimal harus ada 1
                                        bahasa</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="catatan">Catatan</label>
                                <textarea name="" id="" v-model="form.catatan"
                                    class="form-control form-control-alternative" cols="30" placeholder="Edisi"
                                    rows="10"></textarea>
                                <template v-if="err.catatan">
                                    <span class="text-danger">{{ err.catatan[0] }}</span>
                                </template>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="catatan">Upload Cover</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                </div>
                                <template v-if="err.catatan">
                                    <span class="text-danger">{{ err.catatan[0] }}</span>
                                </template>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="catatan">Upload PDF</label>
                               <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                </div>
                                <template v-if="err.catatan">
                                    <span class="text-danger">{{ err.catatan[0] }}</span>
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
                        <template v-if="this.fetch.judul">
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
    import Multiselect from 'vue-multiselect'

    export default {

        components: {
            SpinnerComponent: Spinner,
            Multiselect
        },

        props: [
            'index',
            'fetch',
            'pengarang',
            'penerbit',
            'kota',
            'gmd',
            'klasifikasi',
            'lokasi',
            'bahasa'
        ],

        computed: {
            isDisabled() {
                return (this.form.judul.length == '' ? true : false)
            }
        },

        data() {
            return {
                form: {
                    judul: this.fetch.judul || '',
                    _method: (this.fetch.judul ? 'PUT' : 'POST')
                },

                loading: false,

                err: {},
                isDisabled: false,
                isTouched: false,
                value: [],
                options: [],
                valuePenerbit: [],
                penerbitData: [],
                valueKota: [],
                kotaData: [],
                valueGmd: [],
                gmdData: [],
                valueKlasifikasi: [],
                klasifikasiData: [],
                valueLokasi: [],
                lokasiData: [],
                valueBahasa: [],
                bahasaData: [],

                // options: []
            }
        },

        created() {
            this.getData();
            this.getPenerbit();
            this.getKota();
            this.getGmd();
            this.getKlasifikasi();
            this.getLokasi();
            this.getBahasa();
        },

        computed: {
            isInvalid() {
                return this.isTouched && this.value.length === 0
            }
        },

        methods: {
            onChange(value) {
                this.value = value
                if (value.indexOf('Reset me!') !== -1) this.value = []
            },
            onSelect(option) {
                if (option === 'Disable me!') this.isDisabled = true
            },
            getData() {
                return axios.get(this.pengarang)
                    .then(res => this.options = res.data)
                    .catch(err => console.log(err));
            },
            getBahasa() {
                return axios.get(this.bahasa)
                    .then(res => this.bahasaData = res.data)
                    .catch(err => console.log(err));
            },
            getPenerbit() {
                return axios.get(this.penerbit)
                    .then(res => this.penerbitData = res.data)
                    .catch(err => console.log(err));
            },
            getKota() {
                return axios.get(this.kota)
                    .then(res => this.kotaData = res.data)
                    .catch(err => console.log(err));
            },
            getKlasifikasi() {
                return axios.get(this.klasifikasi)
                    .then(res => this.klasifikasiData = res.data)
                    .catch(err => console.log(err));
            },
            getLokasi() {
                return axios.get(this.lokasi)
                    .then(res => this.lokasiData = res.data)
                    .catch(err => console.log(err));
            },
            getGmd() {
                return axios.get(this.gmd)
                    .then(res => this.gmdData = res.data)
                    .catch(err => console.log(err));
            },

            onTouch() {
                this.isTouched = true
            },
            simpan() {
                this.loading = true;

                if (!this.fetch.judul) {
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
                    axios.post('/pustakawan/klasifikasi/' + this.fetch.id, this.form)
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

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
