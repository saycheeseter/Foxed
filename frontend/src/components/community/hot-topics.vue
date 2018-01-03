<template v-cloak>
  <div class="topics mt-2">

    <div class="container-fluid" v-if="threads.length > 0">
      <div class="row no-gutters justify-content-sm-center">
        <div class="col-10">
          <div class="row mt-5">
            <div class="col-12">
              <router-link :to="`/community/${endpoint}/create`" v-if="authenticatedUser.id">
                <button class="btn form__button--positive-dark ml-2 mt-2" type="submit">Start Discussion</button>
              </router-link>
              <div v-for="thread in threads">
                <div class="forum-post__header m-2 ml-0 p-3">
                  <router-link class="nav-item forum-post__title" :to="`/community/${thread.channel.slug}/${thread.id}`">
                    <h1 class="content__title font--bold mb-5">{{thread.title}} </h1>
                  </router-link>


                  <div class=" d-flex flex-row justify-content-start  align-items-center mt-3">
                    <img class="picture-placeholder mr-3" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg"
                      alt="">
                    <router-link class="nav-item" :to="`/${thread.owner.username}/threads`">
                      <a class="mb-0" href="">{{thread.owner.name}} </a>
                    </router-link>
                    <span class="ml-1">said {{thread.created_at}}</span>
                    <!-- <p class="mb-0 ml-1"> posted this 2 minutes ago</p> -->
                  </div>
                  <hr>
                  <div v-html="thread.body"></div>
                  <hr> Replies: {{thread.replies.length}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="d-flex flex-column block-full-height" v-else>
      <div class="m-auto text-center">
        <router-link class="" :to="`/community/${endpoint}/create`">
          <a class="btn mt-2" type="submit">Start Discussion</a>
        </router-link>
        <p v-cloak class="m-3">There are no current discussions in this category. Start a new one.</p>
      </div>
    </div>
  </div>
</template>
<script>
  //import Thread from '../models/thread';

  export default {
    name: 'hot-topics',
    data() {
      return {
        threads: [],
        endpoint: this.$route.params.slug,
        isAuth: null
      }
    },

    methods: {
      fetch() {
        this.$http.get(`api/community/${this.$route.params.slug}`)
          .then(this.refresh);
      },
      refresh(data) {
        this.threads = data.body
        this.isAuth = this.$auth.isAuthenticated();
      }
    },
    mounted() {
      this.fetch()


      //   axios.get('/threads' )
      //         .then(({
      //             data
      //         }) => then(data));
      // 
    },
    computed: {
      authenticatedUser() {
        return this.$auth.getAuthenticatedUser()
      }
    },
  }

</script>

<style scoped lang="scss">
  a {
    text-decoration: none;
  }

  .picture-placeholder {
    width: 50px;
  }

  .feed-block {

    width: 100%;
    .feed-block-inner {
      //border: 1px solid #000;
      .feed-block-inner__header {}
      .feed-block-inner__post {
        img {
          width: 40px;
        }
      }
    }
  }

</style>
