<script>
import Wysiwyg from './wysiwyg.vue';
import moment from 'moment';
import SubscribeButton from './subscribe-button';
  export default {
    components: {
      'wysiwyg': Wysiwyg,
      'subscribe-button': SubscribeButton
    },  
    props: ['attriThread'],
    name: 'thread',
    data() {
      return {
        editThread: {
          body: this.attriThread.body,
          title: this.attriThread.title
        },
         editingThread: false,
         active: false
      }
    },
    methods: {
      deleteThread() {
        this.$http.delete(`api/community/${this.$route.params.slug}/${this.$route.params.id}`)
          .then(function (response) {
            this.$router.push(`/community/${this.$route.params.slug}`);
            swal("Deleted!", {
              icon: "success",
            });
            console.log(response);
          }, function (response) {
             this.$router.push(`/community/${this.$route.params.slug}`);
            swal("Error!", {
            icon: "error",
          });
         
          });
      },
      editThread() {
        this.editingThread = true;
      },
      update() {
        this.$http.patch(`api/community/${this.$route.params.slug}/${this.$route.params.id}`, this.editThread)
          .then(data => {
            this.attriThread.body = this.editThread.body
            this.attriThread.title = this.editThread.title
            this.editingThread = false
            swal("Edited!", {
              icon: "success",
            });
            console.log(data);
          }, function (response) {
             //this.$router.push(`/community/${this.$route.params.slug}/${this.$route.params.id}`);
            swal("Error!", {
            icon: "error",
          });
         
          });
      },
      fetch() {
        this.active =this.attriThread.isSubscribedTo
      }
    },
    mounted() {
      this.fetch()
    },
    computed: {
        authenticatedUser() {
        return this.$auth.getAuthenticatedUser()
        },
         threadAgo() {
          return moment(this.attriThread.created_at).fromNow() + '...';
        }
    },
    
  }

</script>

<style scoped lang="scss">
  .picture-placeholder {
    width: 50px;
  }

</style>
