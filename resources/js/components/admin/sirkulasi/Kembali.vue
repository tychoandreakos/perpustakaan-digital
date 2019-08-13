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
                                            <multiselect v-model="form" :options="options" :custom-label="nameWithLang"
                                                placeholder="Select one" label="id" track-by="id">
                                                <template slot="singleLabel"
                                                    slot-scope="{ option }"><strong>{{ option.user.id }}</strong> -
                                                    <strong>
                                                        {{ option.user.name }}</strong></template>
                                            </multiselect>
                                        </div>

                                        <template v-if="loading">
                                            <div class="pull-right">
                                                <spinner-component></spinner-component>
                                            </div>
                                        </template>
                                        <template v-else>
                                            <button :disabled="ds" class="btn btn-icon btn-3 btn-primary" type="submit">
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
        props: ['fetch', 'back'],
        data() {
            return {
                loading: false,
                datas: [],
                options: [],
                form: {}
            }
        },

        computed: {
            ds() {
                return (this.form != '' ? false : true)
            },
            
        },

        methods: {
            getPinjaman() {
                axios.post('/pustakawan/pinjaman', {
                        params: {
                            id: this.form.user.id
                        }
                    })
                    .then(res => this.pinjam = res.data.data)
                    .catch(err => console.log(err))
            },

            go() {
                this.loading = true;
                axios.get('/pustakawan/pinjaman', {
                        params: {
                            id: this.form.user.id
                        }
                    })
                    .then(res => this.pinjam = res.data.data)
                    .catch(err => console.log(err))
                setTimeout(() => {
                    this.datas = false;
                    this.loading = false
                }, 2000);

            },
        },


        created() {
            this.getAnggota();
        },
    }

</script>

