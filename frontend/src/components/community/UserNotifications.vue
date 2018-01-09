<template>
  <div>
    <div class="dropdown">
      <a href="#" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="glyphicon glyphicon-bell"></span>
      </a>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li v-for="notification in notifications">
          <a :href="notification.data.link" v-text="notification.data.message" @click.prevent="markAsRead(notification)"></a>
        </li>
      </ul>
    </div>
  </div>
</template>
<script>
  export default {
    props: ['user'],
    data() {
      return {
        notifications: false
      }
    },
    mounted() {
      this.fetch()
    },
    methods: {
      fetch() {
        this.$http.get(`api/profiles/${this.user.username}/notifications`)
          .then(response => {
            console.log(response)
            this.notifications = response.data
          })
      },
      markAsRead(notification) {
        
      }

    }

  }

</script>
