<template>
  <div>
    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
      <div class="card" v-for="code in codes.codes">
        <div class="card-body">
          <h4 class="card-title">{{ code.title }}</h4>
          <!-- <p class="card-text">{{ code.body }}</p> -->
          <!-- <a href="#!" class="btn btn-primary">comment {{ code.user_id }}</a> -->
        </div>
        <hr>
        <p v-if="code.user_id == authenticatedUser.id">
          <!-- <a class="btn btn-danger" role="button" @click="$emit('delete-code')"> delete </a> -->
          <router-link class="btn btn-secondary" :to="'/works/' + code.id + '/edit'">edit</router-link>
        </p>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    data() {
      return {
        codes: {}
      }
    },

    created() {
      this.$http.get(`api/${this.$route.params.name}/codes`)
        .then(response => {
          this.codes = response.body
        })
    },
    computed: {
      authenticatedUser() {
        return this.$auth.getAuthenticatedUser()
      }
    },
  }

</script>
