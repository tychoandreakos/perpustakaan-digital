<template>
    <div>
        <form class="mb-6" @submit.prevent="simpan">
            <div class="form-group">
                <label for="keperluan">
                   NPM / ID*
                </label>
                <input autocomplete="off" type="text" v-model="form.user_id" class="form-control" id="user_id"
                    placeholder="Masukkan NPM / ID">
                <template v-if="err.user_id">
                    <span class="text-danger">{{ err.keperluan[0] }}</span>
                </template>
            </div>



            <!-- Submit -->
            <template v-if="loading">
                <div class="spinner-border text-right text-success" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </template>
            <template v-else>
                <button :disabled="!check" class="btn btn-block btn-primary" type="submit">
                    Submit
                </button>
            </template>


        </form>
    </div>
</template>

<script>
    export default {

        computed: {
            check() {
                let user_id = this.form.user_id;

                return user_id;
            }
        },

        props: [
            'store',
            'index'
        ],

        data() {
            return {

                form: {
                    user_id: '',
                    _method: 'POST'
                },
                loading: false,
                err: {},
            }
        },



        methods: {
            simpan() {
                this.loading = true;
                axios.post(this.store, this.form)
                    .then(res => {
                      if(!res.data.type) {
                            this.$swal({
                            position: 'top-end',
                            type: 'warning',
                            title: res.data.message.toUpperCase(),
                            showConfirmButton: false,
                            timer: 4000
                        });

                          this.form.user_id = '';
                        setTimeout(() => {
                            this.loading = false;
                            this.err = {};
                        }, 3700);
                      } else {
                          this.$swal({
                            position: 'top-end',
                            type: 'success',
                            title: res.data.message.toUpperCase(),
                            showConfirmButton: false,
                            timer: 3500
                        });

                          this.form.user_id = '';
                        setTimeout(() => {
                            this.loading = false;
                            this.err = {};
                            window.location = this.index;
                        }, 3700);
                      }
                    })
                    .catch(err => {
                        this.err = err.response.data.errors;
                        this.loading = false;
                    })
            }

        },

    }

</script>

<style scoped>
    * {
        overflow: hidden !important;
    }

</style>
