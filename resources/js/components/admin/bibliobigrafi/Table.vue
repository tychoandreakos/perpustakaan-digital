<template>
    <div class="row">
        <div class="col-xl-12 mb-12 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Biliobigraphy</h3>
                        </div>
                        <div class="col text-right">
                            <a :href="this.route" class="btn btn-sm btn-primary">Tambah Biliobigraphy</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Aksi</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col">Salinan</th>
                                <th scope="col">ISBN</th>
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
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum atque, et maxime
                                    accusantium doloremque alias! In laborum ducimus dicta fugiat.
                                </td>
                                <td>
                                    50
                                </td>
                                <td>
                                    878-948-3-94049
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
         props: ['route', 'fetch', 'index'],
    }

</script>

<style scoped>
    .table td,
    .table th {
        font-size: 0.8125rem;
        white-space: normal !important;
    }

</style>
