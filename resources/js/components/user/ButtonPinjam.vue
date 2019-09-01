<template>
    <div v-if="dis">
        <form @submit.prevent="save">
            <button class="btn btn-primary-soft" type="submit">
                Pinjam
            </button>
        </form>
    </div>
    <div v-else>
        <h5 class="text-danger">Koleksi Tidak Tersedia Untuk Dipinjam.</h5>
    </div>
</template>

<script>
    export default {
        props: ['route', 'judul', 'check'],

        computed: {
            dis() {
                return (this.check == 0 ? false : true);
            }
        },

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
