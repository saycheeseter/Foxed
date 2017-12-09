<template>
  <div>
    <b-btn v-b-modal.modalPrevent>Join A Class</b-btn>
    <!-- Main UI -->
    <!-- Modal Component -->
    <b-modal id="modalPrevent"
             ref="modal"
             title="Submit your name"
             @ok="subscribe">
      <form @submit.stop.prevent="subscribe">
        <b-form-input type="text"
                      placeholder="Enter class name"
                      v-model="classCode"></b-form-input>
      </form>
    </b-modal>
  </div>
</template>

<script>
export default {
  name: 'join-class',
  data () {
    return {
      modalShow: false,
      classCode: ''
    }
  },
  methods: {

    subscribe() {
      this.$http.post(`api/classroom/${this.classCode}`) ;
        // .then(response => {
        //   console.log('success')
        // });
    }
  }
}
</script>