<template>
    <div class="row">
        <div class="col-xl-12 mb-12 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Histori Peminjaman</h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID Anggota</th>
                                <th scope="col">Nama Anggota</th>
                                <th scope="col">Tipe Keanggotaan</th>
                                <th scope="col">Kode Eksemplar</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col">Tanggal Pinjam</th>
                                <th scope="col">Tanggal Kembali</th>
                                <th scope="col">Perubahan Terakhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in datas.data" :key="item.id">
                                <td>
                                    {{ item.user_id | capitalize}}
                                </td>
                                <td>
                                    {{ item.user.name | capitalize}}
                                </td>
                                 <td>
                                    {{ item.user.anggota_transaksi[0].tipe_anggota.tipe_anggota | capitalize}}
                                </td>
                                 <td>
                                    {{ item.bibliobigrafi.pola_eksemplar | capitalize}}
                                </td>
                                 <td>
                                    {{ item.bibliobigrafi.buku.judul | capitalize}}
                                </td>
                                 <td>
                                    {{ item.tgl_pinjam}}
                                </td>
                                 <td>
                                    {{ item.tgl_kembali}}
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

        methods: {
            edit(val) {
                return `kota/${val}/edit`;
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
                        axios.post('/pustakawan/kota/' + val, {
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
                axios.get('/pustakawan/kota-search?q=' + query)
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

    .buku {
        color: #5e72e4;
        cursor: pointer;
    }

    .buku:hover {
        color: #233dd2;
    }
</style>
