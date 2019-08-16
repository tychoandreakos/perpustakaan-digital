<template>
    <div class="row">
        <div class="col-xl-12 mb-12 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Daftar Berita</h3>
                        </div>
                        <div class="col text-right">
                            <a :href="this.route" class="btn btn-sm btn-primary"><i
                                    class="ni ni-fat-add text-white"></i> Posting Berita</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th scope="col" style="width: 21%;">Aksi</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Isi</th>
                                <th scope="col">Terakhir Diperbaharui</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in datas.data" :key="item.id">
                                <th scope="row" style="width: 19%">
                                    <a :href="edit(item.id)" class="btn btn-primary btn-sm"><i
                                            class="ni ni-check-bold text-white"></i> Edit</a>
                                    <button @click="deleted(item.id)" class="btn btn-danger btn-sm"><i
                                            class="ni ni-fat-remove text-white"></i> Hapus</button>
                                </th>
                                <td>
                                    {{ item.judul | capitalize}}
                                </td>
                                <td>
                                   <p v-html="item.isi.substring(0, 100) + ' .....'"></p>
                                </td>
                                <td>
                                    {{ item.updated_at }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mx-auto mt-3">
                    <pagination :data="datas" @pagination-change-page="getResults"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['route', 'fetch', 'index'],
        data() {
            return {
                datas: {},
            }
        },

        filters: {
            news(value) {
                return value.substring(0, 100) + ' .....';
            }
        },

        methods: {
            edit(val) {
                return `berita/${val}/edit`;
            },

            deleted(val) {
                this.$swal({
                    title: 'Hapus Data?',
                    text: "Data yang sudah dihapus tidak dapat dikembalikan",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, hapus!'
                }).then((result) => {
                    if (result.value) {
                        axios.post('/pustakawan/berita/' + val, {
                                _method: 'DELETE'
                            })
                            .then(res => {
                                this.$swal({
                                    position: 'top-end',
                                    type: 'success',
                                    title: res.data.message.toUpperCase(),
                                    showConfirmButton: false,
                                    timer: 1500
                                });

                                setTimeout(() => {
                                    window.location = this.index;
                                }, 1800);
                            })
                            .catch(err => console.log(err))
                    }
                });
            },

            getResults(page = 1) {
                return axios.get(this.fetch + '?page=' + page)
                    .then(res => this.datas = res.data)
                    .catch(err => console.log(err));
            }
        },

        created() {

            Fire.$on('searching', () => {
                let query = this.$parent.search;
                axios.get('/pustakawan/berita-search?q=' + query)
                    .then(res => {
                        // console.log(res)
                        this.datas = res.data
                    })
                    .catch(err => console.log(err))
            })

            this.getResults();
        },
    }

</script>

<style scoped>
    .table td,
    .table th {
        font-size: 0.8125rem;
        white-space: normal !important;
    }
</style>
