<template>
    <div class="row">
        <div class="col-xl-12 mb-12 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Sirkulasi Digital</h3>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <form @submit.prevent="update">

                        <div class="form-group">
                            <label for="f">Pola Eksemplar Buku</label>
                            <multiselect v-model="pola_eksemplar" :options="option" placeholder="Select one"
                                label="pola_eksemplar" track-by="pola_eksemplar">
                                <template slot="singleLabel"
                                    slot-scope="{ option }"><strong>{{ option.pola_eksemplar | capitalize}}</strong>
                                </template>
                            </multiselect>
                        </div>
                        <button type="submit" class="btn btn-success mb-4">Pinjam Buku</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    import Spinner from '../tools/Spanner';
    export default {
        props: ['kode', 'kode2', 'index', 'fetch'],
        components: {
            SpinnerComponent: Spinner,
            Multiselect,
        },

        data() {
            return {
                pola_eksemplar: '',

                wow: {
                    user_id: this.user_id,
                    id: this.id,
                    pola_eksemplar: this.eksemplar,
                },
            }
        },

        created() {
            this.getData();
        },

         methods: {

            getData() {
                axios.get(this.fetch)
                    .then(res => this.option = res.data)
                    .catch(err => console.log(err))
            },

            update() {
                console.log(this.wow);
                axios.post(this.kode2, this.wow)
                        .then(res => {
                            this.$swal({
                                position: 'top-end',
                                type: 'success',
                                title: res.data.message.toUpperCase(),
                                showConfirmButton: false,
                                timer: 3000
                            });

                            setTimeout(() => {
                                window.location = this.index;
                            }, 3200)
                        })
                        .catch(err => console.log(err.data))
            },

         }
    }

</script>

<style>

</style>
