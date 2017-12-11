<template>
  <div class="enrolled-class">
    <div v-if="classes.length > 0">
    <div class="forum-post__header text-left font--light" v-for="room in classes" v-bind:key="room">
      
        <router-link class="nav-item" :to="`/class/${room.id}`">
          <a class="content__sub-title" href="">{{room.name}}</a>
        </router-link>
     
      <hr>
    </div>
    </div>
    <div v-else>
      <p>You have 0 enrolled class.</p>
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
