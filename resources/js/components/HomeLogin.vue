<template>
    <div>
        <!-- popular -->
        <app-popular :buku="this.buku"></app-popular>

        <!-- Temukan: Pemrograman -->
       <div class="container mt-4 mb-2">
            <h4>Temukan: Pemrograman</h4>
       </div>

        <!-- Temukan: Pemrograman -->
       <div class="container mt-4 mb-2">
            <h4>Temukan: Jurnal</h4>
       </div>

        <!-- Temukan: Pemrograman -->
       <div class="container mt-4 mb-2">
            <h4>Temukan: Manajemen</h4>
       </div>

        <!-- Temukan: Pemrograman -->
       <div class="container mt-4 mb-2">
            <h4>Temukan: Arsitek</h4>
       </div>

        <!-- browse buku -->
        <app-browse :buku="this.buku"></app-browse>
    </div>
</template>

<script>
    import Popular from './user/Popular'
    import Browse from './user/Browse'

    export default {
        props: ['buku'],
        components: {
            AppPopular: Popular,
            AppBrowse: Browse,
        }
    }

</script>

<style>

</style>
