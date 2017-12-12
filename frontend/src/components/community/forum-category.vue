<template>
  <div class="forum-category mt-5">
    <div class="forum-post__header full-block__post m-2 ml-1 mr-1 p-3" v-for="category in categories" v-bind:key="category">
      <a class="forum-post__title mb-5">
        <router-link class="nav-item" :to="`/community/${category.slug}`">
          <a class="nav-link forum__title" href="">{{category.name}}</a>
        </router-link>
      </a>

      <div class="forum__sub-title p-1 text-center">{{category.title}} Has {{category.threads.length}} Discussions!</div>
      
    </div>
  </div>
</template>
<script>
  //import Thread from '../models/thread';

  export default {
    name: 'forum-category',
    data() {
      return {
        categories: {}
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
      this.$http.get('api/channels')
        .then(response => {
          this.categories = response.body
          console.log(response.body)
        })


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
