<template>
    <div id="news">
        <div class="container">
            <div class="mt-5">
                <h5 class="mb-3">Berita Perpustakaan</h5>
                <div class="row">
                    <template v-for="news in halo">
                        <div class="col col-lg-4 d-flex align-items-stretch" :key="news.id">
                            <div class="card">
                                <img src="https://cdn.dribbble.com/users/772985/screenshots/6313407/3_2.jpg"
                                    class="card-img-top" alt="">
                                <div class="card-body">
                                    <!-- <router-link tag="a" :to="{ name: 'news', params: {slug: news.slug} }"> -->
                                   <a class="link" href="#"><h5>{{ news.judul }}</h5></a>
                                    <!-- </router-link> -->
                                    <p class="card-text">{{ news.isi | news }}</p>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        // computed: {
            props: ['berita'],

             filters: {
            news(value) {
                return value.substring(0, 150) + ' .....';
            }
        },

            data(){
                return {
                    halo: this.berita.splice(0, 3),
                }
            }

            // computedNews() {
            //     // return [{
            //     //         id: 1,
            //     //         judul: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod, dignissimos!',
            //     //         isi: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel excepturi deserunt nihil cumque necessitatibus voluptatum cupiditate, quaerat ipsa libero nostrum.'
            //     //     },

            //     //     {
            //     //         id: 2,
            //     //         judul: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod, dignissimos!',
            //     //         isi: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel excepturi deserunt nihil cumque necessitatibus voluptatum cupiditate, quaerat ipsa libero nostrum.'
            //     //     },

            //     //     {
            //     //         id: 3,
            //     //         judul: 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod, dignissimos!',
            //     //         isi: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel excepturi deserunt nihil cumque necessitatibus voluptatum cupiditate, quaerat ipsa libero nostrum.'
            //     //     },
            //     // ];
            //     // return this.berita;
            // }
        // }
    }

</script>

<style lang="scss" scoped>
    #news {
        width: 100%;
        .card {
            overflow: hidden;
            position: relative;
            cursor: pointer;
            border-radius: 5px;
        }

        .card img {
            transition: transform .25s;
            width: 100%;
            cursor: pointer;
        }

        .card-body {
            z-index: 4;
        }

        .card:hover img {
            transform: scale(1.1);
            //  cursor: pointer;
        }

        link:hover {
            color: blue !important;
        }

        .card:hover:after {
            opacity: 1;
        }
    }

</style>
