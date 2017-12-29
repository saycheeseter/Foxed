<template>
  <div>
    Thank you!
  </div>
</template>
<script>
  export default {
    data() {
      return {
          token: this.$route.query.token
      }
    },
    methods: {
      fetch() {
        this.$http.post(`api${this.$route.path}?token=${this.token}`, this.token)
        .then(function(response) {
            this.$router.push(`/community`);
            location.reload();
            swal("Account Confirmed!", {
            icon: "success",
          });
        })
      }
    },
    created() {
      alert(this.$route.query.token + this.$route.path);
      this.fetch();
      
    },
    computed: {
      authenticatedUser() {
        return this.$auth.getAuthenticatedUser()
      }
    },
  }

</script>
