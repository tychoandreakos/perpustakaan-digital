<template>
    <div>
        <div>
            <div class="container">
                <h4 class="mb-4 mt-4">Buku Paling Populer</h4>
            </div>
            <!-- swiper -->
            <swiper :options="swiperOption">
                <swiper-slide v-for="item in popular" :key="item.id">
                    <div class="row p-5">
                        <!-- image -->
                        <div class="col col-lg-5">
                            <img :src="'../storage/cover/'+ item.gambar_sampul" />
                        </div>
                        <div class="col col-lg-7">
                            <a href="#" class="popular-link">
                                <h5>{{ item.judul | short }}</h5>
                            </a>
                            <template v-for="transaksi in item.buku_transaksi">
                                <p style="margin: 0" :key="transaksi.id">{{ transaksi.pengarang.nama_pengarang}}</p>
                            </template>
                        </div>
                    </div>
                </swiper-slide>
            </swiper>
        </div>
    </div>
</template>

<script>
    import 'swiper/dist/css/swiper.css'
    import {
        swiper,
        swiperSlide
    } from 'vue-awesome-swiper'

    export default {
        components: {
            swiper,
            swiperSlide
        },

        props: ['buku'],

        filters: {
            short(val) {
                if (val.length > 64) {
                    return val.substring(0, 64) + ' ....';
                } else {
                    return val;
                }
            }
        },

        data() {
            return {
                swiperOption: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                    loopFillGroupWithBlank: true,
                },

                popular: {},
            }
        },

        methods: {
            getPopular() {
                axios.get(this.buku)
                    .then(res => this.popular = res.data.data)
                    .catch(err => console.log(err));
            }
        },


        created() {
            this.getPopular();
        }
    }

</script>

<style lang="scss" scoped>
    .swiper-slide {
        width: 416px !important;
        background: linear-gradient(180deg, #9DDAFE 0%, #C4E9FF 100%);
        border-radius: 15px;
        height: 250px;
        cursor: pointer;

        &:first-child {
            border-radius: 0 15px 15px 0;
        }
    }

    .popular-link {
        text-decoration: none;
        transition: 0.7s ease-in-out all;
    }

    .popular-link:hover {
        color: #000 !important;
    }

    .swiper-slide:nth-child(2n) {
        background: linear-gradient(180deg, #D4CBFF 0%, #BDB3FF 100%);
        box-shadow: 0px 4px 25px rgba(0, 0, 0, 0.103);
    }

    .swiper-slide:nth-child(3n) {
        background: linear-gradient(180deg, #FDC8CE 0%, #FAA9B4 100%);
    }

    .item {
        background: linear-gradient(180deg, #9DDAFE 0%, #C4E9FF 100%);
        box-shadow: 0px 4px 25px rgba(0, 0, 0, 0.17);
        border-radius: 15px;

    }

    img {
        width: 115px;
        height: 160px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.25);
    }

</style>
