<template>
    <div class="row">
        <div class="col-xl-12 mb-12 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">GMD</h3>
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
                            <tr v-for="n in 5" :key="n">
                                <th scope="row" style="width: 19%">
                                    <button class="btn btn-primary btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </th>
                                <td>
                                   001
                                </td>
                                <td>
                                  Lukisan
                                </td>
                                <td>
                                    3 hari yang lalu
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
        props: ['route'],
    }

</script>

<style scoped>

</style>
