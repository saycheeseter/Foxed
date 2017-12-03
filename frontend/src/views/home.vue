<template>
  <div class="home">
    <!-- <nav-list></nav-list> -->
    <div class="container-fluid">
      <div class="row justify-content-sm-center">
        <div class="col-10">
          <div class="row">
            <div class="col-2">
              <div class="block-full-height d-flex justify-content-center align-items-start ">

                <div class="text-center">
                  <br>
                  <div class="picture"></div>
                  <router-link class="nav-item" to="/profile">
                    <a class="nav-link" href="">Hi, User!</a>
                  </router-link>

                  <hr>
                  <a class="btn btn-success" type="submit">Join a Class</a>
                  <p class="text-left mt-2">Classes</p>
                 <classroom></classroom>
                </div>

              </div>
            </div>
            <div class="col-6">
              <div class="block-full-height d-flex justify-content-center align-items-start">
                <feed-block></feed-block>
              </div>
            </div>
            <div class="col-4">
              <div class="block-full-height d-flex justify-content-center align-items-start">

                <hot-topics></hot-topics>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  //import Navigation from '../components/navigation.vue';
  import feedBlock from '../components/community/feed-block.vue';
  import Classroom from '../components/community/enrolled-class.vue';
  import hotTopics from '../components/community/hot-topics.vue';
  export default {
    data() {
      return {

        }
    },
    components: {
      // 'nav-list': Navigation,
      'feed-block': feedBlock,
      'hot-topics': hotTopics,
      'classroom': Classroom
    }
  }
</script>

<style scoped lang="scss">
  form input {
    width: 100%;
  }

  .green {
    background-color: green;
  }

  .picture {
    background-color: #efefef;
    padding: 65px 30px;
    border-radius: 50%;
  }

  ul {
    list-style: none;
    padding: 0;
    li {
      margin: 0;
    }
  }
</style>