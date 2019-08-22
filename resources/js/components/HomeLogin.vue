<template>
    <div>

        <!-- hello -->
        <div class="jumbotron">
            <h1 class="display-4">Hello, {{ this.username }}</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention
                to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>

        <!-- popular -->
        <app-popular :buku="this.buku"></app-popular>

        <!-- search -->
        <app-search></app-search>

        <!-- discover -->
        <div class="container">
            <div class="row">
                <div class="col col-md-9">
                    <!-- Temukan: Pemrograman -->
                    <app-discover :topik="this.topik"></app-discover>

                    <!-- Temukan: Jurnal -->
                    <app-discover :topik="this.topik"></app-discover>

                </div>

                <div class="col col-md-3">
                    <app-top></app-top>
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
    import Top from './user/Top'
    import Search from './user/SearchUser'

    export default {
        props: ['buku', 'topik', 'fetch', 'username'],
        components: {
            AppPopular: Popular,
            AppBrowse: Browse,
            AppDiscover: Discover,
            AppTop: Top,
        }
    }

</script>

<style>

</style>
