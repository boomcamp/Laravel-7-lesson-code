<template>
    <div>
        <h3 class="text-center">Enter your login details</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="doLogin">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" v-model="login.email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" v-model="login.password">
                    </div>
                    <button type="submit" class="btn btn-primary">Authenticate</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                login: {}
            }
        },
        methods: {
            doLogin() {

                this.axios
                    .post('http://localhost:8000/api/login', this.login)
                    .then((response) => {
                        this.login = response.data;
                        localStorage.setItem('my-app-token',this.login.token)
                        window.location.href = 'http://localhost:8000/home'
                    })
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>