<template>
    <div>
        <div class="searchIndex mt-3">
            <div class="search">
                <input type="text" v-model="search" placeholder="Masukkan satu atau lebih kata kunci dari judul pengarang, atau subyek" @keyup.enter="searchHit">
               <router-link :to="{name: 'result'}" tag="a" class="cari btn btn-success" @click="searchHit">Cari</router-link>

                <a class="lanjutan" href="#">Pencarian Lanjutan</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    
}
</script>


<style lang="scss" scoped>
    .searchIndex {

        text-align: left;

        .search {
            width: 85%;
            height: 50px;
            position: absolute;
            margin: 10px 0;
            // left: -30px;
            // border: 1px solid #ccc;
            background: #fff;
            color: #fff;

            input {
                position: absolute;
                left: 30px;
                right: 0;
                width: 90%;
                top: 12px;
                border: none;
            }

            .cari {
                position: absolute;
                right: -95px;
                padding: 13.5px 30px;
                border-radius: 0 7px 7px 0;
              
            }


            .lanjutan {
                // display: block;
                position: absolute;
                width: 100%;
                text-align: center;
                bottom: -40px;
                font-size: 1.05em;
            }
        }
    }

</style>
