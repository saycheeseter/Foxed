<template>
  <div>
    <form action="POST" @submit.prevent="addAvatar" enctype="multipart/form-data">
      <input type="file" name="avatar">
      <button type="submit" class="btn">Add Avatar</button>
    </form>
  </div>
</template>
<script>
  export default {
    name: 'avatarForm',
    props: ['user'],
    data() {

      return {

      }
    },
    methods: {
      addAvatar() {
        this.$http.post(`api/users/${this.$route.params.name}/avatar`)

      },
    },
    created() {
      
    },
    computed: {
      canUpdate() {
        return this.authorize(user => user.id === this.user.profile.id)
      }
    }
  }

</script>
