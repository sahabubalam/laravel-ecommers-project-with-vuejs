<template>
    <div>
       <main>
                    <div class="container-fluid">                                             
                        <div class="card">
                            <div class="card-header">                           
                            <h3 class="card-title">Post-List</h3>
                             <div class="text-right">
                                <button class="btn btn-primary">
                                 <router-link to="/add-blogpost" style="color:white;text-decoration:none">Add Post</router-link>
                                </button>
                            </div>
                           
                        </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>SI</th>
                                                <th>Post Title English</th>
                                                <th>Post Title Bangla</th>
                                                <th>Post Description English</th>
                                                <th>Post Description Bangla</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                          <tr v-for="(blogpost,index) in getallblogpost">
                                                <td>{{index+1}}</td>
                                                <td>{{blogpost.post_title_eng}}</td>
                                                <td>{{blogpost.post_title_bng}}</td>
                                                <td>{{blogpost.post_description_eng}}</td>
                                                <td>{{blogpost.post_description_bng}}</td>
                                                
                                                <td> <img :src="BlogpostImage(blogpost.image)" style="width:80px"></td>
                                               
                                                <td>
                                                    <router-link :to="`/edit-blogpost/${blogpost.id}`" class="btn btn-sm btn-info">Edit</router-link>
                                                    <a @click.prevent="deleteBlogpost(blogpost.id)" class="btn btn-sm btn-danger"  id="delete">Delete</a>
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
        this.$store.dispatch("GetAllBlogpost")
     },
     computed:
     {
        getallblogpost()
        {
            return this.$store.getters.getBlogpost
        }
     },
     methods:
     {
       
         BlogpostImage(img)
         {
             return "uploadimage/"+img;
         },
         deleteBlogpost(id)
         {
             axios.get('/delete-blogpost/'+id)
              .then(()=>{
                this.$store.dispatch("GetAllBlogpost")
                  Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'blogpost deleted successfully',
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