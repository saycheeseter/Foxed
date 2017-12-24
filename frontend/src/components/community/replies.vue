<script>
import Wysiwyg from "./wysiwyg.vue";
import moment from 'moment';
  export default {
    components: {
      'wysiwyg': Wysiwyg
    },
    props: ['attributes'],
    name: 'replies',
    data() {
      return {
        
        editing: false,
        body: this.attributes.reply.body,
      }

    },
    methods: {
      update() {
        this.$http.patch(`api/replies/${this.attributes.reply.id}`, {
            body: this.body
          })
          .then(data => {
            this.attributes.reply.body = this.body;
            this.editing = false,
              this.threads = data.body
            swal("Edited!", {
              icon: "success",
            });

          });
      },
      destroy() {
        this.$http.delete(`api/replies/${this.attributes.reply.id}`, {
            body: this.body
          })
          .then(({data}) => {
            this.$router.push(`/community/${this.$route.params.slug}/${this.$route.params.id}`)
            this.attributes.reply.body = this.body;
            this.editing = false,
            this.threads = data.body
            swal("Reply Deleted!", {
              icon: "success",
            });
          });
      }
    },
    created() {

    },
    computed: {
        authenticatedUser() {
        return this.$auth.getAuthenticatedUser()
        },
        ago() {
          return moment(this.attributes.reply.created_at).fromNow() + '...';
        }
    },
  }

</script>

<style scoped lang="scss">
  .picture-placeholder {
    width: 50px;
  }
  


</style>
