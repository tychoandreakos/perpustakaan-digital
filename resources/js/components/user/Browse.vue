<template>
    <div v-infinite-scroll="loadMore" infinite-scroll-disabled="busy" infinite-scroll-distance="limit">
        <div class="container">
            <h4 class="mb-4 mt-4">Browse Buku</h4>
            <div class="row">
                <div class="col col-md-4 mb-5 d-flex align-items-stretch" data-aos="slide-up" data-aos-offset="100"
                    data-aos-easing="ease-out-back" v-for="item in posts" :key="item.id">
                    <div class="card mb-4 mb-lg-0" style="width: 366px">
                        <div class="d-flex align-items-stretch">
                            <div :style="{backgroundColor: '#'+item.buku_transaksi[0].topik.warna}"
                                class="book-cover text-center pt-4 pb-4">
                                <a :href="'buku/'+item.slug"><img :src="'../storage/cover/' + item.gambar_sampul"
                                        alt="cover"></a>
                                <a :href="'buku/'+item.slug">
                                    <h6 style="font-size: 14.2px" class="text-white pl-4 pr-4 pt-4">
                                        {{ item.judul | capitalize }}</h6>
                                </a>
                                <a :href="'buku/'+item.slug">
                                    <p style="font-size: 14px" class="text-white"><i class="ni ni-single-02 mr-1"></i>
                                        <template v-for="transaksi in item.buku_transaksi">
                                            <a href="#" :key="transaksi.id">
                                                {{ transaksi.pengarang.nama_pengarang }},</a>
                                        </template>
                                    </p>
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
                                    <div class="label-topik"
                                        :style="{backgroundColor: '#'+item.buku_transaksi[0].topik.warna}">
                                        <span
                                            style="font-size: 14px;">{{ item.buku_transaksi[0].topik.jenis_topik | capitalize }}</span>
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
    import AOS from "aos";
    import "aos/dist/aos.css";

    export default {
        props: ['buku'],

        data() {
            return {
                posts: [],
                limit: 3,
                busy: false
            }
        },

        methods: {
            loadMore() {
                this.busy = true;
                axios.get(this.buku).then(response => {
                    const append = response.data.data.slice(
                        this.posts.length,
                        this.posts.length + this.limit
                    );
                    this.posts = this.posts.concat(append);
                    this.busy = false;
                });
            },
            getBuku() {
                axios.get(this.buku)
                    .then(res => this.posts = res.data.data)
                    .catch(err => console.log(err));
            }
        },


        created() {
            // this.getBuku();
            this.loadMore();
             AOS.init();
        }
    }

</script>

<style scoped>
    .card {
        border-radius: 0.75em !important;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        position: relative;
    }

    .book-cover {
        border-radius: 0.75em !important;
        height: 365px;
        width: 100%;
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
