<template>
    <div>
        <div class="container">
            <h5 class="mb-4 mt-4">Browse Buku</h5>
            <div class="row">
                <div class="col col-md-4 mb-5 d-flex align-items-stretch" v-for="item in buku" :key="item.id">
                    <div class="card mb-4 mb-lg-0">
                       <div class="d-flex align-items-stretch">
                            <div style="background: #637bff;" class="book-cover text-center pt-4 pb-4">
                            <a href="#"><img :src="'../storage/cover/' + item.gambar_sampul" alt="cover"></a>
                           <a href="#"> <h6 class="text-white pl-4 pr-4 pt-4">{{ item.judul | capitalize }}</h6></a>
                            <a href="#">
                                <h6 style="font-size: 15px" class="text-white"><i class="ni ni-single-02 mr-1"></i> 
                                <template v-for="transaksi in item.buku_transaksi">
                                   <a href="#" :key="transaksi.id"> {{ transaksi.pengarang.nama_pengarang }},</a>
                                </template>
                                </h6>
                            </a>
                        </div>
                       </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col col-md-6">
                                    <label for="">ISBN</label>
                                    <p style="font-size: 14px">978-1491954621</p>
                                </div>
                                <div class="col col-md-6 pt-2">
                                    <div class="label-topik" style="background: #637bff;">
                                        <span style="font-size: 14px;">Jurnal</span>
                                    </div>
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
        props: ['buku'],

        data() {
            return {
                buku: {},
            }
        },

        methods: {
            getBuku() {
                axios.get(this.buku)
                    .then(res => this.buku = res.data.data)
                    .catch(err => console.log(err));
            }
        },


        created() {
            this.getBuku();
        }
    }

</script>

<style scoped>
    .card {
        border-radius: 0.75em !important;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .book-cover {
        border-radius: 0.75em !important;
        height: 365px;
    }

    img {
        width: 115px;
        height: 160px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.25);
    }

    .label-topik {
        padding: 4px;
        text-align: center;
        color: #fff;
        border-radius: 5px;
    }

    a {
        color: #fff;
        transition: .7s all;
    }

    a:hover {
        color: #000;
    }

</style>
