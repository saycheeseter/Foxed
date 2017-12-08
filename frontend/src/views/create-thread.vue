<template>
  <div class="home">
    <!-- <nav-list></nav-list> -->
    <div class="container-fluid">
      <div class="row no-gutters justify-content-sm-center">
        <div class="col-12">
          <div class="row">
            <div class="col-12">
              <div class="forum-post ">

                <div class="forum-post__form ">
                  <h2>Create a Discussion</h2>
                  <form @submit.prevent="addThread">

                    <div class="form-group mt-2 full-block__post p-3">
                      <h5>Title</h5>

                      <input class="form-control mb-2" name="title" id="title" cols="100" rows="1" width="100%" v-model="createThread.title" placeholder="Awesome title"
                        required>
                      <hr>
                      <h5>Body</h5>
                      
                      <wysiwyg name="body" v-model="createThread.body"></wysiwyg>
                      
                      <!-- <textarea class="form-control mb-2" name="body" id="body" cols="100" rows="5" width="100%" v-model="createThread.body" placeholder="Have something to say?" required></textarea> -->
                      <button type="submit" class="btn btn-primary">Publish</button>
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
  import Wysiwyg from '../components/community/wysiwyg.vue'
  // import forumReplies from '../components/forum-replies.vue';
  //import Thread from '../models/thread';

  export default {

    components: {
      //'nav-list': Navigation,
      'class-feed-block': classFeedBlock,
      'hot-topics': hotTopics,
      'wysiwyg': Wysiwyg
      // 'forum-replies': forumReplies
    },
    // props: [
    //   'thread',
    //   'authenticatedUser'
    // ],
    data() {
      return {
        createThread: {}
      }
    },
    computed: {
      authenticatedUser() {
        return this.$auth.getAuthenticatedUser()
      }
    },
    methods: {
      addThread() {
        this.$http.post(`api/community/${this.$route.params.slug}`,
          this.createThread).then(function (response) { // do something 
          // console.log("Success");
          this.$router.push(`/community/${this.$route.params.slug}`);
          swal("Discussion posted!", {
            icon: "success",
          });

        });
      }
    },
    created() {
      this.$http.get(`api/currentChannel/${this.$route.params.slug}`)
        .then(function (data) {
          this.createThread.channel_id = data.body.id;
        })
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
