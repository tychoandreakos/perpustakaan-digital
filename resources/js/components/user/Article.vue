<template>
    <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500">

        <div class="container mt-5">
            <div class="text-center pl-5 pr-5">
                <span>{{ berita.updated_at }}</span>
                <h3>{{ berita.judul }}</h3>
                <!-- <p style="font-size: 16px;">{{ berita.user.name }}</p> -->
            </div>

            <!-- <img src="" alt=""> -->

            <div class="article">
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

                        <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/66461c82-1723-4c50-94f0-46aa15867139/d7oe2v3-68af647d-09bc-42f0-afbe-01746997914a.jpg/v1/fill/w_1024,h_576,q_75,strp/coldplay___magic__alternate_album_cover__by_ruffsnap_d7oe2v3-fullview.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9NTc2IiwicGF0aCI6IlwvZlwvNjY0NjFjODItMTcyMy00YzUwLTk0ZjAtNDZhYTE1ODY3MTM5XC9kN29lMnYzLTY4YWY2NDdkLTA5YmMtNDJmMC1hZmJlLTAxNzQ2OTk3OTE0YS5qcGciLCJ3aWR0aCI6Ijw9MTAyNCJ9XV0sImF1ZCI6WyJ1cm46c2VydmljZTppbWFnZS5vcGVyYXRpb25zIl19.MHRhGwCJrxzGBL8bb3f4wn73ZVxDuPOGFvQR6zydfM4"
                            alt="">

                        <p>{{ berita.isi }}</p>
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
