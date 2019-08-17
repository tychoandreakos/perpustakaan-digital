<template>
    <div>
        <!-- popular -->
        <app-popular :buku="this.buku"></app-popular>
    </div>
</template>

<script>
    import Popular from './user/Popular'
    export default {
        props: ['buku'],
        components: {
            AppPopular: Popular,
        }
    }

</script>

<style>

</style>
