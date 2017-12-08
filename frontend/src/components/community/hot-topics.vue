<template v-cloak>
  <div>

    <div v-if="threads.length > 0">
      <router-link :to="`/community/${endpoint}/create`">
        <a class="btn mt-2" type="submit">Start Discussion</a>
      </router-link>
      <div v-for="thread in threads">

        <div class="forum-post__header full-block__post m-2 ml-0 p-3">

          <a class="forum-post__title mb-5">
            <router-link class="nav-item forum-post__title" :to="`/community/${thread.channel.slug}/${thread.id}`">
              {{thread.title}}
            </router-link>
          </a>

          <div class=" d-flex flex-row justify-content-start  align-items-center mt-3">
            <img class="picture-placeholder mr-3" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg"
              alt="">
            <router-link class="nav-item" :to="`/${thread.owner.name}/threads`">
              <a class="mb-0" href="">{{thread.owner.name}} </a>
            </router-link>said {{thread.created_at}}
            <!-- <p class="mb-0 ml-1"> posted this 2 minutes ago</p> -->
          </div>
          <hr> 
          <div v-html="thread.body"></div>
          <hr> Replies: {{thread.replies.length}}
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
        endpoint: this.$route.params.slug
      }
    },
    mounted() {
      // this.init()
    },
    methods: {
      // init() {
      //   console.log(this.$route); //should return object
      //   console.log(this.$route.params); //should return object 
      //   console.log(this.$route.params.id); //should return id of URL param 
      // } 
    },
    created() {
      if (this.$route.params.slug != null) {
        this.$http.get(`api/community/${this.$route.params.slug}`)
          .then(data => this.threads = data.body);
      } else {
        this.$http.get(`api/community`)
          .then(data => this.threads = data.body);

      }


      //   axios.get('/threads' )
      //         .then(({
      //             data
      //         }) => then(data));
      // 
    }
  }

</script>

<style lang="scss">
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
