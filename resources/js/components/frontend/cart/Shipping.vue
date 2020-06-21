<template>
<span>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="color:green">
                Dear {{session.name}}.You have to give us product shipping info to complete your valuable
                order.If your billing info are same then just press on save shipping button.
                </div>

                <div class="card-body">
                    <form >
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" v-model="form.name" name="name">

                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" v-model="form.email" name="email" >

                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" v-model="form.phone" name="phone" >

                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control"  v-model="form.address" name="address" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="postcode" class="col-md-4 col-form-label text-md-right">Post Code</label>

                            <div class="col-md-6">
                                <input id="postcode" type="text" class="form-control"  v-model="form.postcode" name="postcode" >
                            </div>
                        </div>

                        

                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button @click.prevent="Shpping()" type="submit" class="btn btn-primary">
                                    save shipping
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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
                    phone:'',
                    address:'',
                    postcode:'',
                       
                })
            }
        },
       
        mounted()
        {
             this.$store.dispatch("GetShipping")
        },
        created()
        {
            axios.get('/shipping-info')
            .then((response)=>{
                this.form.fill(response.data.customer)
            })
        },
        computed:
        {
          session()
          {
               return this.$store.getters.getShipping
          }
        },
        methods:
        {
            
           Shpping()
            {
                this.form.post('/customer-shipping')
                .then((response)=>{
                    this.$router.push('/payment')
                    Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Shipping successfull',
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