<template>
    <div>
   <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Add New Brand</h3></div>
                            <div class="card-body">
                                <form role="form" enctype="multipart/form-data" >
                                    <div class="form-group">
                                        <label class="small mb-1" for="categoryId">Add Title</label>
                                        <input class="form-control py-3" id="postId" type="text" placeholder="Brand Name" :class="{ 'is-invalid': form.errors.has('brand_name') }" v-model="form.brand_name" name="brand_name" />
                                        <has-error :form="form" field="brand_name"></has-error>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Add Image</label>
                                           <input @change="changeImage($event)" type="file" class="form-control" :class="{ 'is-invalid': form.errors.has('brand_logo') }" name="brand_logo">
                                            
                                             <img :src="updateImage()" style="width:80px">
                                        <has-error :form="form" field="brand_logo"></has-error>
                                    </div>
                                  
                                   
                                    <div class="form-group mt-4 mb-0">
                                     <button @click.prevent="UpdateBrand()" class="btn btn-primary btn-block" type="submit">Update</button>
                                      
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
                    brand_name:'',
                    brand_logo:''
                       
                })
            }
        },
        mounted()
        {
            
        },
        created()
        {
            axios.get(`/edit-brand/${this.$route.params.id}`)
            .then((response)=>{
                this.form.fill(response.data.brands)
            })
        },
        computed:
        {
         
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
                         this.form.brand_logo = event.target.result
                         console.log(event.target.result)
                     };
                     reader.readAsDataURL(file);
                 }
            },
           UpdateBrand()
           {
               this.form.post(`/update-brand/${this.$route.params.id}`)
               .then(()=>{
                   this.$router.push('/brand-list')
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Brand updated successfully',
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
        
              
           },
           updateImage()
            {
                let img=this.form.brand_logo ;
                if(img.length>100)
                {
                    return this.form.brand_logo
                }
                else
                {
                    return `uploadimage/${this.form.brand_logo}`
                }
            }
        }
    }
</script>
<style scoped>
 </style>