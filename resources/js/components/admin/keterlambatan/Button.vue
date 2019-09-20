<template>
    <div>
        <template v-if="!loading">
            <button style="display: inline" @click="email(item.id)" type="button" class="btn btn-sm btn-white"
                data-toggle="tooltip" data-placement="top" :title="'Kirim email ke '+item.user.email">
                Kirim Email
            </button>
        </template>
        <template v-else>
            <spinner-component></spinner-component>
        </template>
    </div>
</template>

<script>
 import Spinner from '../tools/Spanner';
    export default {
         components:{
            SpinnerComponent: Spinner,
        },

        data() {
            return {
                loading: false,
            }
        },

        props: [
            'item',
            'send',
        ],
        
        methods: {
            email(item) {
                this.loading = true;
                axios.post(this.send, {
                    id: item
                })
                .then(res => {
                   this.$swal({
                                position: 'top-end',
                                type: 'success',
                                title: 'Email Berhasil Dikirimkan',
                                showConfirmButton: false,
                                timer: 3000
                            });

                             setTimeout(() => {
                                this.loading = false;
                                // window.location = this.index;
                            }, 3200)
                })
                .catch(err => console.log(err));
            },
        }
    }

</script>

<style>

</style>
