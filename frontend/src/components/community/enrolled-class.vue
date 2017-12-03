<template>
  <div>
    <div class="forum-post__header full-block__post m-2 p-3" v-for="room in classes" v-bind:key="room">
      <a class="forum-post__title mb-5">
        <router-link class="nav-item" :to="`/class/${room.classroom.id}`">
          <a class="nav-link" href="">{{room.classroom.name}}</a>
        </router-link>
      </a>
      <hr>
    </div>
  </div>
</template>
<script>
  //import Thread from '../models/thread';

  export default {
    name: 'classroom',
    data() {
      return {
        classes: {}
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
      this.$http.get('api/enrolledClass')
        .then(response => {
          this.classes = response.body
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
