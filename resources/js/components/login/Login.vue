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

        methods: {
            login() {
                axios.post('api/auth/login', this.form)
                .then(res => console.log(res.data))
                .catch(err => console.log(err.response.data))
            }
        }
    }

</script>

<style>

</style>
