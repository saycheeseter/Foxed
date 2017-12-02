<template>
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Navbar</a>
    
    <router-link tag="li" to="/login" v-if="! isAuth"><a>login</a> </router-link>
    <router-link tag="li" to="/register" v-if="! isAuth"><a >Register</a> </router-link>
    <router-link tag="li" to="/feed"  v-if="isAuth"><a>feed</a> </router-link>
    <router-link tag="li" to="/class"  v-if="isAuth"><a>class</a> </router-link>
    <router-link tag="li" to="/profile"  v-if="isAuth"><a>Profile</a> </router-link>
    <router-link tag="li" to="/logout"  v-if="isAuth"><a >logout</a> </router-link>
    
    </nav>
</template>

<script>
    export default {
        data () {
            return {
                isAuth: null
            }
        },
        created() {
            this.isAuth = this.$auth.isAuthenticated()
            this.setAuthenticatedUser()
        },
        methods: {
            setAuthenticatedUser () {
                this.$http.get('api/user')
                .then(response => {
                    this.$auth.setAuthenticatedUser(response.body)
                    console.log(this.$auth.getAuthenticatedUser())
                })
            }
        }
    }
</script>

<style>
.router-link-active{
    color: red;
}
</style>