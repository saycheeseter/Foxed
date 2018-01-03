<template>
  <div>
    <form action="POST" enctype="multipart/form-data">
      <div class="d-flex flex-column">
        <img :src="avatar" class="picture m-5" alt="">
        <input type="file" name="avatar" accept="image/*" @change="onChange" v-if="isAuth">
        <!-- <button type="submit" class="btn">Add Avatar</button> -->

      </div>
    </form>
  </div>
</template>
<script>
  export default {
    name: 'avatarForm',
    data() {
      return {
        avatar: '',
        Auth: {},
        user: {}
      }
    },
    methods: {
      onChange(e) {

        if (!e.target.files.length) return;

        let avatar = e.target.files[0];

        let reader = new FileReader();

        reader.readAsDataURL(avatar);

        reader.onload = e => {
          this.avatar = e.target.result;
        };

        // Persist to the server
        this.persist(avatar);
      },

      persist(avatar) {
        let data = new FormData;
        data.append('avatar', avatar);
        this.$http.post(`api/${this.$route.params.user}/avatar`, data)
          .then(() => {
            alert("success");
          })
      },
      fetchAuth() {
        this.$http.get(`api/user`)
          .then(this.refreshAuth)
      },
      fetchProfile() {
        this.$http.get(`api/${this.$route.params.user}/threads`)
          .then(this.refresh)
      },
      refreshAuth(data) {
        this.Auth = data.body
      },
      refresh(data) {
        this.user = data.body.user
        this.avatar = data.body.user.avatar_path
      },
      
    },
    mounted() {
      this.fetchAuth();
      this.fetchProfile();
    },
    computed: {
      isAuth() {
        return this.user.id == this.Auth.id

      }
    }
   
  }

</script>
<style scoped lang="scss">
  .picture {
    background-color: #efefef;
    width: 200px;
    height: 200px;
    border-radius: 100%;
  }

</style>
