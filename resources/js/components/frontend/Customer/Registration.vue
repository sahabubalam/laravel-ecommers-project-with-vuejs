<template>
    <span>
        

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Register</h2>
                        <form action="#">
                            <div class="group-input">
                                <label for="username">Email address *</label>
                                <input type="text" id="username" :class="{ 'is-invalid': form.errors.has('email') }" v-model="form.email" name="email">
                                <has-error :form="form" field="email"></has-error>
                            </div>
                             <div class="group-input">
                                <label for="Name">Full Name *</label>
                                <input type="text" id="username" :class="{ 'is-invalid': form.errors.has('name') }" v-model="form.name" name="name">
                                 <has-error :form="form" field="name"></has-error>
                            </div>
                             <div class="group-input">
                                <label for="address">Address *</label>
                                <input type="text" :class="{ 'is-invalid': form.errors.has('address') }" v-model="form.address" name="address">
                                 <has-error :form="form" field="address"></has-error>
                            </div>
                             <div class="group-input">
                                <label for="address">Phone *</label>
                                <input type="text" :class="{ 'is-invalid': form.errors.has('phone') }" v-model="form.phone" name="phone">
                                 <has-error :form="form" field="phone"></has-error>
                            </div>
                             <div class="group-input">
                                <label for="postcode">Post Code *</label>
                                <input type="text" id="username" :class="{ 'is-invalid': form.errors.has('postcode') }" v-model="form.postcode" name="postcode">
                                 <has-error :form="form" field="postcode"></has-error>
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="text" id="pass" :class="{ 'is-invalid': form.errors.has('password') }" v-model="form.password" name="password">
                                <has-error :form="form" field="password"></has-error>
                            </div>
                            <button @click.prevent="Registration()" type="submit" class="site-btn register-btn">REGISTER</button>
                        </form>
                        <div class="switch-login">
                            <router-link to="/login" class="or-login">Or Login</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
    <link rel="stylesheet" href="/../../assets/form/css/style.css" type="text/css">

     
    </span>
</template>
<script>
    export default{
        name:"New",
        data()
        {
            return{
                form: new Form({
                    email:'',
                    name:'',
                    address:'',
                    phone:'',
                    postcode:'',
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
            
            Registration()
            {
                this.form.post('/customer-registration')
                .then((response)=>{
                    this.$router.push('/shipping-cart')
                    Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Registration successfull',
                            showConfirmButton: false,
                            timer: 1500
                            })
                    })
                    .catch(()=>{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>Why do I have this issue?</a>'
                            })

                        }) 

            }
           
        }
    }
</script>
<style scoped>
 </style>