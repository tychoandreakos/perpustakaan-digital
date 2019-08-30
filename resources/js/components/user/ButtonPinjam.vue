<template>
    <div>
        <form @submit.prevent="save">
            <button class="btn btn-primary-soft" type="submit">
                Pinjam
            </button>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['route', 'judul'],

        methods: {
            save() {
                this.$swal({
                    title: 'Apakah anda yakin ingin meminjam koleksi buku?',
                    text: 'Judul: ' +this.judul,
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Pinjam'
                }).then((result) => {
                    if (result.value) {
                        axios.get(this.route)
                            .then(res => {
                                if(res.data.msg) {
                                    this.$swal({
                                    // position: 'top-end',
                                    type: 'success',
                                    title: res.data.message.toUpperCase(),
                                    showConfirmButton: true,
                                    // timer: 2500
                                })
                                } else {
                                        this.$swal({
                                    // position: 'top-end',
                                    type: 'warning',
                                    title: res.data.message.toUpperCase(),
                                    showConfirmButton: true,
                                    // timer: 2500
                                })
                                }
                            })
                            .catch(err => console.log(err))
                    }
                })
            }
        }
    }

</script>

<style scoped>
    a {
        text-decoration: none;
    }

</style>
