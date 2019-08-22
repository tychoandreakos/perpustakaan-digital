<template>
    <div class="mt-4 sticky">
        <h4>Top Peminjam</h4>

        <div class="card">
            <div class="card-body">
                <li class="a mb-4" v-for="(n,index) in 5" :key="index">
                    <p class="b">{{ index + 1 }}</p>
                    <div class="panel ml-3">
                        <h6><a class="judul" href="#">Elang Indra Putra</a></h6>
                        <span>Teknik Informatika</span>
                    </div>
                </li>

                <hr>
                <div class="text-center"><a class="pengarang" href="#">Lihat Lainnya</a></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

    }

</script>

<style lang="scss" scoped>
    .card {
        border-radius: 15px;
        background: #f2f2f2 !important;
        border: none;
    }

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

    .a {
        display: flex;
        justify-content: center;
        align-content: center;
        list-style: none;
    }

    .b {
        align-self: center;
    }

    .pengarang {
        color: rgb(145, 154, 161);
        transition: .7s all;
    }

    .pengarang:hover {
        color: #222;
    }

</style>
