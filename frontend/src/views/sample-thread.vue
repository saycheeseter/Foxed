<template>
  <div class="home">
    <!-- <nav-list></nav-list> -->
    <div class="container-fluid">
      <div class="row no-gutters justify-content-sm-center">
        <div class="col-12">
          <div class="row">
            <div class="col-12">
              <div class="forum-post">
                <!-- <div v-for="thread in threads" v-bind:thread="thread" :key="thread.id"> -->
                <!-- Editing Thread -->
                <div v-bind:threads="threads" :key="threads.id" >
                <thread :attriThread="threads" inline-template>
                    <div v-if="editingThread">
                      <div class="forum-post__header full-block__post m-2 p-3">
                        <div>
                          <h1>
                            <div class="form-group">
                              <h5>Title</h5>
                              <input class="form-control" type="text" v-model="editThread.title">
                            </div>
                          </h1>
                          <hr>
                          <div class="form-group">
                            <h5>Body</h5>
                            <wysiwyg v-model="editThread.body" :value="editThread.body"></wysiwyg>
                            <!-- <textarea class="form-control" name="" id="" cols="30" rows="10" v-model="editThread.body"></textarea> -->
                            </div>
                          <hr>
                        </div>
                        <div class="level d-flex">
                          <button class=" btn btn-xs btn-primary mr-2"  @click="update" v-if="editingThread = true">Submit</button>
                          <button class=" btn btn-xs mr-2" @click="editingThread = false; editThread.body = attriThread.body" v-if="editingThread = true">Cancel</button>
                          <form @submit.prevent="deleteThread">
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- thread -->
                    <div v-else>
                      <div class="forum-post__header full-block__post m-2 p-3 pt-0">
                      <h1>
                        <a class="forum-post__title mb-5">{{attriThread.title}}</a>
                      </h1>
                      <div class="d-flex align-items-center mt-3">
                        <img class="picture-placeholder mr-3" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg"
                          alt="">
                        <router-link class="" :to="`/${attriThread.owner.name}/threads`">
                          <a class="m-0" href="">{{attriThread.owner.name}}</a>
                        </router-link> {{attriThread.created_at}}
                        <!-- <p5 class="mb-0 ml-1"> posted this 2 minutes ago</p> -->
                      </div>
                      <hr> 
                      <div class="forum__topic-content" v-html="attriThread.body"></div>
                      <hr>
                      <div class="panel-footer level d-flex">
                        <button class=" btn btn-xs mr-2" @click="editingThread = true">Edit</button>
                        <form @submit.prevent="deleteThread">
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </div>
                    </div>

                  </div>
                </thread>
                </div>
                <!-- </div> -->
              </div>
              <!-- reply -->
              <!-- <replies > -->
              <div>
                <div v-for="reply in threads.replies" v-bind:reply="reply" :key="reply.id">
                  <replies :attributes="{reply}" inline-template v-cloak>

                    <div class="forum-post__header full-block__post m-2 p-3">
                      <div>
                        <p>
                          <img class="picture-placeholder mr-3" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg"
                          alt="">
                          <a class="nav-link" href="">{{reply.owner.name}}</a> said {{reply.created_at}}</p>
                        <div class=" d-flex flex-row justify-content-start  align-items-center mt-3">
                          <!-- <p class="mb-0 ml-1"> posted this 2 minutes ago</p> -->
                        </div>
                        <hr>
                        <div v-if="editing">
                          <div class="form-group">
                            <wysiwyg v-model="body" :value="body"></wysiwyg>
                            <!-- <textarea class="form-control" v-model="body"></textarea> -->
                          </div>
                          <button class="btn btn-xs btn-primary" @click="update">Update</button>
                          <button class="btn btn-xs btn-link" @click="editing = false; body = attributes.reply.body">Cancel</button>
                        </div>
                        <div class="forum__topic-content" v-else v-html="body"></div>

                        <hr>
                        <div class="level d-flex panel-footer">
                          <button class=" btn btn-xs mr-2" @click="editing = true">Edit</button>
                          <button class=" btn btn-xs btn-danger mr-2" @click="destroy">Delete</button>
                        </div>
                      </div>
                    </div>

                  </replies>

                </div>
              </div>

              <!-- </replies> -->
              <reply @created="add"></reply>


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
  import Reply from '../components/community/new-reply.vue';
  import Thread from '../components/community/thread';
  import Replies from '../components/community/replies.vue';

  // import forumReplies from '../components/forum-replies.vue';
  

  export default {
    components: {
      //'nav-list': Navigation,
      'class-feed-block': classFeedBlock,
      'hot-topics': hotTopics,
      'reply': Reply,
      'replies': Replies,
      'thread': Thread
 
      // 'forum-replies': forumReplies
    },
    // props: [
    //   'thread',
    //   'authenticatedUser'
    // ],
    data() {
      return {
        threads: {}
      }
    },
    computed: {
      // authenticatedUser() {
      //   return this.$auth.getAuthenticatedUser()
      // }
    },
    methods: {
      add(reply) {
        //this.fetchData();
      },
     
      // fetchData() {
      //   this.$http.get(`api/community/${this.$route.params.slug}/${this.$route.params.id}`)
      //     .then(data => {
      //       this.threads = data.body
      //       // console.log("Push array")
      //       console.log(data);
      //     });
      // }
    },
    created() {
      this.$http.get(`api/community/${this.$route.params.slug}/${this.$route.params.id}`)
        .then(data => {
          this.threads = data.body
          console.log(data);
        });
      // this.$http.get(`api/community/${this.$route.params.slug}/${this.$route.params.id}`)
      //   .then(data => {
      //     this.replies = data.body.replies
      //     console.log(data.body.replies);
      //   });
    }
    // },
    // authenticatedUser() {
    //     return this.$auth.getAuthenticatedUser()
    //   }
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
