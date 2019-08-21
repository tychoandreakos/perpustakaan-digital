<template>
    <div>
        <!-- popular -->
        <app-popular :buku="this.buku"></app-popular>

        <div class="container">
            <div class="row">
            <div class="col col-md-9">
                <!-- Temukan: Pemrograman -->
                <app-discover :topik="this.topik"></app-discover>

                <!-- Temukan: Jurnal -->
               <app-discover :topik="this.topik"></app-discover>

            </div>

            <div class="col col-md-3">
                Top Listened
            </div>
        </div>
        </div>

        <!-- browse buku -->
        <app-browse :buku="this.buku"></app-browse>
    </div>
</template>

<script>
    import Popular from './user/Popular'
    import Browse from './user/Browse'
    import Discover from './user/Discover'

    export default {
        props: ['buku', 'topik', 'fetch'],
        components: {
            AppPopular: Popular,
            AppBrowse: Browse,
            AppDiscover: Discover,
        }
    }

</script>

<style>

</style>
