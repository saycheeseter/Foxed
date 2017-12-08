<template>
  <div class="home">
    <div class="container-fluid">
      <div class="row d-flex justify-content-sm-center">
        <div class="col-xl-8 col-md-10">
          <div class="row">
            <div class="col-12 d-flex justify-content-center ">
              <img class="picture m-5" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" alt="">
              <h1>{{profile.name}}</h1>
            </div>
            <div>
              <div class="forum-post__header full-block__post m-2 p-3" v-for="thread in profile.threads" v-bind:key="thread">
                <a class="forum-post__title mb-5">
                  <router-link class="nav-item" :to="`/community/${thread.channel.slug}/${thread.id}`">
                    <a class="nav-link" href="">{{thread.title}}</a>
                  </router-link>
                </a>
                <div class=" d-flex flex-row justify-content-start  align-items-center mt-3">
                  <!-- <img class="picture-placeholder mr-3" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" -->
                    <!-- alt=""> -->
                  <!-- <a class="mb-0" href="">{{thread.owner.name}} </a> said {{thread.created_at}} -->
                  <!-- <p class="mb-0 ml-1"> posted this 2 minutes ago</p> -->
                </div>
                <!-- <hr> {{thread.body}} -->
                <hr> Replies: {{thread.replies.length}}
              </div>
            </div>
          </div>

        </div>

      </div>
    </div> 
  </div>
</template>

<script>
  export default {
    data() {
      return {
        profile: {},
        authenticatedUser: this.$auth.getAuthenticatedUser()
      }
    },
    created() {
      this.$http.get(`api/${this.$route.params.name}/threads`)
        .then(
          data => this.profile = data.body);
    }

  }

</script>

<style scoped>
  form input {
    width: 100%;
  }

  .green {
    background-color: green;
  }

  img {
    width: 100%;
  }

  .picture {
    background-color: #efefef;
    width: 200px;
    height: 200px;
    border-radius: 50%;
  }

  i {
    margin: 0 10px;
    font-size: 24px;
    color: #a2a2a2;
  }

  ul {
    list-style: none;
    padding: 0;
  }

  li {
    margin: 0;
  }

</style>
