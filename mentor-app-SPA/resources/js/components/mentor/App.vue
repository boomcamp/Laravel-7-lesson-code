<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <span class="text-secondary">Mentor app built in Vuejs+laravel</span>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Home</router-link>
                    <router-link to="/add" class="nav-item nav-link">Add New Mentor</router-link>
                    <router-link to="/login" v-show="hasToken" class="nav-item nav-link">login</router-link>
                    <router-link to="/login" v-show="!hasToken" class="nav-item nav-link">
                         <span @click="logout">Logout</span>
                    </router-link>
                </div>
            </div>
        </nav>
        <br/>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                hasToken : true
            }
        },
        created() {
            if (localStorage.getItem("my-app-token") !== null) {
               this.hasToken = false;
            }
        },
        methods : { 
            logout() { 
                localStorage.removeItem('my-app-token');
                window.location.href = 'http://localhost:8000/login'
            }
         }
    }
</script>