<template>
  <div class="forums mt-5">
    <div class="container-fluid">
      <div class="row no-gutters justify-content-sm-center">
        <div class="col-10">
          <div class="row mt-5">
            <div class="col-12">
              <div class="forum-post">
                <router-link to="/community/create" v-show="user">
                  <button class="btn form__button--positive-dark mt-2 ml-1 mr-1" type="submit">Create a room</button>
                </router-link>
                <router-link :to="`/${user.username}/threads`" v-show="user">
                  <button class="btn form__button--passive-dark mt-2" type="submit">View posted topics</button>
                </router-link>
                <router-link :to="`/threads/search`" v-show="user">
                  <button class="btn form__button--passive-dark mt-2" type="submit">Search for a thread</button>
                </router-link>
                <forum-category></forum-category>
                <!-- <hot-topics></hot-topics> -->
              </div>
            </div>
            <div class="col">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  //import Navigation from '../components/community/navigation.vue';
  import classFeedBlock from '../components/community/class-feed-block.vue';
  import hotTopics from '../components/community/hot-topics.vue';
  import forumCategories from '../components/community/forum-category.vue';
  export default {
    data() {
      return {
        isAuth: null,
        user: this.$auth.getAuthenticatedUser()
      }
    },
    components: {
      //'nav-list': Navigation,
      'class-feed-block': classFeedBlock,
      'hot-topics': hotTopics,
      'forum-category': forumCategories
    },
    methods: {
      authenticatedUser() {
        this.$http.get('api/user')
          .then(this.refresh)
      },
      refresh(data) {
        this.isAuth = this.$auth.isAuthenticated();
        this.user = data.body
      }
    },
    mounted() {
      this.authenticatedUser();
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
