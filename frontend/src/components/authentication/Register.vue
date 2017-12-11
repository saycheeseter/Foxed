<template>
  <div class="">
    <div class="card pl-5 pr-5 pt-3 pb-3">
      <div class="card-body">
        <h5 class="text-center mt-2 mb-4 font--bold content__title">Create an account</h5>
        <div class="form-group" :class="{'has-error': theErrors.name }">
          <input v-model="user.name" class="form-control content__input--dark" type="text" placeholder="Name">
          <p class="help-block" v-for="error in theErrors.name"> {{error}}</p>
        </div>
        <div class="form-group" :class="{'has-error': theErrors.email }">
          <input v-model="user.email" class="form-control content__input--dark" type="email" placeholder="Email">
          <p class="help-block" v-for="error in theErrors.email"> {{error}}</p>
        </div>
        <div class="form-group" :class="{'has-error': theErrors.password }">
          <input v-model="user.password" class="form-control content__input--dark" type="password" placeholder="Password">
          <p class="help-block" v-for="error in theErrors.password"> {{error}}</p>
        </div>
        <div class="form-group" :class="{'has-error': theErrors.password_confirmation }">
          <input v-model="user.password_confirmation" class="form-control content__input--dark" type="password" placeholder="Confirm Password">
          <p class="help-block" v-for="error in theErrors.password_confirmation"> {{error}}</p>
        </div>
        <button @click="register()" class="btn mb-2 form__button--register-dark">
          Register
        </button>
      </div>
    </div>

  </div>

</template>

<script>
  import swal from 'sweetalert'
  export default {
    data() {
      return {
        user: {
          name: null,
          email: null,
          password: null,
          password_confirmation: null
        },
        theErrors: {
          name: [],
          email: [],
          password: [],
          password_confirmation: []
        }
      }
    },
    methods: {
      register() {
        this.$http.post('api/register/', this.user)
          .then(response => {
            swal("Succesfully Registered!", {
              icon: "success",
            });
          })
          .catch(error => {
            let data = error.body.errors
            console.log("data", data)
            for (let key in this.theErrors) {
              this.theErrors[key] = []
              let errMsg = data[key]
              if (errMsg) {
                this.theErrors[key] = errMsg
              }
            }
          })
      }
    }
  }

</script>
