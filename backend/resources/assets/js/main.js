import Vue from 'vue'
import App from './App.vue'
import Router from './routes.js'
import VeeValidate from 'vee-validate'
import VueResource from 'vue-resource'

import Auth from './packages/auth/Auth.js'


Vue.use(VueResource)
Vue.use(Auth)
Vue.use(VeeValidate)

Vue.http.options.root = 'http://localhost:8000'
Vue.http.headers.common['Authorization'] = 'Bearer ' + Vue.auth.getToken();

Vue.http.interceptors.push((request, next) => {
  next(response => {
    if(response.status == 404){
      swal("Succesfully Updated!", {
        title: 'Error ' + response.status,
        text: response.body.error,
        icon: "error",
        });
    }
    else if(response.status == 500)
    swal("Succesfully Updated!", {
      title: 'Error ' + response.status,
      text: "There's a problem in the server",
      icon: "error",
      });
  })
})

Router.beforeEach(
    (to,from,next) => {
      if(to.matched.some(record => record.meta.forVisitors)) {
        if(Vue.auth.isAuthenticated()) {
          next({
            path: '/feed'
          })
        }else next()
      }
      else if(to.matched.some(record => record.meta.forAuth)) {
        if( !Vue.auth.isAuthenticated()) {
          next({
            path: '/login'
          })
        }else next()
      }
      else next()
    }
)


new Vue({
  el: '#app',
  render: h => h(App),
  router: Router 
})
