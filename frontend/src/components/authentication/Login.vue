<template>
  <div class="login">

    <div class="form-group m-auto  d-flex align-items-center ">
      <input v-model="email" class="form-control mr-2 content__input" type="email" placeholder="Email">

      <input v-model="password" class="form-control mr-2 content__input" type="password" placeholder="Password">

      <button @click="login" class="btn pull-right form__button--submit font--light">
        Login
      </button>


    </div>

  </div>
</template>

<script>
  export default {
    name: 'login',
    data() {
      return {
        email: '',
        password: ''
      }
    },
    methods: {
      login() {
        var data = {
          client_id: 2,
          client_secret: 'd5ofe197ZVdQ8TSUNvZZGQavfwI2DY5GMsz1y0JL',
          grant_type: 'password',
          username: this.email,
          password: this.password
        }

        this.$http.post("oauth/token", data)
          .then(response => {
            // location.reload()
            this.$auth.setToken(response.body.access_token, response.body.expires_in + Date.now())
            location.reload();
            this.$router.push("/")
            
            console.log(response)
          })
      },
      fetchData() {
        
      }
    }
  }

</script>
<style scoped lang="scss">
  .login-block {
    transform: scale(0.7);
    position: absolute;
    right: 8%;
    bottom: 0;
    z-index: 99;
    input {
      width: 100%;
    }
    .card {
      width: 500px;
    }
  }

</style>
