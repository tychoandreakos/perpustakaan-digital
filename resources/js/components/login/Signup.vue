<template>
    <div>
        <div class="container">
            <form @submit.prevent="daftar">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" v-model="form.email" id="email">
                    <template v-if="err.email">
                        <span class="text-danger">{{ err.email[0] }}</span>
                    </template>
                </div>

                <div class="form-group">
                    <label for="text">Name</label>
                    <input type="text" class="form-control" v-model="form.name" id="text">
                    <template v-if="err.name">
                        <span class="text-danger">{{ err.name[0] }}</span>
                    </template>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" v-model="form.password" id="password">
                    <template v-if="err.password">
                        <span class="text-danger">{{ err.password[0] }}</span>
                    </template>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" v-model="form.password_confirmation" id="password">
                </div>

                <button type="submit" class="btn btn-success">Daftar</button>

                <button @click="$router.go(-1)" class="btn btn-primary">Login</button>

            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: ''
                },

                err: {}
            }
        },

         created() {
            if(User.loggedIn()){
                this.$router.push({
                    name: 'index'
                })
            }
        },

        methods: {
            daftar() {
                axios.post('/api/auth/daftar', this.form)
                    .then(res => {
                        User.responseAfterLogin(res)
                    })
                    .catch(err => this.err = err.response.data.errors)
            }
        }
    }

</script>

<style>

</style>
