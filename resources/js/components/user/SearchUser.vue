<template>
    <div class="pl-5 pr-5" style="margin-top: -40px;">
        <h5 class="ml-3 mb-3 text-center text-white">Halo {{ this.username }}, Cari buku apa hari ini?</h5>
        <form @submit.prevent="submit">
            <div class="input-group rounded-pill p-1 bg-light">
                <input type="search" placeholder="Masukkan satu atau lebih kata kunci dari judul pengarang, atau subyek"
                    style="box-shadow: none;" aria-describedby="button-addon3"
                    class="form-control bg-light border-0 ml-2">
                <div class="input-group-append border-0">
                    <button id="button-addon3" type="button" class="btn btn-link text-success"><i
                            class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['username'],
        methods: {
            submit() {

            }
        }
    }

</script>

<style scoped>


</style>
