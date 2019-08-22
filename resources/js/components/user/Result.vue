<template>
    <div>
        <div class="container mt-4">
            <div class="card mt-4" v-for="item in this.result.buku" :key="item.id">
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-3">
                            <img class="text-center mx-auto d-block mt-3"
                                :src="'../storage/cover/' + item.gambar_sampul" alt="gambar">
                        </div>
                        <div class="col col-md-5">
                            <h5><a :href="'/buku/'+item.slug" class="judul">
                                    {{ item.judul.substring(0, 122) | capitalize }}</a></h5>
                            <span v-for="buku_transaksi in item.buku_transaksi" :key="buku_transaksi.id"><a
                                    class="pengarang"
                                    href="#">{{ buku_transaksi.pengarang.nama_pengarang | capitalize }},</a></span>
                            <p class="pt-3" v-if="item.catatan">{{ item.catatan.substring(0, 120) }} .....</p>
                            <p class="pt-3" v-else>Belum ada catatan!</p>
                        </div>
                        <div class="col col-md-4">
                            <div class="row">
                                <div class="col col-md-3">
                                    ISBN
                                </div>
                                <div class="col col-md-8">
                                  {{ item.isbn_isnn }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-md-3">
                                    Penerbit
                                </div>
                                <div class="col col-md-8">
                                   {{ item.buku_transaksi[0].penerbit.nama_penerbit | capitalize }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-md-3">
                                    GMD
                                </div>
                                <div class="col col-md-8">
                                   <!-- <span v-for="bibliobigrafi in item.bibliobigrafi[0]" :key="bibliobigrafi">{{ bibliobigrafi.gmd.nama_gmd }}</span> -->
                                   GTM
                                </div>
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
        props: ['result'],
    }

</script>

<style scoped>
    .judul {
        background: linear-gradient(to bottom, #222 0%,
                #222 100%);
        background-position: 0 100%;
        background-repeat: repeat-x;
        background-size: 0px 0px;
        transition: .7s all;
    }

    .judul:hover {
        /* background: red; */
        background-size: 4px 50px;
        color: #fff;
    }

    img {
        width: 115px;
        height: 160px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.25);
        margin: auto;
    }

    .pengarang {
        color: rgb(145, 154, 161);
        transition: .7s all;
    }

    .pengarang:hover {
        color: #222;
    }

</style>
