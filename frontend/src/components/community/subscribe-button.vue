<template>
  <div>
      <button :class="classes" @click="subscribe">Subscribe</button>
  </div>
</template>
<script>
  export default {
    props: ['active'],
    data() {
      return {
        //active: false
      }
    },
    computed: {
      classes() {
        return ['btn', this.active ? 'btn-primary' : 'btn-default'];
      }
    },
    methods: {
        subscribe() {
            this.$http.post(`api${this.$route.path}/subscriptions`)
                .then(() => {
                    alert("success")
                })
                .catch()
        }
    },
    mounted() {
        
    }
  };

</script>
