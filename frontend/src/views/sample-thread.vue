<template>
  <div class="home">
    <!-- <nav-list></nav-list> -->
    <div class="container-fluid">
      <div class="row no-gutters justify-content-sm-center">
        <div class="col-12">
          <div class="row">
            <div class="col-12">
              <div class="forum-post">
                <a class="btn btn-success" type="submit">Start Discussion</a>
                <!-- thread -->
                <div>
                  <div class="forum-post__header full-block__post m-2 p-3">
                    <h1>
                      <a class="forum-post__title mb-5">{{threads.title}}</a>
                    </h1>
                    <div class=" d-flex flex-row justify-content-start  align-items-center mt-3">
                      <img class="picture-placeholder mr-3" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg"
                        alt="">
                      <a class="mb-0" href="">{{threads.owner.name}}</a> {{threads.created_at}}
                      <!-- <p class="mb-0 ml-1"> posted this 2 minutes ago</p> -->
                    </div>
                    <hr> {{threads.body}}
                    <hr>
                  </div>


                </div>
                <!-- reply -->
                <div>
                  <div class="forum-post__header full-block__post m-2 p-3" v-for="reply in threads.replies" v-bind:reply="reply" :key="reply.id">
                    <p>
                      <a class="nav-link" href="">{{reply.owner.name}}</a> said {{reply.created_at}}</p>
                    <div class=" d-flex flex-row justify-content-start  align-items-center mt-3">
                      <!-- <p class="mb-0 ml-1"> posted this 2 minutes ago</p> -->
                    </div>
                    <hr> {{reply.body}}
                    <hr>
                  </div>
                </div>

                <div class="forum-post__form">
                  <form @submit.prevent="addReply">

                    <div class="form-group">
                      <textarea name="body" id="body" cols="100" rows="5" width="100%" v-model="reply.body" placeholder="Have something to say?"></textarea>
                      <button type="submit" class="btn btn-default">Post</button>
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
        threads: {},
        reply: {}
      }
    },
    computed: {
      authenticatedUser() {
        return this.$auth.getAuthenticatedUser()
      }
    },
    methods: {
      addReply() {
        this.$http.post(`api/community/${this.$route.params.slug}/${this.$route.params.id}/replies`,
          this.reply
        ).then(function (response) { // do something 
          console.log("Success");
         
          this.reply.body = ''
          
          swal("Replied!", {
            icon: "success",
          });
           this.fetchData();
        }, function (response) { // do something t
          swal("Error!", {
            icon: "error",
          });
        });
      },
      fetchData() {
        this.$http.get(`api/community/${this.$route.params.slug}/${this.$route.params.id}`)
          .then(data => {
            this.threads = data.body
            console.log(data);
          });
      }
    },
    created() {

      this.$http.get(`api/community/${this.$route.params.slug}/${this.$route.params.id}`)
        .then(data => {
          this.threads = data.body
          console.log(data);
        });

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
