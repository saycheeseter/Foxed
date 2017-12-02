<template>
  <div class="home">
    <nav-list></nav-list>
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
                  <ul class="text-left" v-for="item in items">
                    <router-link class="nav-item" tag="li" to="/class">
                      <a class="nav-link" href="">{{item.title}}</a>
                    </router-link>
                  </ul>
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
  import Navigation from '../components/navigation.vue';
  import feedBlock from '../components/feed-block.vue';
  import hotTopics from '../components/hot-topics.vue';
  export default {
    data() {
      return {
        items: [{
            title: 'AN401'
          },
          {
            title: 'ANIMPORT'
          },
          {
            title: 'WEBFOLIO'
          }
        ]
      }
    },
    components: {
      'nav-list': Navigation,
      'feed-block': feedBlock,
      'hot-topics': hotTopics
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