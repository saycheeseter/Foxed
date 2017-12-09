<template>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group" :class="{'has-error': theErrors.name }">
                        <input
                            v-model="user.name"
                            class="form-control"
                            type="text"
                            placeholder="Name">
                            <p class="help-block" v-for="error in theErrors.name"> {{error}}</p>
                    </div>
                    <div class="form-group" :class="{'has-error': theErrors.email }">
                        <input
                            v-model="user.email"
                            class="form-control"
                            type="email"
                            placeholder="Email">
                            <p class="help-block" v-for="error in theErrors.email"> {{error}}</p>
                    </div>
                    <div class="form-group" :class="{'has-error': theErrors.password }">
                        <input
                            v-model="user.password"
                            class="form-control"
                            type="password"
                            placeholder="Password">
                            <p class="help-block" v-for="error in theErrors.password"> {{error}}</p>
                    </div>
                    <div class="form-group" :class="{'has-error': theErrors.password_confirmation }">
                        <input
                            v-model="user.password_confirmation"
                            class="form-control"
                            type="password"
                            placeholder="Confirm Password">
                            <p class="help-block" v-for="error in theErrors.password_confirmation"> {{error}}</p>
                    </div>
                    <button @click="register()" class="btn btn-success pull-right">
                        Register
                    </button>
                </div>
            </div>
            <div class="card">
                
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            user: {
                name: null,
                email: null,
                password: null,
                password_confirmation:null
            },
            theErrors: {
                name: [],
                email: [],
                password: [],
                password_confirmation:[]
            }
        }
    },
    methods: {
        register(){
            this.$http.post('api/register/', this.user)
                .then(response => {
                    console.log(response)
                })
                .catch(error =>{
                    let data = error.body.errors
                    console.log("data", data)
                    for (let key in this.theErrors){
                        this.theErrors[key] = []
                        let errMsg = data[key]
                        if(errMsg){
                            this.theErrors[key] = errMsg
                        }
                    }
                })
        }
    }
}
</script>
