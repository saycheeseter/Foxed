<template>
    <div class="row login-block d-flex justify-content-end">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <input
                            v-model="email"
                            class="form-control"
                            type="email"
                            placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input
                            v-model="password"
                            class="form-control"
                            type="password"
                            placeholder="Password">
                    </div>
                    <button @click="login" class="btn btn-success pull-right">
                        Login
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'login',
        data () {
            return {
                email: '',
                password: ''
            }
        },
        methods : {
            login (){
                var data = {
                    client_id : 2,

                    client_secret :'r2NPhbm1sUYvk0KC3vbEnfpV86FJsYdfqBOQF8GW',

                    grant_type: 'password',
                    username: this.email,
                    password: this.password
                }

                this.$http.post("oauth/token", data)
                    .then(response => {
                        this.$auth.setToken(response.body.access_token, response.body.expires_in + Date.now())
                        this.$router.push("/")
                        console.log(response)
                    })
            }
        }
    }
</script>
<style scoped lang="scss">
    .login-block {
        transform: scale(0.7);
        position: absolute;
        right: 8%;
        bottom: 0;
        z-index: 99;
       input {
           width: 100%;
       }
       .card {
           width: 500px;
       }
    }
</style>

