<template>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">

                        <div class="card-body p-4">
                            
                            <div class="col-lg-12">
                                <div class="text-center">
                                    <a :href="route.index" class="mb-4 d-block auth-logo">
                                        <img :src="assets.logo" alt=""
                                            class="logo w-50">
                                    </a>
                                </div>
                            </div>
                            <div class="text-center mt-2">
                                <h6 class="text-primary">Log in to continue to Noteify.</h6>
                            </div>
                            <div class="text-center mt-3">
                                <a :href="route.loginGoogle">
                                    <button class="border border-primary align-items-center btn w-75 hover-shadow-primary"> 
                                        <img style="width: 1.5em" class="img-fluid me-2" :src="assets.google" alt=""> 
                                        Continue with Google
                                    </button>
                                </a>
                            </div>
                            <div class="p-2 mt-4">
                                <div class="mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input v-model="email" type="text" class="form-control" :class="error ? 'is-invalid' : '' " name="email" id="email" placeholder="Enter Email address">
                                    <span v-if="error" class="invalid-feedback" role="alert">
                                        <strong>{{this.error}}</strong>
                                    </span>
                                </div>

                                <div class="mb-3">
                                    <div class="float-end">
                                            <a :href="route.prequest" class="text-muted">Forgot password?</a>
                                    </div>
                                    <label class="form-label" for="userpassword">Password</label>
                                    <input :class="error ? 'is-invalid' : ''" v-model="password" type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password">
                                </div>

                                <div class="form-check">
                                    <input v-model="remember" type="checkbox" class="form-check-input" id="auth-remember-check" name="remember">
                                    <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                </div>

                                <div class="mt-3 text-end">
                                    <button @click="login()" class="btn btn-primary w-sm waves-effect waves-light">
                                        Log In
                                    </button>
                                </div>

                                <div class="mt-4 text-center">
                                    <p class="mb-0">Don't have an account ? <a :href="route.register"
                                            class="fw-medium text-primary"> Signup now </a> </p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Login',

    data(){
        return{
            route: {
                'index': route('dashboard'),
                'prequest': route('password.request'),
                'register': route('register'),
                'loginGoogle': route('login-google')
            },
            assets:{
                'logo': assetPath('img/logo-lg-light.png'),
                'google': assetPath('img/google.png')
            },
            token: getToken(),
            email: '',
            password: '',
            remember: '',
            error: '',
        }
    },

    methods:{
        async login(){
            var form = {'email': this.email, 'password': this.password, 'remember': this.remember, '_token': this.token};
            var res = await axios.post(route('clogin'), form).then((e)=>{return e.data})
            if(res == 200){
                location.reload()
            }
            else{
                this.error = res
            }
        }
    }
}
</script>

<style>

</style>