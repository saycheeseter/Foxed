<template>
  <div class="login">
    <div class="ml-2 mr-2 form-group m-auto d-flex align-items-center justify-content-around" v-if="Auth">
      <input type="text" class="form-control" placeholder="Search">
      <router-link class="ml-2 mr-2" tag="li" to="/">
        <a>Home</a>
      </router-link>
      <router-link class="ml-2 mr-2" tag="li" to="/community">
        <a>Community</a>
      </router-link>
      <router-link class="ml-2 mr-2" tag="li" to="/profile">
        <a>Profile</a>
      </router-link>
      <span class="ml-2 mr-2" tag="li">
        <a @click="logout">logout</a>
      </span>
    </div>
    <div class="form-group m-auto  d-flex align-items-center " v-else>
      <input v-model="email" class="form-control mr-2 content__input" type="email" placeholder="Email">

      <input v-model="password" class="form-control mr-2 content__input" type="password" placeholder="Password">

      <button @click="login" class="btn pull-right form__button--submit">
        Login
      </button>

    </div>

  </div>
</template>

<script>

  export default {
    props: ['isAuth'],
    name: 'login',
    data() {
      return {
        email: '',
        password: '',
        Auth: this.isAuth
      }
    },
    methods: {
      login() {
        var data = {
          client_id: 2,


          client_secret: 'Vgnq5Vbmfa6zaGXQ9Od9uQXMyUehdMhNhQJOJ0Q3',

          grant_type: 'password',
          username: this.email,
          password: this.password
        }

        this.$http.post("oauth/token", data)
          .then(response => {
            this.isAuth = this.$auth.isAuthenticated()
            this.Auth = true
            this.$auth.setToken(response.body.access_token, response.body.expires_in + Date.now())
            this.$router.push("/")
            console.log(response)
          })
      },
      logout() {
        this.$auth.destroyToken()
        this.$router.push("/")
      }
    }
  }

</script>
<style scoped lang="scss">


</style>
