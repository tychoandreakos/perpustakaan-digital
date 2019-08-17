<template>
    <div>
        <!-- popular -->
        <app-popular :buku="this.buku"></app-popular>

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
