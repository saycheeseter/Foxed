<template>
  <div class="home">
    <!-- <nav-list></nav-list> -->
    <div class="container-fluid">
      <div class="row justify-content-sm-center">
        <div class="col-11">
          <div v-if="isMember">
            <div class="row">


              <div class="col-2">
                <div class="block-full-height d-flex justify-content-center align-items-start ">

                  <div class="text-left mt-5">
                    <a href="">{{classDetails.name}}</a>
                    <hr>
                    <a class="btn btn-success text-center mb-2" type="submit">Code Play</a>
                    <br>
                    <a href="">Announcements</a>
                    <br>
                    <a href="">Assignments</a>
                    <br>
                    <a href="">Members</a>
                    <br>
                    <a href="">Files</a>
                  </div>

                </div>
              </div>
              <div class="col-6">
                <div class="block-full-height d-flex justify-content-center align-items-start">
                  <class-feed-block></class-feed-block>
                </div>
              </div>
              <div class="col-4">
                <div class="block-full-height">
                  <hr>
                  <div class="row mt-3">
                    <p class="ml-2">Some discussions related to your group</p>
                    <hr>
                    <related-topics></related-topics>
                  </div>

                  <hr>
                  <div class="row">
                    <p class=" ml-3">Popular discussions</p>
                    <hr>
                    <hot-topics></hot-topics>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="block-full-height d-flex" v-else>
            <p class=" m-auto">You are not a member of this class.</p>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
  // import Navigation from '../components/navigation.vue';
  import classFeedBlock from '../community/class-feed-block.vue';
  // import relatedTopics from '../components/community/related-topics.vue';
  import hotTopics from '../community/hot-topics.vue';
  import Activities from './Activities.vue';
  import CreateAct from './CreateActivity.vue';
  export default {
    data() {
      return {

        classDetails: {},
        isMember: false,

        authenticatedUser: this.$auth.getAuthenticatedUser()
      }
    },
    components: {
      //'nav-list': Navigation,
      'class-feed-block': classFeedBlock,
      'hot-topics': hotTopics,
      'view-activities': Activities,
      'create-activity' : CreateAct
      //'related-topics': relatedTopics
    },
    created() {
      this.$http.get(`api/classroom/${this.$route.params.id}`)
        .then(
          data => {
            for (var i = 0; i < data.body.members.length; i++) {
              if (data.body.members[i].user_id == this.authenticatedUser.id) {
                this.isMember = true;
                console.log("Im a member");
              } else {
                console.log("Not a member");
              }

            }
            this.classDetails = data.body;



          }
        );
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


  ul {
    list-style: none;
    padding: 0;
    li {
      margin: 0;
    }
  }

</style>
