<template>
    <div>
        <div class="heading p-5 bg-danger" style="margin-top: -90px;">
            <div class="container">

            

                <div class="row">
                    <div class="col col-md-7 pt-5">
                        <h5 class="text-white">{{ buku.judul | capitalize }}</h5>
                        <h6 style="font-size: 15px" class="text-white"><i class="ni ni-single-02 mr-1"></i>
                            <template v-for="transaksi in buku.buku_transaksi">
                                <a href="#" class="text-white" :key="transaksi.id">
                                    {{ transaksi.pengarang.nama_pengarang | capitalize }},</a>
                            </template>
                        </h6>
                        <span>ISBN: {{ buku.isbn_isnn }}</span>, <span>Penerbit:
                            {{ buku.buku_transaksi[0].penerbit.nama_penerbit | capitalize }}</span>, <span>Tahun Terbit:
                            {{ buku.tahun_terbit }}</span><br><br>
                        <a v-if="buku.pdf" :href="'/baca/'+buku.slug"
                            class="btn text-white btn-outline-secondary n">Baca</a>
                        <button type="button" class="btn text-white n btn-outline-secondary">Unduh</button>
                        <button type="button" class="btn text-white n btn-outline-secondary">Pinjam</button>

                    </div>
                    <div class="col col-md-4 ml-5">
                        <img :src="'../storage/cover/'+buku.gambar_sampul" alt="cover">
                    </div>
                </div>
            </div>
        </div>

        <div>

            <div class="container mt-5">
                <div class="card card-stats mb-4 mb-lg-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-md-5">
                                <div class="table-responsive">
                                    <div>
                                        <table class="table align-items-center">
                                            <tbody class="list">

                                                <tr>
                                                    <td>
                                                        <p>No Panggil : </p>
                                                    </td>
                                                    <td>
                                                        <p v-if="buku.no_panggil"> {{ buku.no_panggil | capitalize }} </p>
                                                        <p v-else> Tidak ada No Panggil. </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Edisi : </p>
                                                    </td>
                                                    <td>
                                                        <p v-if="buku.edisi"> {{ buku.edisi | capitalize}} </p>
                                                        <p v-else> Tidak ada edisi. </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Tempat Terbit : </p>
                                                    </td>
                                                    <td>
                                                        <p v-if="buku.buku_transaksi[0].kota.nama_kota"> {{ buku.buku_transaksi[0].kota.nama_kota | capitalize }} </p>
                                                        <p v-else> Tidak ada tempat terbit. </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Deskripsi Fisik : </p>
                                                    </td>
                                                    <td>
                                                        <p v-if="buku.deskripsi_fisik"> {{ buku.deskripsi_fisik | capitalize }} </p>
                                                        <p v-else> Tidak ada deskripsi fisik. </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Bahasa : </p>
                                                    </td>
                                                    <td>
                                                        <p v-if="buku.buku_transaksi[0].bahasa.jenis_bahasa"> {{ buku.buku_transaksi[0].bahasa.jenis_bahasa | capitalize }} </p>
                                                        <p v-else> Tidak ada bahasa. </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Jenis GMD : </p>
                                                    </td>
                                                    <td>
                                                        <p v-if="buku.bibliobigrafi[0].gmd.nama_gmd"> {{ buku.bibliobigrafi[0].gmd.nama_gmd | capitalize}} </p>
                                                        <p v-else> Tidak ada Gmd. </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Klasifikasi : </p>
                                                    </td>
                                                   <td>
                                                        <p v-if="buku.bibliobigrafi[0].klasifikasi.tipe_klasifikasi"> {{ buku.bibliobigrafi[0].klasifikasi.tipe_klasifikasi | capitalize}} </p>
                                                        <p v-else> Tidak ada klasifikasi. </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>


                            </div>
                            <div class="col col-md-7">
                                <h6>Catatan Buku : </h6>
                                <p v-if="buku.catatan">
                                    {{ buku.catatan }}
                                </p>
                                <p v-else>Tidak ada catatan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>
</template>

<script>
    export default {
        props: ['buku']
    }

</script>

<style scoped>
    img {
        width: 250px;
        height: 350px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.25);
    }

    .heading {
        width: 100%;
        /* background: #ec454f; */
        height: 450px;
        color: #fff;
    }

    .btn:hover {
        color: #222 !important;
    }

</style>
