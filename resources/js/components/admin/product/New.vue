<template>
    <div>
   <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Add New Product</h3></div>
                            <div class="card-body">
                                <form role="form" enctype="multipart/form-data" @submit.prevent="AddNewProduct()">
                                 <div class="form-group">
                                        <label>Select Category</label>
                                            <select class="form-control" :class="{ 'is-invalid': form.errors.has('category_id') }" v-model="form.category_id" name="category_id">
                                                <option disabled value="">Select One</option>
                                                <option :value="category.id" v-for="category in getallCategory">option {{category.category_name}}</option>
                                                
                                            </select>
                                        
                                        <has-error :form="form" field="category_id"></has-error>
                                    </div>
                                   
                                     <div class="form-group">
                                        <label>Select Brand</label>
                                            <select class="form-control" :class="{ 'is-invalid': form.errors.has('brand_id') }" v-model="form.brand_id" name="brand_id">
                                                <option disabled value="">Select One</option>
                                                <option :value="brand.id" v-for="brand in getallbrand">option {{brand.brand_name}}</option>
                                                
                                            </select>
                                        
                                        <has-error :form="form" field="brand_id"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="productId">Product Name </label>
                                        <input class="form-control py-3" id="productId" type="text" placeholder="Product Name" :class="{ 'is-invalid': form.errors.has('product_name') }" v-model="form.product_name" name="product_name" />
                                        <has-error :form="form" field="product_name"></has-error>
                                    </div>
                                     <div class="form-group">
                                        <label class="small mb-1" for="productCodeId">Product Code </label>
                                        <input class="form-control py-3" id="productCodeId" type="text" placeholder="Product Code" :class="{ 'is-invalid': form.errors.has('product_code') }" v-model="form.product_code" name="product_code" />
                                        <has-error :form="form" field="product_code"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="productQuantityId">Product Quantity </label>
                                        <input class="form-control py-3" id="productQuantityId" type="text" placeholder="Product Quantity" :class="{ 'is-invalid': form.errors.has('product_quantity') }" v-model="form.product_quantity" name="product_quantity" />
                                        <has-error :form="form" field="product_quantity"></has-error>
                                    </div>
                                     <div class="form-group">
                                        <label class="small mb-1" for="productPriceId">Product Price </label>
                                        <input class="form-control py-3" id="productPriceId" type="text" placeholder="Product Price" :class="{ 'is-invalid': form.errors.has('price') }" v-model="form.price" name="price" />
                                        <has-error :form="form" field="product_price"></has-error>
                                    </div>
                                     <div class="form-group">
                                        <label class="small mb-1" for="sellingPriceId">Selling Price</label>
                                        <input class="form-control py-3" id="sellingPriceId" type="text" placeholder="selling Price" :class="{ 'is-invalid': form.errors.has('selling_price') }" v-model="form.selling_price" name="selling_price" />
                                        <has-error :form="form" field="selling_price"></has-error>
                                    </div>
                                     <div class="form-group">
                                        <label>Select status</label>
                                            <select class="form-control" :class="{ 'is-invalid': form.errors.has('status') }" v-model="form.status" name="status">
                                                <option disabled value="">Select One</option>
                                                <option>0 </option>
                                                <option>1 </option>
                                                
                                            </select>
                                        
                                        <has-error :form="form" field="status"></has-error>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label>Add Image</label>
                                           <input @change="changeImage($event)" type="file" class="form-control" :class="{ 'is-invalid': form.errors.has('product_image') }" name="product_image">
                                            <img :src="form.image" style="width:80px">
                                        <has-error :form="form" field="product_image"></has-error>
                                    </div>
                                  
                                   
                                    <div class="form-group mt-4 mb-0">
                                     <button class="btn btn-primary btn-block" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </main>     
    </div>
</template>
<script>
    export default{
        name:"New",
        data()
        {
            return{
                form: new Form({
                    category_id:'',
                    subcategory_id:'',
                    brand_id:'',
                    product_name:'',
                    product_code:'',
                    product_quantity:'',
                    price:'',
                    selling_price:'',
                    status:'',
                    product_image:'',
                       
                })
            }
        },
        mounted()
        {
             this.$store.dispatch("allcategory")
             this.$store.dispatch("GetAllBrand")
        },
        computed:
        {
         getallCategory()
           {
             return this.$store.getters.getCategory
           },
           getallbrand()
           {
               return this.$store.getters.getBrand
           }
        },
        methods:
        {
            changeImage(event){
                let file = event.target.files[0];

                 if(file.size>1048576){
                     swal({
                         type: 'error',
                         title: 'Oops...',
                         text: 'Something went wrong!',
                         footer: '<a href>Why do I have this issue?</a>'
                     })
                 }else{
                     let reader = new FileReader();
                     reader.onload = event => {
                         this.form.product_image = event.target.result
                         console.log(event.target.result)
                     };
                     reader.readAsDataURL(file);
                 }
            },
            AddNewProduct()
            {
                this.form.post('/add-product')
                .then((response)=>{
                    this.$router.push('/product-list')
                    Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'product inserted successfully',
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