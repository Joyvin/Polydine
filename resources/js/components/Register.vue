<template>
  <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card myshadow">

                        <div class="card-body p-4">

                        <div class="col-lg-12">
                                <div class="text-center">
                                    <a :href="route.home" class="mb-4 d-block auth-logo">
                                        <img :src="assets.logo" alt="" class="logo w-50">
                                    </a>
                                </div>
                            </div>
                            <div class="text-center mt-2">
                                <h6 class="text-primary">Sign in to continue to Noteify.</h6>
                            </div>
                            <div class="text-center mt-3">
                                <a :href="route.loginGoogle">
                                    <button class="border border-primary align-items-center btn w-75 hover-shadow-primary"> 
                                        <img style="width: 1.5em" class="img-fluid me-2" :src="assets.google" alt=""> 
                                        Continue with Google
                                    </button>
                                </a>
                            </div>
                            <div class="mt-3">
                                <div class="mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input :class="eerror ? 'is-invalid' : ''" @input="validateEmail()" v-model="email" type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                                    <span v-if="eerror" class="invalid-feedback" role="alert">
                                        <strong>{{this.eerror}}</strong>
                                    </span>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="username">Username</label>
                                    <input :class="nerror ? 'is-invalid' : ''" @input="validateName()" v-model="name" type="text" class="form-control" name="name" id="username" placeholder="Enter username">
                                    <span v-if="nerror" class="invalid-feedback" role="alert">
                                        <strong>{{this.nerror}}</strong>
                                    </span>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="userpassword">Password</label>
                                    <input :class="perror ? 'is-invalid' : ''" @input="validatePassword()" v-model="password" type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password">
                                    <span v-if="perror" class="invalid-feedback" role="alert">
                                        <strong>{{this.perror}}</strong>
                                    </span>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                                    <input :class="cerror ? 'is-invalid' : ''" @input="validateCPassword()" v-model="cpassword" type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Enter confirm password">
                                    <span v-if="cerror" class="invalid-feedback" role="alert">
                                        <strong>{{this.cerror}}</strong>
                                    </span>
                                </div>


                                <div class="form-check">
                                    <input v-model="tnc" type="checkbox" class="form-check-input" id="auth-terms-condition-check">
                                    <label class="form-check-label" for="auth-terms-condition-check">I accept <a href="javascript: void(0);" class="text-dark">Terms and Conditions</a></label>
                                </div>

                                <div class="mt-3 text-end">
                                    <button @click="register()" :class="tnc && name && email && password && cpassword ? '' : 'disabled'" class="btn btn-primary w-sm waves-effect waves-light" type="submit">Register</button>
                                </div>

                                <div class="mt-4 text-center">
                                    <p class="text-muted mb-0">Already have an account ? <a :href="route.login"
                                            class="fw-medium text-primary"> Login</a></p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
</template>

<script>
export default {
    name: 'Register',

    data(){
        return{
            route: {
                'index': route('dashboard'),
                'login': route('login'),
                'loginGoogle': route('login-google')
            },
            assets:{
                'logo': assetPath('img/logo-lg-light.png'),
                'google': assetPath('img/google.png')
            },
            token: getToken(),
            email: '',
            name: '',
            password: '',
            cpassword: '',
            eerror: '',
            nerror: '',
            perror: '',
            cerror: '',
            tnc: '',
        }
    },

    methods: {
        async validateName(){
            var form = {'_token': this.token, 'name': this.name}
            var res = await axios.post(route('validate.name'), form).catch((e)=>{return e.response})
            this.nerror = res.status != 200 ? res.data.message : ''
        },

        async validateEmail(){
            
            var form = {'_token': this.token, 'email': this.email}
            var res = await axios.post(route('validate.email'), form).catch((e)=>{return e.response})
            this.eerror = res.status != 200 ? res.data.message : ''
        },

        async validatePassword(){
            var form = {'_token': this.token, 'password': this.password}
            var res = await axios.post(route('validate.password'), form).catch((e)=>{return e.response})
            this.perror = res.status != 200 ? res.data.message : ''
        },
        
        async validateCPassword(){
            this.cerror = this.password != this.cpassword ? 'The passwords do not match' : ''
        },

        async register(){
            var form = {'_token': this.token, 'password': this.password, 'email': this.email, 'name': this.name}
            var res = await axios.post(route('cregister'), form).then((e)=>{return e.data})

            if(res == 200){
                location.reload()
            }
        }
    }
}
</script>

<style>

</style>