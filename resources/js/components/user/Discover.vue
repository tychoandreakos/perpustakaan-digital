<template>
    <div class="mt-4 mb-2">
        <h4>Temukan: {{ data3.jenis_topik | capitalize }}</h4>
        <template v-if="item.length > 0">
            <div class="float-right">
                <span><a class="pengarang" :href="'lihat-topik/' + data3.slug">Lihat Lainnya</a></span>
            </div>
        </template>
        <div class="clearfix"></div>
        <div class="row mt-4">
            <template v-if="item.length < 1">
                <h5 style="width: 100%" class="text-center">Belum ada data!</h5>
            </template>
            <template v-else>
                <div class="col col-md-6 mb-5" v-for="(n, index) in item" :key="index">
                    <div class="row">
                        <div class="col-md-4">
                            <img :src="'../storage/cover/' + n.gambar_sampul" alt="img">
                        </div>

                        <div class="col-md-8">
                            <h6 class="pt-3"><a :href="'/buku/'+n.slug" class="judul">{{ n.judul }}</a></h6>
                            <span v-for="buku in n.buku_transaksi" :key="buku"><a class="pengarang" href="#">
                                    {{ buku.pengarang.nama_pengarang }},
                                </a></span>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['topik'],
        data() {
            return {
                data3: {},
                item: {} | false,
            }
        },

        methods: {
            getTopik() {
                axios.get(this.topik)
                    .then(res => {
                        this.data3 = res.data
                        axios.get('item-topik-fetch/' + res.data.id)
                            .then(res => this.item = res.data)
                            .catch(err => console.log(err))
                    })
                    .catch(err => console.log(err))
            },

            // getData() {
            //     axios.get('item-topik-fetch/' + this.data3.id)
            //         .then(res => this.item = res.data)
            //         .catch(err => console.log(err))
            // }
        },

        created() {
            this.getTopik();
            // this.getData();
            // console.log(this.data3.id)
        }
    }

</script>

<style scoped>
    :root {
        --mainColor: #ff9800;
    }

    img {
        width: 115px;
        height: 160px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.25);
    }

    .pengarang {
        color: rgb(145, 154, 161);
        transition: .7s all;
    }

    .pengarang:hover {
        color: #222;
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

</style>
