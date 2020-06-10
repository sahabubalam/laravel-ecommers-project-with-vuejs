<template>
    <div>
   <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Category</h3></div>
                            <div class="card-body">
                                <form role="form" >
                                    <div class="form-group">
                                        <label class="small mb-1" for="categoryId">Edit Category</label>
                                        <input class="form-control py-3" id="categoryId" type="text" placeholder="Category" :class="{ 'is-invalid': form.errors.has('category_name') }" v-model="form.category_name" name="category_name" />
                                        <has-error :form="form" field="category_name"></has-error>
                                    </div>
                                  
                                   
                                    <div class="form-group mt-4 mb-0">
                                        <button @click.prevent="updateCategory()" class="btn btn-primary btn-block text-white" type="submit" >Update</button>
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
    name:"Edit",
  
    //mounted first load and show exists data

    mounted()
    {
       axios.get(`/editcategory/${this.$route.params.id}`)  //routes.js a jvabe id deya thakbe akhane sevabe id ta likhte hoi
       .then((response)=>{
           this.form.fill(response.data.category)  //load hobar pore id onusare field fill up hoi
       })
    },
    data()
    {
        return{
            form:new Form({
                category_name:'',
            })
        }

    },
    methods:{
        updateCategory(){
            this.form.post(`/update-category/${this.$route.params.id}`)
            .then((response)=>{
               this.$router.push('/category-list')
               Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Category updated successfully',
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