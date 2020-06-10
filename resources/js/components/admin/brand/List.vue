<template>
    <div>
       <main>
                    <div class="container-fluid">                                             
                        <div class="card">
                            <div class="card-header">                           
                            <h3 class="card-title">Brand-List</h3>
                             <div class="text-right">
                                <button class="btn btn-primary">
                                 <router-link to="/add-brand" style="color:white;text-decoration:none">Add Brand</router-link>
                                </button>
                            </div>
                           
                        </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>SI</th>
                                                <th>Brand Name</th>
                                                <th>Brand Logo</th>
                                                
                                                <th>Action</th>
                                            
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                          <tr v-for="(brand,index) in getallbrand">
                                                <td>{{index+1}}</td>
                                                <td>{{brand.brand_name}}</td>
                                                 <td><img :src="BrandImage(brand.brand_logo)" style="width:80px"></td>
                                               
                                                <td>
                                                    <router-link :to="`/edit-brand/${brand.id}`" class="btn btn-sm btn-info">Edit</router-link>
                                                    <a @click.prevent="deleteBrand(brand.id)" class="btn btn-sm btn-danger" id="delete">Delete</a>
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
         this.$store.dispatch("GetAllBrand")
     },   
     computed:
     {
        getallbrand()
        {
            return this.$store.getters.getBrand
        }
     },
     methods:
     {
        BrandImage(img)
        {
            return "uploadimage/"+img;
        },
        deleteBrand(id)
        {
            axios.get('/delete-brand/'+id)
            .then(()=>{
               this.$store.dispatch("GetAllBrand")
                 Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Brand deleted successfully',
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