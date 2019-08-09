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
                                    <multiselect v-model="pengarang_id" :options="options" :multiple="true"
                                        group-label="language" :group-select="true" placeholder="Type to search"
                                        track-by="nama_pengarang" label="nama_pengarang"><span slot="noResult">Oops! No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <pre class="language-json"><code>{{ pengarang_id  }}</code></pre>
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
                                    <multiselect v-model="penerbit_id" :options="penerbitData" group-label="language"
                                        :group-select="true" placeholder="Type to search" track-by="nama_penerbit"
                                        label="nama_penerbit"><span slot="noResult">Oops! No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <pre class="language-json"><code>{{ penerbit_id  }}</code></pre>
                                    <label class="typo__label form__label" v-show="isInvalid">Minimal harus ada 1
                                        penerbit</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button @click="showEksemplar" class="btn btn-icon btn-primary btn-sm mb-3" type="button">
                        <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                        <span class="btn-inner--text">Tambah Pola Eksemplar</span>
                    </button>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <div :class="{ 'invalid': isInvalid }">
                                    <label class="form-control-label" for="klasifikasi">Pola Eksemplar Tersedia</label>
                                    <multiselect v-model="pola_eksemplar" :options="eksemplarData"
                                        group-label="language" :group-select="true" placeholder="Type to search"
                                        track-by="kode_eksemplar" label="kode_eksemplar"><span slot="noResult">Oops!
                                            No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <!-- <pre class="language-json"><code>{{ pola_eksemplar  }}</code></pre> -->
                                    <label class="typo__label form__label" v-show="isInvalid">Minimal harus ada 1
                                        eksemplar</label>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="judul_seri">Total Eksemplar</label>
                                <input type="text" v-model="form.judul_seri" id="judul_seri"
                                    class="form-control form-control-alternative" name="judul_seri" placeholder="Edisi">
                                <template v-if="err.judul_seri">
                                    <span class="text-danger">{{ err.judul_seri[0] }}</span>
                                </template>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <div :class="{ 'invalid': isInvalid }">
                                    <label class="form-control-label" for="klasifikasi">Reference</label>
                                    <multiselect v-model="klasifikasi_id" :options="klasifikasiData"
                                        group-label="language" :group-select="true" placeholder="Type to search"
                                        track-by="tipe_klasifikasi" label="tipe_klasifikasi"><span slot="noResult">Oops!
                                            No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <!-- <pre class="language-json"><code>{{ klasifikasi_id  }}</code></pre> -->
                                    <label class="typo__label form__label" v-show="isInvalid">Minimal harus ada 1
                                        klasfikasi</label>
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
                                    <multiselect v-model="kota_id" :options="kotaData" group-label="language"
                                        :group-select="true" placeholder="Type to search" track-by="nama_kota"
                                        label="nama_kota"><span slot="noResult">Oops! No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <pre class="language-json"><code>{{ kota_id  }}</code></pre>
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
                                    <multiselect v-model="gmd_id" :options="gmdData" group-label="language"
                                        :group-select="true" placeholder="Type to search" track-by="nama_gmd"
                                        label="nama_gmd"><span slot="noResult">Oops! No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <pre class="language-json"><code>{{ gmd_id  }}</code></pre>
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
                                    <multiselect v-model="klasifikasi_id" :options="klasifikasiData"
                                        group-label="language" :group-select="true" placeholder="Type to search"
                                        track-by="tipe_klasifikasi" label="tipe_klasifikasi"><span slot="noResult">Oops!
                                            No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <pre class="language-json"><code>{{ klasifikasi_id  }}</code></pre>
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
                                    <multiselect v-model="lokasi" :options="lokasiData" group-label="language"
                                        :group-select="true" placeholder="Type to search" track-by="kode_lokasi"
                                        label="nama_lokasi"><span slot="noResult">Oops!
                                            No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <pre class="language-json"><code>{{ lokasi  }}</code></pre>
                                    <label class="typo__label form__label" v-show="isInvalid">Minimal harus ada 1
                                        lokasi</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <div :class="{ 'invalid': isInvalid }">
                                    <label class="form-control-label" for="bahasa">Bahasa</label>
                                    <multiselect v-model="bahasa_id" :options="bahasaData" group-label="language"
                                        :group-select="true" placeholder="Type to search" track-by="jenis_bahasa"
                                        label="jenis_bahasa"><span slot="noResult">Oops!
                                            No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <pre class="language-json"><code>{{ bahasa_id  }}</code></pre>
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

                    <input type="text" hidden v-model="bahasa2">
                    <input type="text" hidden v-model="penerbit2">
                    <input type="text" hidden v-model="pengarang2">
                    <input type="text" hidden v-model="kota2">
                    <input type="text" hidden v-model="klasifikasi2">
                    <input type="text" hidden v-model="lokasi2">
                    <input type="text" hidden v-model="gmd2">

                    <modal height="auto" name="eksemplar">
                      <pola-component :pola="this.pol"></pola-component>
                    </modal>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="catatan">Upload Cover</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile">
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
                                    <input type="file" class="custom-file-input" id="validatedCustomFile">
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
    import Pola from '../pola/Form';

    export default {

        components: {
            SpinnerComponent: Spinner,
            Multiselect,
            PolaComponent: Pola,
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
            'bahasa',
            'pola',
            'pol'
        ],

        computed: {
            isDisabled() {
                return (this.form.judul.length == '' ? true : false)
            }
        },

        data() {
            return {
                loading: false,

                err: {},
                isDisabled: false,
                isTouched: false,
                options: [],
                penerbitData: [],
                kotaData: [],
                gmdData: [],
                klasifikasiData: [],
                lokasiData: [],
                bahasaData: [],
                klasifikasi_id: [],
                pengarang_id: [],
                penerbit_id: [],
                kota_id: [],
                gmd_id: [],
                bahasa_id: [],
                lokasi_id: [],
                eksemplarData: [],
                pola_eksemplar: [],

                form: {
                    judul: this.fetch.judul || '',
                    edisi: this.fetch.edisi || '',
                    tahun_terbit: this.fetch.tahun_terbit || '',
                    isbn_isnn: this.fetch.isbn_isnn || '',
                    deskripsi_fisik: this.fetch.deskripsi_fisik || '',
                    judul_seri: this.fetch.judul_seri || '',
                    catatan: this.fetch.catatan || '',
                    slug: this.fetch.slug || '',
                    pdf: this.fetch.pdf || '',
                    gambar_sampul: this.fetch.gambar_sampul || '',
                    klasifikasi_id: this.klasifikasi2,
                    pengarang_id: this.pengarang2,
                    penerbit_id: this.penerbit2,
                    kota_id: this.kota2,
                    lokasi_id: this.lokasi2,
                    bahasa_id: this.bahasa2,
                    gmd_id: this.gmd2,
                    pola_eksemplar: this.pola_eksemplar2,
                    _method: (this.fetch.judul ? 'PUT' : 'POST')
                },

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
            this.getPola();
        },

        computed: {
            isInvalid() {
                return this.isTouched && this.value.length === 0
            },

            bahasa2() {
                return this.form.bahasa_id = this.bahasa_id.id
            },

            pola_eksemplar2() {
                return this.form.pola_eksemplar = this.pola_eksemplar.pola_eksemplar
            },

            pengarang2() {
                return this.form.pengarang_id = this.pengarang_id.map(pengarang => pengarang.id);
            },

            gmd2() {
                return this.form.gmd_id = this.gmd_id.id
            },

            kota2() {
                return this.form.kota_id = this.kota_id.id
            },

            klasifikasi2() {
                return this.form.klasifikasi_id = this.klasifikasi_id.id
            },

            penerbit2() {
                return this.form.penerbit_id = this.penerbit_id.id
            },

            lokasi2() {
                return this.form.lokasi_id = this.lokasi_id.id
            }
        },

        methods: {
            onChange(value) {
                this.value = value
                if (value.indexOf('Reset me!') !== -1) this.value = []
            },
            showEksemplar() {
                this.$modal.show('eksemplar');
            },
            onSelect(option) {
                if (option === 'Disable me!') this.isDisabled = true
            },
            getData() {
                return axios.get(this.pengarang)
                    .then(res => this.options = res.data)
                    .catch(err => console.log(err));
            },
            getPola() {
                return axios.get(this.pola)
                    .then(res => this.eksemplarData = res.data)
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
