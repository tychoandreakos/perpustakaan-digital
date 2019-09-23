/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('user-component', require('./components/Home.vue').default);

// admin
Vue.component('table-bilio-component', require('./components/admin/bibliobigrafi/Table.vue').default);

// gmd
Vue.component('table-gmd-component', require('./components/admin/gmd/TableGmd.vue').default);
Vue.component('form-gmd-component', require('./components/admin/gmd/FormGmd.vue').default);

// penerbit
Vue.component('table-penerbit-component', require('./components/admin/penerbit/Table.vue').default);
Vue.component('form-penerbit-component', require('./components/admin/penerbit/Form.vue').default);

// penerbit
Vue.component('table-buku-component', require('./components/admin/buku/Table.vue').default);
Vue.component('form-buku-component', require('./components/admin/buku/Form.vue').default);

// pengarang
Vue.component('table-pengarang-component', require('./components/admin/pengarang/Table.vue').default);
Vue.component('form-pengarang-component', require('./components/admin/pengarang/Form.vue').default);

// berita
Vue.component('table-berita-component', require('./components/admin/berita/Table.vue').default);
Vue.component('form-berita-component', require('./components/admin/berita/Form.vue').default);

// koleksi
Vue.component('table-koleksi-component', require('./components/admin/koleksi/Table.vue').default);
Vue.component('form-koleksi-component', require('./components/admin/koleksi/Form.vue').default);


// jurusan
Vue.component('table-jurusan-component', require('./components/admin/jurusan/Table.vue').default);
Vue.component('form-jurusan-component', require('./components/admin/jurusan/Form.vue').default);


// kota
Vue.component('table-kota-component', require('./components/admin/kota/Table.vue').default);
Vue.component('form-kota-component', require('./components/admin/kota/Form.vue').default);

// klasifikasi
Vue.component('table-klasifikasi-component', require('./components/admin/klasifikasi/Table.vue').default);
Vue.component('form-klasifikasi-component', require('./components/admin/klasifikasi/Form.vue').default);

// bahasa
Vue.component('table-bahasa-component', require('./components/admin/bahasa/Table.vue').default);
Vue.component('form-bahasa-component', require('./components/admin/bahasa/Form.vue').default);

// denda
Vue.component('table-denda-component', require('./components/admin/denda/Table.vue').default);
Vue.component('form-denda-component', require('./components/admin/denda/Form.vue').default);


// topik
Vue.component('table-topik-component', require('./components/admin/topik/Table.vue').default);
Vue.component('form-topik-component', require('./components/admin/topik/Form.vue').default);

// lokasi
Vue.component('table-lokasi-component', require('./components/admin/lokasi/Table.vue').default);
Vue.component('form-lokasi-component', require('./components/admin/lokasi/Form.vue').default);


// bibliobigrafi
Vue.component('table-bibliobigrafi-component', require('./components/admin/bibliobigrafi/Table.vue').default);
Vue.component('form-bibliobigrafi-component', require('./components/admin/bibliobigrafi/Form.vue').default);

// tipe-anggota
Vue.component('table-tipe-anggota-component', require('./components/admin/tipe-anggota/Table.vue').default);
Vue.component('form-tipe-anggota-component', require('./components/admin/tipe-anggota/Form.vue').default);

// eksemplar
Vue.component('table-transaksi-eksemplar-component', require('./components/admin/eksemplar/Table.vue').default);
Vue.component('form-transaksi-eksemplar-component', require('./components/admin/eksemplar/Form.vue').default);

// anggota
Vue.component('table-anggota-component', require('./components/admin/anggota/Table.vue').default);
Vue.component('form-anggota-component', require('./components/admin/anggota/Form.vue').default);

// info
Vue.component('table-info-component', require('./components/admin/info/Table.vue').default);
Vue.component('form-info-component', require('./components/admin/info/Form.vue').default);

// sirkulasi
Vue.component('table-sirkulasi-component', require('./components/admin/sirkulasi/Table.vue').default);
Vue.component('form-sirkulasi-component', require('./components/admin/sirkulasi/Form.vue').default);
Vue.component('kembali-component', require('./components/admin/sirkulasi/Kembali.vue').default);
Vue.component('histori-component', require('./components/admin/sirkulasi/Histori.vue').default);


// eksemplar keluar
Vue.component('table-eksemplar-keluar-component', require('./components/admin/eksemplar-keluar/Table.vue').default);
Vue.component('form-eksemplar-keluar-component', require('./components/admin/eksemplar-keluar/Form.vue').default);

// daftar pengunjung
Vue.component('table-pengunjung-component', require('./components/admin/pengunjung/Table.vue').default);

// daftar keterlambatan
Vue.component('table-keterlambatan-component', require('./components/admin/keterlambatan/Table.vue').default);

// digital
Vue.component('digital-component', require('./components/admin/digital/Table.vue').default);
Vue.component('form-digital-component', require('./components/admin/digital/Form.vue').default);



// laporan
// Vue.component('table-koleksi-component', require('./components/admin/laporan/Koleksi.vue').default);


// package
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('search-component', require('./components/user/Search').default);