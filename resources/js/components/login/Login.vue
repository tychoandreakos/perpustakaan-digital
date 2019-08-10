<template>
    <div>
        <div class="container">
            <form @submit.prevent="login">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" v-model="form.email" id="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" v-model="form.password" id="password" required>
                </div>

                <button type="submit" class="btn btn-success">Login</button>

                <router-link :to="{name: 'daftar'}" class="btn btn-primary">Daftar</router-link>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    email: '',
                    password: ''
                }
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
            login() {
                User.login(this.form);
            }
        }
    }

</script>

<style>

</style>
