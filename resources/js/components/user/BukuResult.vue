<template>
    <div>
        <div class="heading">
            <div class="container">
                <div class="row">
                    <div class="col col-md-7 pt-5">
                        <h5>{{ buku.judul }}</h5>
                        <a v-if="buku.pdf" :href="'/baca/'+buku.slug" class="btn btn-outline-primary">Baca</a>
                        <button type="button" class="btn btn-outline-primary">Unduh</button>
                        <button type="button" class="btn btn-outline-primary">Pinjam</button>
                    </div>
                    <div class="col col-md-5">
                        <img :src="'../storage/cover/'+buku.gambar_sampul" alt="cover">
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

</style>
