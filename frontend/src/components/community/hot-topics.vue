<template>
  <div>
    <div class="forum-post__header full-block__post m-2 p-3" v-for="thread in threads" v-bind:key="thread">
      <a class="forum-post__title mb-5">
        <router-link class="nav-item" :to="`/community/${thread.channel.slug}/${thread.id}`">
          <a class="nav-link" href="">{{thread.title}}</a>
        </router-link>
      </a>
      <div class=" d-flex flex-row justify-content-start  align-items-center mt-3">
        <img class="picture-placeholder mr-3" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg"
          alt="">
        <a class="mb-0" href="">{{thread.owner.name}} </a> said {{thread.created_at}}
        <!-- <p class="mb-0 ml-1"> posted this 2 minutes ago</p> -->
      </div>
      <hr> {{thread.body}}
      <hr>
      Replies: {{thread.replies.length}} 
    </div>
  </div>
</template>
<script>
  //import Thread from '../models/thread';
  
  export default {
    name: 'hot-topics',
    data() {
      return {
        threads: []
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
          .then(({
            data
          }) => this.threads = data);
      } 
      else {
        this.$http.get(`api/community`)
          .then(({
            data
          }) => this.threads = data);
          
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
