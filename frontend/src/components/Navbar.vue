<template>
  <nav class="navbar navbar__logged-in fixed-top navbar-toggleable-md navbar-light bg-faded">
    <div class="container d-flex align-items-center mt-2 mb-2">
      <!-- <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> -->
      <a class="navbar-brand" href="#">
        <span class="font--bold">Foxed</span>
        <span class="font--light">Folio</span>
      </a>
      <login v-if="! isAuth"></login>
      <!-- <router-link tag="li" to="/login" v-if="! isAuth">
        <a>login</a>
      </router-link> -->
      <!-- <div class="dropdown">
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

    </div> -->
      <div class="ml-2 mr-2 form-group m-auto d-flex align-items-center justify-content-around nav-links" v-if="isAuth">
        <div>
          <div class="dropdown">
            <ais-index app-id="TN5MR9QHP4" api-key="a933713f38f230be88643278a41c7281" index-name="threads">

              <ais-search-box id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                <ais-input class="form-control" placeholder="Search for threads..." autofocus></ais-input>
              </ais-search-box>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <ais-results>
                  <template slot-scope="{ result }">
                    <p>
                      <router-link :to="result.path">
                        <ais-highlight :result="result" attribute-name="title"></ais-highlight>
                      </router-link>
                    </p>
                  </template>
                </ais-results>
              </div>
            </ais-index>
          </div>




        </div>
        <router-link class="ml-2 mr-2" tag="li" to="/">
          <a>Home</a>
        </router-link>
        <router-link class="ml-2 mr-2" tag="li" to="/community">
          <a>Community</a>
        </router-link>
        <router-link class="ml-2 mr-2" tag="li" :to="'/'+user.username+'/codes'">
          <a>Profile</a>
        </router-link>
        <user-notifications :user="user"></user-notifications>
        <div class="dropdown ml-2">
          <a href="#" class="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bars"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li @click="logout">
              <a href="#">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
  import Login from './authentication/Login.vue';
  import UserNotifications from './community/UserNotifications.vue'
  export default {
    components: {
      'login': Login,
      'user-notifications': UserNotifications
    },
    data() {
      return {
        isAuth: null,
        user: {},
        query: ''
      }
    },
    // computed: {
    //     authenticatedUser() {
    //     return this.$auth.getAuthenticatedUser()
    //     }
    // },
    mounted() {
      this.isAuth = this.$auth.isAuthenticated()
      this.$nextTick(function () {
        this.setAuthenticatedUser()
      });
    },
    watch: {
      $route: function () {
        this.isAuth = this.$auth.isAuthenticated()
        if (this.isAuth) {
          this.setAuthenticatedUser()
        }
      }
    },
    methods: {
      setAuthenticatedUser() {
        this.$http.get('api/user')
          .then(this.refresh)
      },
      search() {
        this.$router.replace(`/threads/search?q=${this.query}`)
        this.$emit('searched', this.query);
      },
      refresh(data) {
        this.$auth.setAuthenticatedUser(data.body)
        this.user = this.$auth.getAuthenticatedUser()
        console.log(this.$auth.getAuthenticatedUser())
      },
      logout() {
        this.$auth.destroyToken()
        this.$router.push("/")
        location.reload()
      }

    }
  }

</script>

<style scope lang="scss">
  .navbar {
    color: #fcfcfc;
    width: 100%;
    .navlinks {
      color: #fff;
    }
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
