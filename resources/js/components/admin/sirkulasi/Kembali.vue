<template>
    <div class="row">
        <div class="col-xl-12 mb-12 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Pengembalian Buku</h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <div class="card-body">
                        <form @submit.prevent="go">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mt-4">
                                        <label for="">Cari Eksemplar Yang Sedang Dipinjam</label>
                                        <multiselect v-model="form" :options="option" placeholder="Select one"
                                            label="pola_eksemplar" track-by="pola_eksemplar">
                                            <template slot="singleLabel"
                                                slot-scope="{ option }"><strong>{{ option.pola_eksemplar | capitalize}}</strong>
                                            </template>
                                        </multiselect>
                                    </div>

                                    <template v-if="loading">
                                        <div class="pull-right">
                                            <spinner-component></spinner-component>
                                        </div>
                                    </template>
                                    <template v-else>
                                        <button class="btn btn-icon btn-3 btn-primary" type="submit">
                                            <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>

                                            <span class="btn-inner--text">Lanjut</span>

                                        </button>
                                    </template>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    import Spinner from '../tools/Spanner';
    export default {
        components: {
            Multiselect,
            SpinnerComponent: Spinner,
        },
        props: ['fetch', 'kembali', 'index'],
        data() {
            return {
                loading: false,
                datas: [],
                option: [],
                form: {}
            }
        },

        methods: {
            getData() {
                axios.get(this.fetch)
                    .then(res => this.option = res.data)
                    .catch(err => console.log(err))
            },

            // nameWithLang({
            //     pola_eksemplar,
            // }) {
            //     return pola_eksemplar
            // },

            go() {
                this.loading = true;
                axios.get(this.kembali, {
                        params: {
                            id: this.form.id
                        }
                    })
                    .then(res => {
                        console.log(res.data.condition)
                        if (res.data.condition) {
                            this.$swal({
                                position: 'top-end',
                                type: 'success',
                                title: res.data.message.toUpperCase(),
                                showConfirmButton: false,
                                timer: 2500

                            });
                            setTimeout(() => {
                                window.location = this.index;
                            }, 2800);
                        } else {
                              this.$swal({
                            position: 'top-end',
                            type: 'error',
                            title: res.data.message.toUpperCase(),
                            showConfirmButton: false,
                            timer: 2500

                        });

                         setTimeout(() => {
                                 this.loading = false;
                            }, 2800);
                       
                        }
                    })
                    .catch(err => console.log(err))

            },
        },


        created() {
            this.getData();
        },
    }

</script>
