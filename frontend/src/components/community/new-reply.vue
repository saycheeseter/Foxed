<template v-cloak>
  <div>
    <div v-if="authenticatedUser" class="full-block__post m-2 p-3">
      <div class="forum-post__form">
        <form @submit.prevent="addReply">

          <div class="form-group">
            <wysiwyg v-model="reply.body" :value="reply.body"></wysiwyg>
            <!-- <textarea class="form-control mb-1" name="body" id="body" cols="100" rows="5" width="100%" placeholder="Have something to say?" v-model="reply.body" required></textarea> -->
            <button type="submit" class="btn btn-primary">Post Reply</button>
          </div>
        </form>
      </div>
    </div>

    <p class="text-center pb-2 pt-2" v-else>Please
      <a href="#/login">sign in</a> to participate in this discussion.</p>
  </div>
</template>
<script>
import Wysiwyg from './wysiwyg.vue';
  export default {
    components: {
      'wysiwyg': Wysiwyg
    },
    props: ['attributes'],
    data() {
      return {
        reply: {},
       // body: this.attributes.body,
        endpoint: '',

        // authenticatedUser: this.$auth.getAuthenticatedUser()
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
        ).then(({data}) => { 
          this.reply.body = '';
          this.$emit('created', data);
          swal("Replied!", {
            icon: "success",
          });
         
        }, function (response) { // do something t
          swal("Error!", {
            icon: "error",
          });
        });
      },

    },
    created() {

      // this.$http.get(`api/community/${this.$route.params.slug}/${this.$route.params.id}`)
      //   .then(data => {
      //     this.reply = data.body.replies
      //     console.log(data);
      //   });

    }
  }

</script>
<style>


</style>
