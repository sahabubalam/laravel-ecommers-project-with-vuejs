<template>
    <div>
       <main>
                    <div class="container-fluid">                                             
                        <div class="card">
                            <div class="card-header">                           
                            <h3 class="card-title">Post-List</h3>
                             <div class="text-right">
                                <button class="btn btn-primary">
                                 <router-link to="/add-product" style="color:white;text-decoration:none">Add Post</router-link>
                                </button>
                            </div>
                           
                        </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>SI</th>
                                                <th>Product Name</th>
                                                <th>Product Code</th>
                                                <th>Product Quantity</th>
                                                <th>Discount Price</th>
                                                <th> Selling Price</th>
                                                <th>Image</th>
                                                <th>status</th>
                                                <th>Action</th>
                                            
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                          <tr v-for="(product,index) in getallproduct">
                                                <td>{{index+1}}</td>
                                                <td>{{product.product_name}}</td>
                                                <td>{{product.product_code}}</td>
                                                <td>{{product.product_quantity}}</td>
                                                <td>{{product.price}}</td>
                                                <td>{{product.selling_price}}</td>
                                                <td><img :src="ProductImage(product.product_image) " style="width:80px"></td>
                                                <td>{{product.status}}</td>
                                                <td>
                                                    <router-link :to="`/edit-product/${product.id}`" class="btn btn-sm btn-info">Edit</router-link>
                                                    <a class="btn btn-sm btn-danger" @click.prevent="deleteProduct(product.id)" id="delete">Delete</a>
                                                </td>                        
                                         </tr>                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
       
    </div>
</template>
<script>
export default{
     name:"List",
     mounted()
     {
         this.$store.dispatch("GetAllProduct")
     },
     computed:
     {
        getallproduct()
        {
            return this.$store.getters.getProduct
        }
     },
     methods:
     {
         ProductImage(img)
         {
             return "uploadimage/"+img;
         },
         //start delete product
         deleteProduct(id)
         {
             axios.get('/delete-product/'+id)
             .then(()=>{
                 this.$store.dispatch("GetAllProduct")
                  Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'product deleted successfully',
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