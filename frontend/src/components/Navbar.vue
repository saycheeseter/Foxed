<template>
  <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">FF</a>

      <router-link tag="li" to="/login" v-if="! isAuth">
        <a>login</a>
      </router-link>
      <router-link tag="li" to="/register" v-if="! isAuth">
        <a>Register</a>
      </router-link>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          Channels
        </button>
        <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

        <div>
          <div v-for="channel in channels">
            <div class="dropdown-item">
              <router-link :to="`/community/${channel.slug}`">
                <a href="">{{channel.slug}}</a>
              </router-link>
            </div>
          </div>
        </div>
      </div> -->

    </div>
   
    <router-link tag="li" to="/" v-if="isAuth">
      <a>Home</a>
    </router-link>
    <router-link tag="li" to="/community" v-if="isAuth">
      <a>Community</a>
    </router-link>
    <router-link tag="li" :to="'/'+user.name+'/codes'" v-if="isAuth">
      <a>Profile</a>
    </router-link>
    <span v-if="isAuth">
      <a @click="logout">logout</a>
    </span>
     </div>

  </nav>
</template>

<script>
  export default {
    data() {
      return {
        isAuth: null,
        channels: {},
        user:[]
      }
    },
    created() {
      this.isAuth = this.$auth.isAuthenticated()
      this.setAuthenticatedUser()
      this.$http.get('api/channels')
        .then(response => {
          this.channels = response.body
        })
    },
    methods: {
      setAuthenticatedUser() {
        this.$http.get('api/user')
          .then(response => {
            this.$auth.setAuthenticatedUser(response.body)
            this.user = this.$auth.getAuthenticatedUser()
            console.log(this.$auth.getAuthenticatedUser())
          })
      },
      logout() {
        this.$auth.destroyToken()
        this.$router.push("/")
      }

    }
  }

</script>

<style scope lang="scss">
  .router-link-active {
    color: red;
  }

  .navbar {
    background-color: #2a2a2a;
    a,
    li {
      color: #dfdfdf;
      list-style: none;
    }
  }

</style>
