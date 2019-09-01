<template>
    <div>
        <form @submit.prevent="save">
            <button type="submit" class="float-right btn btn-sm btn-danger">Batalkan Verifikasi</button>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['kode', 'batal', 'judul', 'index'],
        methods: {
            save() {
                this.$swal({
                    title: 'Apakah anda ingin membatalkan peminjaman buku ini?',
                    text: 'Judul: ' + this.judul,
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Batalkan'
                }).then((result) => {
                    if (result.value) {
                        axios.post(this.batal, {
                                id: this.kode
                            })
                            .then(res => {
                                this.$swal({
                                    position: 'top-end',
                                    type: 'success',
                                    title: res.data.message.toUpperCase(),
                                    showConfirmButton: false,
                                    timer: 2500
                                })

                                setTimeout(() => {
                                    window.location = this.index;
                                }, 2800);
                            })
                            .catch(err => console.log(err))
                    }
                })
            }
        }
    };

</script>
