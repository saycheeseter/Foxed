<template>
  <div class="home">
    <!-- <nav-list></nav-list> -->
    <div class="container-fluid">
      <div class="row no-gutters justify-content-sm-center">
        <div class="col-12">
          <div class="row">
            <div class="col-12">
              <div class="forum-post">

                <div class="forum-post__form">
                  <p>This is how we call you: foxedfolio.com/community/<span v-bind:class="createCategory.slug | removespace">{{createCategory.slug | removespace}}</span></p>
                      <form @submit.prevent="addCategory">

                        <div class="form-group mt-2">
                          <textarea class="form-control mb-2" name="title" id="title" cols="100" rows="1" width="100%" v-model="createCategory.name" placeholder="Category name"></textarea>
                          <textarea class="form-control mb-2" name="body" id="body" cols="100" rows="5" width="100%" v-model="createCategory.slug" placeholder="Assign unique key to your new category. (Can only be assigned once.)"></textarea>
                          <button type="submit" class="btn btn-default">Publish</button>
                        </div>
                      </form>
                </div>


              </div>
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
  //import Navigation from '../components/navigation.vue';
  import classFeedBlock from '../components/community/class-feed-block.vue';
  import hotTopics from '../components/community/hot-topics.vue';
  import swal from 'sweetalert';
  // import forumReplies from '../components/forum-replies.vue';
  //import Thread from '../models/thread';

  export default {

    components: {
      //'nav-list': Navigation,
      'class-feed-block': classFeedBlock,
      'hot-topics': hotTopics
      // 'forum-replies': forumReplies
    },
    // props: [
    //   'thread',
    //   'authenticatedUser'
    // ],
    data() {
      return {
        createCategory: {}
      }
    },
    computed: {
      authenticatedUser() {
        return this.$auth.getAuthenticatedUser()
      }
    },
    filters: {
      removespace(str) {
        if (str) {
          return str.replace(/\s+/g, '');
        }
      }
  },
  methods: {
    removeSpace() {
      if(this.createCategory.slug) {
          this.createCategory.slug = this.createCategory.slug.replace(/\s+/g, '');
        }
    },
      addCategory() {
        this.removeSpace();
        this.$http.post(`api/community/create`, this.createCategory).then(function (response) { // do something 
          // console.log("Success");
          swal("Discussion posted!", {
            icon: "success",
          });
          this.$router.push(`/community/`);
        });
      }
    },
    created() {
      // this.$http.get(`api/currentChannel/${this.$route.params.slug}`)
      //   .then(function (data) {
      //     this.createThread.channel_id = data.body.id;
      //   })
    }
  // },
  // authenticatedUser() {
  //     return this.$auth.getAuthenticatedUser()
  //   }
  }

</script>

<style scoped lang="scss">
  .picture-placeholder {
    width: 50px;
  }

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
