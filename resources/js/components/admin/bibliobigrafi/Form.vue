<template>
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0" v-if="this.buku.judul">Update Data Bibliobigrafi</h3>
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
                                <label class="form-control-label" for="judul">Judul*</label>
                                <input type="text" v-model="form.judul" id="judul"
                                    class="form-control form-control-alternative" name="judul" placeholder="Judul Buku">
                                <template v-if="err.judul">
                                    <span class="text-danger mt-1">{{ err.judul[0] }}</span>
                                </template>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div :class="{ 'invalid': isInvalid }">
                                    <div class="float-right mb-2">
                                        <button class="btn btn-icon btn-3 btn-primary btn-sm" @click="showPengarang"
                                            type="button">
                                            <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                                            <span class="btn-inner--text">Tambah Pengarang</span>
                                        </button>
                                    </div>
                                    <label class="form-control-label" for="judul">Pengarang*</label>
                                    <div class="clearfix"></div>
                                    <multiselect v-model="pengarang_id" :options="options" :multiple="true"
                                        group-label="language" :group-select="true" placeholder="Cari Pengarang ..."
                                        track-by="nama_pengarang" label="nama_pengarang"><span slot="noResult">Oops! No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <template v-if="err.pengarang_id">
                                        <span class="text-danger mt-1">{{ err.pengarang_id[0] }}</span>
                                    </template>
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
                                <input type="text" autocomplete="off" v-model="form.edisi" id="edisi"
                                    class="form-control form-control-alternative" name="edisi" placeholder="Edisi">
                                <template v-if="err.edisi">
                                    <span class="text-danger mt-1">{{ err.edisi[0] }}</span>
                                </template>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="deskripsi_fisik">Deksripsi Fisik*</label>
                                <input autocomplete="off" type="text" v-model="form.deskripsi_fisik"
                                    id="deskripsi_fisik" class="form-control form-control-alternative"
                                    name="deskripsi_fisik" placeholder="Deksripsi Fisik">
                                <template v-if="err.deskripsi_fisik">
                                    <span class="text-danger mt-1">{{ err.deskripsi_fisik[0] }}</span>
                                </template>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="isbn_isnn">ISBN ISNN*</label>
                                <input type="text" v-model="form.isbn_isnn" id="isbn_isnn"
                                    class="form-control form-control-alternative" name="isbn_isnn"
                                    placeholder="SIBN ISNN" autocomplete="off">
                                <template v-if="err.isbn_isnn">
                                    <span class="text-danger mt-1">{{ err.isbn_isnn[0] }}</span>
                                </template>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <div :class="{ 'invalid': isInvalid }">
                                    <div class="float-right mb-2">
                                        <button @click="showPenerbit" class="btn btn-icon btn-3 btn-primary btn-sm"
                                            type="button">
                                            <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                                            <span class="btn-inner--text">Tambah Penerbit</span>
                                        </button>
                                    </div>
                                    <label class="form-control-label" for="penerbit">Penerbit*</label>
                                    <multiselect class="mt-2" v-model="penerbit_id" :options="penerbitData"
                                        group-label="language" :group-select="true" placeholder="Pilih Penerbit ...."
                                        track-by="nama_penerbit" label="nama_penerbit"><span slot="noResult">Oops! No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <template v-if="err.penerbit_id">
                                        <span class="text-danger mt-1">{{ err.penerbit_id[0] }}</span>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button @click="showEksemplar" class="btn btn-icon btn-primary btn-sm mb-3" type="button">
                        <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                        <span class="btn-inner--text">Tambah Pola Eksemplar</span>
                    </button>
                    <button @click="showKoleksi" class="btn btn-icon btn-primary btn-sm mb-3" type="button">
                        <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                        <span class="btn-inner--text">Tambah Tipe Koleksi</span>
                    </button>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <div :class="{ 'invalid': isInvalid }">
                                    <label class="form-control-label" for="klasifikasi">Pola Eksemplar Tersedia*</label>
                                    <multiselect v-model="pola_eksemplar" :options="eksemplarData"
                                        group-label="language" :group-select="true" placeholder="Pilih pola eksemplar"
                                        track-by="kode_eksemplar" label="kode_eksemplar"><span slot="noResult">Oops!
                                            No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <template v-if="err.pola_eksemplar">
                                        <span class="text-danger mt-1">{{ err.pola_eksemplar[0] }}</span>
                                    </template>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="total">Total Eksemplar*</label>
                                <input type="number" v-model="form.total" id="total"
                                    class="form-control form-control-alternative" name="total"
                                    placeholder="Total Eksemplar">
                                <template v-if="err.total">
                                    <span class="text-danger">{{ err.total[0] }}</span>
                                </template>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <div :class="{ 'invalid': isInvalid }">
                                    <label class="form-control-label" for="koleksi">Tipe Koleksi*</label>
                                    <multiselect v-model="koleksi_id" :options="koleksiData" group-label="language"
                                        :group-select="true" placeholder="Pilih tipe koleksi" track-by="tipe_koleksi"
                                        label="tipe_koleksi"><span slot="noResult">Oops!
                                            No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <template v-if="err.koleksi_id">
                                        <span class="text-danger mt-1">{{ err.koleksi_id[0] }}</span>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="tahun_terbit">Tahun Terbit*</label>
                                <input type="text" autocomplete="off" v-model="form.tahun_terbit" id="tahun_terbit"
                                    class="form-control form-control-alternative mt-1" name="tahun_terbit"
                                    placeholder="Tahun Terbit">
                                <template v-if="err.tahun_terbit">
                                    <span class="text-danger mt-1">{{ err.tahun_terbit[0] }}</span>
                                </template>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <div :class="{ 'invalid': isInvalid }">
                                    <div class="float-right mb-2">
                                        <button @click="showKota" class="btn btn-icon btn-3 btn-primary btn-sm"
                                            type="button">
                                            <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                                            <span class="btn-inner--text">Tambah Tempat Terbit</span>
                                        </button>
                                    </div>
                                    <label class="form-control-label" for="tempat">Tempat Terbit*</label>
                                    <multiselect class="mt-1" v-model="kota_id" :options="kotaData"
                                        group-label="language" :group-select="true" placeholder="Pilih tempat terbit"
                                        track-by="nama_kota" label="nama_kota"><span slot="noResult">Oops! No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <template v-if="err.kota_id">
                                        <span class="text-danger mt-1">{{ err.kota_id[0] }}</span>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label mt-1" for="tahun_terbit">No Panggil*</label>
                                <input type="text" placeholder="Tipe Koleksi" v-model="form.no_panggil"
                                    class="form-control form-control-alternative">
                                <template v-if="err.no_panggil">
                                    <span class="text-danger mt-1">{{ err.no_panggil[0] }}</span>
                                </template>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <div :class="{ 'invalid': isInvalid }">
                                    <div class="float-right mb-2">
                                        <button @click="showGmd" class="btn btn-icon btn-3 btn-primary btn-sm"
                                            type="button">
                                            <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                                            <span class="btn-inner--text">Tambah GMD</span>
                                        </button>
                                    </div>
                                    <label class="form-control-label" for="gmd">GMD*</label>
                                    <multiselect class="mt-1" v-model="gmd_id" :multiple="true" :options="gmdData"
                                        group-label="language" :group-select="true" placeholder="Pilih gmd ..."
                                        track-by="nama_gmd" label="nama_gmd"><span slot="noResult">Oops! No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <template v-if="err.gmd_id">
                                        <span class="text-danger mt-1">{{ err.gmd_id[0] }}</span>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="judul_seri">Judul Seri</label>
                                <input type="text" autocomplete="off" v-model="form.judul_seri" id="judul_seri"
                                    class="form-control mt-1 form-control-alternative" name="judul_seri"
                                    placeholder="Judul Seri">
                                <template v-if="err.judul_seri">
                                    <span class="text-danger mt-1">{{ err.judul_seri[0] }}</span>
                                </template>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <div :class="{ 'invalid': isInvalid }">
                                    <div class="float-right mb-2">
                                        <button @click="showKlasifikasi" class="btn btn-icon btn-3 btn-primary btn-sm"
                                            type="button">
                                            <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                                            <span class="btn-inner--text">Tambah Klasifikasi</span>
                                        </button>
                                    </div>
                                    <label class="form-control-label" for="klasifikasi">Klasifikasi*</label>
                                    <multiselect class="mt-1" v-model="klasifikasi_id" :options="klasifikasiData"
                                        group-label="language" :group-select="true" placeholder="Pilih klasifikasi ...."
                                        track-by="tipe_klasifikasi" label="tipe_klasifikasi"><span slot="noResult">Oops!
                                            No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <template v-if="err.klasifikasi_id">
                                        <span class="text-danger">{{ err.klasifikasi_id[0] }}</span>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div :class="{ 'invalid': isInvalid }">
                                    <div class="float-right mb-2">
                                        <button @click="showLokasi" class="btn btn-icon btn-3 btn-primary btn-sm"
                                            type="button">
                                            <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                                            <span class="btn-inner--text">Tambah Lokasi Rak</span>
                                        </button>
                                    </div>
                                    <label class="form-control-label" for="lokasi">Lokasi Rak*</label>
                                    <multiselect class="mt-1" v-model="lokasi_id" :options="lokasiData"
                                        group-label="language" :group-select="true" placeholder="Pilih lokasi rak ...."
                                        track-by="kode_lokasi" label="nama_lokasi"><span slot="noResult">Oops!
                                            No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <template v-if="err.lokasi_rak_id">
                                        <span class="text-danger mt-1">{{ err.lokasi_rak_id[0] }}</span>
                                    </template>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <div :class="{ 'invalid': isInvalid }">
                                    <div class="float-right mb-2">
                                        <button @click="showBahasa" class="btn btn-icon btn-3 btn-primary btn-sm"
                                            type="button">
                                            <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                                            <span class="btn-inner--text">Tambah Bahasa</span>
                                        </button>
                                    </div>
                                    <label class="form-control-label" for="bahasa">Bahasa*</label>
                                    <multiselect class="mt-1" v-model="bahasa_id" :options="bahasaData"
                                        group-label="language" :group-select="true" placeholder="Pilih bahasa ...."
                                        track-by="jenis_bahasa" label="jenis_bahasa"><span slot="noResult">Oops!
                                            No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <template v-if="err.lokasi_id">
                                        <span class="text-danger mt-1">{{ err.lokasi_id[0] }}</span>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div :class="{ 'invalid': isInvalid }">
                                    <div class="float-right mb-2">
                                        <button @click="showTopik" class="btn btn-icon btn-3 btn-primary btn-sm"
                                            type="button">
                                            <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                                            <span class="btn-inner--text">Tambah Topik Buku</span>
                                        </button>
                                    </div>
                                    <label class="form-control-label" for="lokasi">Topik Buku*</label>
                                    <multiselect class="mt-1" v-model="topik_id" :options="topikData"
                                        group-label="language" :group-select="true" placeholder="Pilih topik buku ...."
                                        track-by="id" label="jenis_topik"><span slot="noResult">Oops!
                                            No
                                            elements found.
                                            Consider changing the search query.</span></multiselect>
                                    <template v-if="err.topik_id">
                                        <span class="text-danger mt-1">{{ err.topik_id[0] }}</span>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="catatan">Catatan</label>
                                <ckeditor :editor="editor" v-model.lazy="form.catatan" :config="editorConfig">
                                </ckeditor>
                                <template v-if="err.catatan">
                                    <span class="text-danger mt-1">{{ err.catatan[0] }}</span>
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
                    <input type="text" hidden v-model="pola_eksemplar2">
                    <input type="text" hidden v-model="koleksi2">
                    <input type="text" hidden v-model="topik2">

                    <modal height="auto" name="eksemplar">
                        <pola-component @closeEksemplar="hideEksemplar" @updateEksemplar="getPola" :pola="this.pol">
                        </pola-component>
                    </modal>

                    <modal height="auto" name="topik">
                        <topik-component @closeTopik="hideTopik" @updateTopik="getTopik" :topik="this.top">
                        </topik-component>
                    </modal>

                    <modal height="auto" name="pengarang">
                        <pengarang-component @closePengarang="hidePengarang" @updatePengarang="getData"
                            :peng="this.peng"></pengarang-component>
                    </modal>

                    <modal height="auto" name="kota">
                        <kota-component @closeKota="hideKota" @updateKota="getKota" :kota="this.kota3"></kota-component>
                    </modal>

                    <modal height="auto" name="gmd">
                        <gmd-component @closeGmd="hideGmd" @updateGmd="getGmd" :gmd="this.gmd3"></gmd-component>
                    </modal>


                    <modal height="auto" name="penerbit">
                        <penerbit-component @closePenerbit="hidePenerbit" @updatePenerbit="getPenerbit"
                            :pengo="this.pener"></penerbit-component>
                    </modal>

                    <modal height="auto" name="klasifikasi">
                        <klasifikasi-component @closeKlasifikasi="hideKlasifikasi" @updateKlasifikasi="getKlasifikasi"
                            :tipeklasifikasi="this.tipeklasifikasi"></klasifikasi-component>
                    </modal>

                    <modal height="auto" name="bahasa">
                        <bahasa-component @closeBahasa="hideBahasa" @updateBahasa="getBahasa" :bahasa="this.bahasaa">
                        </bahasa-component>
                    </modal>

                    <modal height="auto" name="koleksi">
                        <koleksi-component @closeKoleksi="hideKoleksi" @updateKoleksi="getKoleksi"
                            :koleksi="this.koleksi3"></koleksi-component>
                    </modal>

                    <modal height="auto" name="lokasi">
                        <lokasi-component @closeLokasi="hideLokasi" @updateLokasi="getLokasi" :lokasi3="this.lokasi3">
                        </lokasi-component>
                    </modal>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="img">Upload Cover</label>
                                <div class="custom-file">
                                    <input accept="image/jpeg" type="file" v-on:change="onImageChange"
                                        class="custom-file-input" id="validatedCustomFile">
                                    <label class="custom-file-label" for="validatedCustomFile">{{ img }}</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                    <!-- <span class="text-danger mt-2">{{ img }}</span> -->
                                </div>
                                <template v-if="err.img">
                                    <span class="text-danger">{{ err.img[0] }}</span>
                                </template>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="catatan">Upload PDF</label>
                                <div class="custom-file">
                                    <input accept="application/pdf" type="file" v-on:change="multipleFileChange"
                                        class="custom-file-input" id="validatedCustomFile">
                                    <label class="custom-file-label" for="validatedCustomFile">{{ pdf }}</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                </div>
                                <template v-if="err.catatan">
                                    <span class="text-danger">{{ err.catatan[0] }}</span>
                                </template>
                            </div>
                        </div>
                    </div>

                </div>

                <input type="hidden" name="" :value="dataUpdate">


                <template v-if="loading">
                    <div class="progress">
                        <!-- PROGRESS BAR DENGAN VALUE NYA KITA DAPATKAN DARI VARIABLE progressBar -->
                        <div class="progress-bar" role="progressbar" :style="{width: progressBar + '%'}"
                            :aria-valuenow="progressBar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </template>

                <div class="float-right">

                    <template v-if="loading">
                        <spinner-component></spinner-component>
                    </template>
                    <template v-else>
                        <template v-if="this.buku.judul">
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
    import Pengarang from './add/Pengarang';
    import Penerbit from './add/Penerbit';
    import Kota from './add/Kota';
    import Gmd from './add/Gmd';
    import Klasifikasi from './add/Klasifikasi';
    import Bahasa from './add/Bahasa';
    import Lokasi from './add/Lokasi';
    import Koleksi from './add/Koleksi';
    import Topik from './add/Topik';
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    export default {

        components: {
            SpinnerComponent: Spinner,
            Multiselect,
            PolaComponent: Pola,
            PengarangComponent: Pengarang,
            PenerbitComponent: Penerbit,
            KotaComponent: Kota,
            GmdComponent: Gmd,
            KlasifikasiComponent: Klasifikasi,
            LokasiComponent: Lokasi,
            KoleksiComponent: Koleksi,
            TopikComponent: Topik,
            BahasaComponent: Bahasa,
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
            'pol',
            'peng',
            'pener',
            'kota3',
            'gmd3',
            'tipeklasifikasi',
            'lokasi3',
            'koleksi',
            'koleksi3',
            'top',
            'topikk',
            'buku',
            'bahasaa'
        ],

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
                koleksiData: [],
                klasifikasiData: [],
                topikData: [],
                bahasaData: [],
                lokasiData: [],
                bahasaData: [],
                klasifikasi_id: [],
                pengarang_id: [],
                penerbit_id: [],
                kota_id: [],
                gmd_id: [],
                bahasa_id: [],
                koleksi_id: [],
                topik_id: [],
                progressBar: 0,
                bahasa_id: [],
                lokasi_id: [],
                eksemplarData: [],
                pola_eksemplar: [],
                img: (typeof (this.buku.gambar_sampul) !== 'undefined' ? this.buku.gambar_sampul :
                    'Pilih Gambar Sampul'),
                pdf: (typeof (this.buku.pdf) !== 'undefined' ? this.buku.pdf : 'Pilih PDF'),
                editor: ClassicEditor,
                editorConfig: {
                    // The configuration of the editor.
                },

                form: {
                    judul: (typeof (this.buku.judul) !== 'undefined' ? this.buku.judul : ''),
                    edisi: (typeof (this.buku.edisi) !== 'undefined' ? this.buku.edisi : ''),
                    tahun_terbit: (typeof (this.buku.tahun_terbit) !== 'undefined' ? this.buku.tahun_terbit : ''),
                    isbn_isnn: (typeof (this.buku.isbn_isnn) !== 'undefined' ? this.buku.isbn_isnn : ''),
                    deskripsi_fisik: (typeof (this.buku.deskripsi_fisik) !== 'undefined' ? this.buku.deskripsi_fisik :
                        ''),
                    judul_seri: (typeof (this.buku.judul_seri) !== 'undefined' ? this.buku.judul_seri : ''),
                    catatan: (typeof (this.buku.catatan) !== 'undefined' ? this.buku.catatan : ''),
                    slug: (typeof (this.buku.slug) !== 'undefined' ? this.buku.slug : ''),
                    pdf: (typeof (this.buku.pdf) !== 'undefined' ? this.buku.pdf : ''),
                    image: (typeof (this.buku.gambar_sampul) !== 'undefined' ? this.buku.gambar_sampul : ''),
                    oldPdf: '',
                    oldImage: '',
                    klasifikasi_id: this.klasifikasi2,
                    pengarang_id: this.pengarang2,
                    penerbit_id: this.penerbit2,
                    kota_id: this.kota2,
                    lokasi_rak_id: this.lokasi2,
                    koleksi_id: this.koleksi2,
                    topik_id: this.topik2,
                    bahasa_id: this.bahasa2,
                    gmd_id: this.gmd2,
                    pola_eksemplar: this.pola_eksemplar2,
                    no_panggil: (typeof (this.buku.judul) !== 'undefined' ? this.buku.bibliobigrafi[0].no_panggil : ''),
                    total: (typeof (this.buku.judul) !== 'undefined' ? this.buku.bibliobigrafi.length : ''),
                    _method: (typeof (this.buku.judul) !== 'undefined' ? 'PATCH' : 'POST'),
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
            this.getKoleksi();
            this.getTopik();
        },

        computed: {
            isInvalid() {
                return this.isTouched && this.value.length === 0
            },

            dataUpdate() {
                if (this.buku.judul) {
                    this.pengarang_id = this.buku.buku_transaksi.map(s => s.pengarang);
                    this.koleksi_id = this.buku.bibliobigrafi[0].koleksi;
                    // this.gmd_id = this.buku.bibliobigrafi[0].gmd;
                    this.kota_id = this.buku.buku_transaksi[0].kota;
                    this.bahasa_id = this.buku.buku_transaksi[0].bahasa;
                    this.klasifikasi_id = this.buku.bibliobigrafi[0].klasifikasi;
                    this.lokasi_id = this.buku.bibliobigrafi[0].lokasi_rak;
                    this.topik_id = this.buku.topik;
                    this.penerbit_id = this.buku.buku_transaksi[0].penerbit;
                    this.form.oldPdf = this.buku.pdf;
                    this.form.oldImage = this.buku.gambar_sampul;
                    this.pola_eksemplar = {
                        kode_eksemplar: this.buku.bibliobigrafi[0].pola_eksemplar[0].kode_eksemplar
                    }
                    return this.gmd_id = this.buku.bibliobigrafi[0].gmd_transaksi.map(s => s.gmd);
                }
            },

            bahasa2() {
                return this.form.bahasa_id = this.bahasa_id.id
            },

            topik2() {
                return this.form.topik_id = this.topik_id.id
            },

            koleksi2() {
                return this.form.koleksi_id = this.koleksi_id.id
            },

            pola_eksemplar2() {
                return this.form.pola_eksemplar = this.pola_eksemplar.kode_eksemplar
            },

            pengarang2() {
                return this.form.pengarang_id = this.pengarang_id.map(pengarang => pengarang.id);
            },

            gmd2() {
                return this.form.gmd_id = this.gmd_id.map(gmd => gmd.id);
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
                return this.form.lokasi_rak_id = this.lokasi_id.id
            }
        },

        methods: {
            onChange(value) {
                this.value = value
                if (value.indexOf('Reset me!') !== -1) this.value = []
            },

            fieldBahasa() {
                console.log('wow')
            },

            multipleFileChange() {
                this.pdf = event.target.files[0].name;
                var vm = this;
                vm.form.pdf = [];
                for (let i = event.target.files.length - 1; i >= 0; i--) {
                    const fileReader = new FileReader();
                    fileReader.readAsDataURL(event.target.files[i]);

                    const type = event.target.files[i].type;
                    const name = event.target.files[i].name;

                    fileReader.onload = event => {
                        vm.form.pdf.push(event.target.result);
                    }
                }
            },

            onImageChange(e) {
                this.img = e.target.files[0].name;
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.form.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            onPdfChange(e) {
                this.pdf = e.target.files[0].name;
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createPdf(files[0]);

            },
            createPdf(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.form.pdf = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            showBahasa() {
                this.$modal.show('bahasa');
            },
            hideBahasa() {
                this.$modal.hide('bahasa');
            },
            showEksemplar() {
                this.$modal.show('eksemplar');
            },
            hideEksemplar() {
                this.$modal.hide('eksemplar');
            },
            showTopik() {
                this.$modal.show('topik');
            },

            hideTopik() {
                this.$modal.hide('topik');
            },
            showKoleksi() {
                this.$modal.show('koleksi');
            },
            hideKoleksi() {
                this.$modal.hide('koleksi');
            },
            showLokasi() {
                this.$modal.show('lokasi');
            },
            hideLokasi() {
                this.$modal.hide('lokasi');
            },
            showKota() {
                this.$modal.show('kota');
            },
            hideKota() {
                this.$modal.hide('kota');
            },
            showKlasifikasi() {
                this.$modal.show('klasifikasi');
            },
            hideKlasifikasi() {
                this.$modal.hide('klasifikasi');
            },
            showGmd() {
                this.$modal.show('gmd');
            },
            hideGmd() {
                this.$modal.hide('gmd');
            },
            hidePengarang() {
                this.$modal.hide('pengarang');
            },
            showPengarang() {
                this.$modal.show('pengarang');
            },
            hidePenerbit() {
                this.$modal.hide('penerbit');
            },
            showPenerbit() {
                this.$modal.show('penerbit');
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
            getKoleksi() {
                return axios.get(this.koleksi)
                    .then(res => this.koleksiData = res.data)
                    .catch(err => console.log(err));
            },
            getBahasa() {
                return axios.get(this.bahasa)
                    .then(res => this.bahasaData = res.data)
                    .catch(err => console.log(err));
            },
            getTopik() {
                return axios.get(this.topikk)
                    .then(res => this.topikData = res.data.data)
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
                console.log(this.form);

                if (!this.buku.judul) {
                    // create
                    axios.post(this.fetch, this.form, {
                            onUploadProgress: function (progressEvent) {
                                //DATA TERSEBUT AKAN DI ASSIGN KE VARIABLE progressBar
                                this.progressBar = parseInt(Math.round((progressEvent.loaded * 100) /
                                    progressEvent.total))
                            }.bind(this)
                        })
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
                            for (let [key, value] of Object.entries(this.err)) {
                                setTimeout(() => {
                                    Vue.$toast.open({
                                        message: value[0],
                                        type: 'error',
                                        position: 'top-right',
                                        dismissible: false,
                                    });
                                }, 2000 * Math.random())

                                // console.log(key, );
                            }
                        })
                } else {
                    // update
                    axios.post('/pustakawan/bibliobigrafi/' + this.buku.id, this.form, {
                            onUploadProgress: function (progressEvent) {
                                //DATA TERSEBUT AKAN DI ASSIGN KE VARIABLE progressBar
                                this.progressBar = parseInt(Math.round((progressEvent.loaded * 100) /
                                    progressEvent.total))
                            }.bind(this)
                        })
                        .then(res => {
                            if (res.data.condition) {
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
                            } else {
                                Vue.$toast.open({
                                    message: res.data.message,
                                    type: 'error',
                                    position: 'top-right'
                                });
                                this.loading = false;
                                this.progressBar = 0;
                            }
                        })
                        .catch(err => {
                            this.err = err.response.data.errors;
                            this.loading = false;
                              for (let [key, value] of Object.entries(this.err)) {
                                setTimeout(() => {
                                    Vue.$toast.open({
                                        message: value[0],
                                        type: 'error',
                                        position: 'top-right',
                                        dismissible: false,
                                    });
                                }, 2000 * Math.random())
                             }
                        })
                }
            },
        }
    }

</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
