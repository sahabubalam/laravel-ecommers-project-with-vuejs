<template>
    <span>
    
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>Login</h2>
                        <form action="#">
                            <div class="group-input">
                                <label for="username">Email address *</label>
                                <input type="text" :class="{ 'is-invalid': form.errors.has('email') }" v-model="form.email" name="email">
                                <has-error :form="form" field="email"></has-error>
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="text" :class="{ 'is-invalid': form.errors.has('password') }" v-model="form.password" name="password">
                                <has-error :form="form" field="password"></has-error>
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="save-pass">
                                        Save Password
                                        <input type="checkbox" id="save-pass">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="#" class="forget-pass">Forget your Password</a>
                                </div>
                            </div>
                            <button @click.prevent="Login()" type="submit" class="site-btn login-btn">Sign In</button>
                        </form>
                        <div class="switch-login">
                            <router-link to="/register" class="or-login">Or Create An Account</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->

    <link rel="stylesheet" href="/../../assets/form/css/style.css" type="text/css">
    <link rel="stylesheet" href="/../../assets/form/css/bootstrap.min.css" type="text/css">

    </span>
    
</template>
<script>
export default{
    name:"Login",
    data()
    {
        return{
             form: new Form({
                    email:'',
                    password:'',
                       
                })
        }
    },
    mounted()
    {

    },
    computed:
    {

    },
    methods:
    {
        Login()
        {
            this.form.post('/login-customer')
            .then((response)=>{
                this.$router.push('/shipping-cart')
                Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Login successfull',
                            showConfirmButton: false,
                            timer: 1500
                            })
                    })
        }
    }
}
</script>
<style scoped>
 </style>