<template>
    <div>
   <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Add New Blogpost</h3></div>
                                <div class="card-body">
                                <form role="form" enctype="multipart/form-data" @submit.prevent="AddBlogpost()">
                                 <div class="form-group">
                                        <label>Select Category</label>
                                            <select class="form-control" :class="{ 'is-invalid': form.errors.has('category_id') }" v-model="form.category_id" name="category_id">
                                                <option disabled value="">Select One</option>
                                                <option :value="category.id" v-for="category in getallCategory">option {{category.category_name}}</option>
                                                
                                            </select>
                                        
                                        <has-error :form="form" field="category_id"></has-error>
                                    </div>
                                   
                                     
                                    <div class="form-group">
                                        <label class="small mb-1" for="productId">Post Title English </label>
                                        <input class="form-control py-3" id="posttitleen" type="text" placeholder="Post Title English " :class="{ 'is-invalid': form.errors.has('post_title_eng') }" v-model="form.post_title_eng" name="post_title_eng" />
                                        <has-error :form="form" field="post_title_eng"></has-error>
                                    </div>
                                     <div class="form-group">
                                        <label class="small mb-1" for="productCodeId">Post Title Bangla </label>
                                        <input class="form-control py-3" id="posttitlebn" type="text" placeholder="Post Title Bangla " :class="{ 'is-invalid': form.errors.has('post_title_bng') }" v-model="form.post_title_bng" name="post_title_bng" />
                                        <has-error :form="form" field="post_title_bng"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="descriptionId">Post Description English</label>
                                        <textarea class="form-control py-3" id="descriptionenId" type="text" placeholder="Description" :class="{ 'is-invalid': form.errors.has('post_description_eng') }" v-model="form.post_description_eng" name="post_description_eng" />
                                        </textarea>
                                        <has-error :form="form" field="post_description_eng"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="descriptionId">Post Description Bangla</label>
                                        <textarea class="form-control py-3" id="descriptionbnId" type="text" placeholder="Description" :class="{ 'is-invalid': form.errors.has('post_description_bng') }" v-model="form.post_description_bng" name="post_description_bng" />
                                        </textarea>
                                        <has-error :form="form" field="post_description_bng"></has-error>
                                    </div>
                                     
                                    

                                    
                                    <div class="form-group">
                                        <label>Add Image</label>
                                           <input @change="changeImage($event)" type="file" class="form-control" :class="{ 'is-invalid': form.errors.has('image') }" name="image">
                                            <img :src="form.image" style="width:80px">
                                        <has-error :form="form" field="image"></has-error>
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
                    post_title_eng:'',
                    post_title_bng:'',
                    post_description_eng:'',
                    post_description_bng:'',
                    image:'',
                       
                })
            }
        },
        mounted()
        {
             this.$store.dispatch("allcategory")
        },
        computed:
        {
          getallCategory()
           {
             return this.$store.getters.getCategory
           },
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
                         this.form.image = event.target.result
                         console.log(event.target.result)
                     };
                     reader.readAsDataURL(file);
                 }
            },
            AddBlogpost()
            {
                this.form.post('/add-blogpost')
                .then((response)=>{
                this.$router.push('/blogpost-list')
                Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Post inserted successfully',
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