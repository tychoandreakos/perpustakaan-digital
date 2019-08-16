<template>
    <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500">

        <div class="container mt-5 ">
            <div class="text-center pl-5 pr-5">
                <span>{{ berita.updated_at }}</span>
                <h3>{{ berita.judul }}</h3>
                <!-- <p style="font-size: 16px;">{{ berita.user.name }}</p> -->
            </div>

            <!-- <img src="" alt=""> -->

            <div class="article mt-5">
                <div class="row">
                    <div class="col col-md-1 col-lg-1 mr-5">
                        <a href="#" style="width: 104px;" class="btn btn-primary"><i class="fa fa-twitter"></i>
                            Twitter</a>
                        <a style="width: 104px;" href="#" class="btn btn-primary mb-2 mt-2"><i
                                class="fa fa-linkedin"></i> Linkedin</a>
                        <a style="width: 104px;" href="#" class="btn btn-primary"><i class="fa fa-facebook"></i>
                            Facebook</a>
                    </div>
                    <div class="col col-lg-10 col-md-10">

                        <img :src="'../storage/berita/'+ berita.img" alt="gambar">

                        <p v-html="berita.isi"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        props: ['berita']
    }

</script>


<style lang="scss" scoped>
    .article {

        img {
            width: 100%;
            border-radius: 3px;
            margin-bottom: 15px;
        }

        p {
            line-height: 33.1833px;
            font-size: 19px;
            letter-spacing: -0.004em;
        }
    }

</style>
