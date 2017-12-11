<template>
  <div class="">
    <nav class="navbar navbar__logged-in fixed-top navbar-toggleable-md navbar-light bg-faded">
      <div class="container  d-flex align-items-center mt-2 mb-2">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#"><span class="font--bold">Foxed</span><span class="font--light">Folio</span></a>
        <login class="ml-auto" :isAuth="isAuth"></login>
        <!-- <router-link tag="li" to="/register" v-if="! isAuth">
        <a>Register</a>
      </router-link> -->
        <!--  <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          Channels
        </button>
         <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

        <div>
          <div v-for="channel in channels">
            <div class="dropdown-item">
              <router-link :to="`/community/${channel.slug}`">
                <a href="">{{channel.slug}}</a>
              </router-link>
            </div>
          </div>
        </div>
      </div> 

    </div>-->


       
      </div>

    </nav>
  </div>
</template>

<script>
  import Login from './authentication/Login.vue';
  export default {
    components: {
      'login': Login
    },
    data() {
      return {

        isAuth: null

      }
    },
    created() {
      this.isAuth = this.$auth.isAuthenticated()
      this.setAuthenticatedUser()
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
.navbar {
  color: #fcfcfc;
   
  width: 100%;
  .navbar-brand {
    color: #fcfcfc;
    &:hover {
      color: #fcfcfc;
      &>.font--bold {
      color: darken(#e76814, 4%);
    }
    } 
    
  }
}
.navbar__logged-in {
 background-color: lighten(#000, 8%);
}
  .router-link-active {
    color: red;
  }

  

</style>
