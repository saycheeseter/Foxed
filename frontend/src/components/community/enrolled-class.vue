<template>
  <div class="enrolled-class">
    <div v-if="classes">
      <div class="forum-post__header text-left font--light" v-for="room in classes" v-bind:key="room.id">
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
        classes: {},
        hasClass: false
      }
    },
    mounted() {
      this.$http.get('api/enrolledClass')
        .then(response => {
          this.classes = response.body
          if (response.body.length > 0)
            this.hasClass = true;
          console.log(response.body)
        })
    },
    methods: {
      // init() {
      //   console.log(this.$route); //should return object
      //   console.log(this.$route.params); //should return object 
      //   console.log(this.$route.params.id); //should return id of URL param 
      // }
    },
    created() {



      //   axios.get('/threads' )
      //         .then(({
      //             data
      //         }) => then(data));
      // 
    }
  }

</script>

<style lang="scss">
  .picture-placeholder {}

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
