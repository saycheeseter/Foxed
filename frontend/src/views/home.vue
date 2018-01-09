<template v-cloak>
  <div class="home mt-5">
    <!-- <nav-list></nav-list> -->
    <div class="container-fluid">
      <div class="row justify-content-sm-center">
        <div class="col-10">
          <div class="row no-gutters mt-5">
            <div class="col-2">
              <div class="block-full-height d-flex justify-content-center align-items-start ">
                <div class="text-left">
                  <br>
                  <classroom :user="user"></classroom>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="block-full-height d-flex justify-content-center align-items-start">
                <p>No posts yet.</p>
              </div>
            </div>
            <div class="col-4">
              <div class="block-full-height d-flex justify-content-center align-items-start">
                <forum-category></forum-category>
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
  import forumCategories from '../components/community/forum-category.vue';

  export default {

    data() {
      return {
        user: {}
      }
    },
    components: {
      // 'nav-list': Navigation,
      'feed-block': feedBlock,
      'forum-category': forumCategories,
      'classroom': Classroom
    },
    mounted() {
      this.user.prof = false;
      this.$http.get(`api/user`)
        .then(this.refresh)

     
    },
    methods: {
      refresh(data) {
        this.user = data.body;
      }
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
    padding: 20px;
    border-radius: 50px;
    width: 200px;

    max-width: 100%;
  }

  ul {
    list-style: none;
    padding: 0;
    li {
      margin: 0;
    }
  }

</style>
