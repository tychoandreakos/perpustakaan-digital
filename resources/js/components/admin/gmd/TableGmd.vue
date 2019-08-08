<template>
    <div class="row">
        <div class="col-xl-12 mb-12 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Daftar GMD</h3>
                        </div>
                        <div class="col text-right">
                            <a :href="this.route" class="btn btn-sm btn-primary">Tambah GMD</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Aksi</th>
                                <th scope="col">Kode GMD</th>
                                <th scope="col">Nama GMD</th>
                                <th scope="col">Perubahan Terakhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="gmd in data" :key="gmd.id">
                                <th scope="row" style="width: 19%">
                                    <a :href="edit(gmd.id)" class="btn btn-primary btn-sm">Edit</a>
                                    <button @click="deleted(gmd.id)" class="btn btn-danger btn-sm">Hapus</button>
                                </th>
                                <td>
                                    {{ gmd.kode_gmd }}
                                </td>
                                <td>
                                    {{ gmd.nama_gmd }}
                                </td>
                                <td>
                                    {{ gmd.updated_at }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
                data: {},
            }
        },

        methods: {
            edit(val) {
                return `gmd/${val}/edit`;
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
                        axios.post('/pustakawan/gmd/' + val, {
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
            }
        },

        created() {
            axios.get(this.fetch)
                .then(res => this.data = res.data.data)
                .catch(err => console.log(err));
        }
    }

</script>

<style scoped>

</style>
