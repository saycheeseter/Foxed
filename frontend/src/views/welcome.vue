<template>
<div>
  <!-- <welcome-nav-list></welcome-nav-list> -->
  <login></login>
  <div class="container-fluid">
    <div class="row justify-content-sm-center">
      <div class="col-9">
        <div class="block-full-height d-flex justify-content-center align-items-center">
          <div class="row flex-column-reverse flex-lg-row">
            <div class="col-lg-6 d-flex align-items-center ">
              <h2 class="">Foxed Folio
                <br>
                <small>Lorem Ipsum de something to be written here about the website.</small>
              </h2>
            </div>
            <div class="col-lg-6 mb-4">
              <h3>Sign Up!</h3>
              <form action="">
                <input class="mt-2 p-2" type="text" placeholder="Username">
                <input class="mt-2 p-2" type="text" placeholder="Email Address">
                <input class="mt-2 p-2" type="password" placeholder="Password">
                <input class="mt-2 mb-2 p-2" type="password" placeholder="Repeat Password">
                <a class="btn btn-success my-2 my-sm-0" href="">Sign Up</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
// import welcomeNavigation from '../components/welcome-navigation.vue'
import Login from '../components/authentication/Login.vue';
  export default {
    components: {
      // 'welcome-nav-list': welcomeNavigation
      'login': Login
    }

  }
</script>

<style scoped>
  form input {
    width: 100%;
  }

</style>