<template>
    <div>
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Category</h3></div>
                            <div class="card-body">
                                <form role="form" >
                                    <div class="form-group">
                                         <label class="small mb-1" for="categoryId">Add Category</label>
                                        <input class="form-control py-3" id="categoryId" type="text" placeholder="Category" :class="{ 'is-invalid': form.errors.has('category_name') }" v-model="form.category_name" name="category_name" />
                                        <has-error :form="form" field="category_name"></has-error>
                                    </div>
                                  
                                   
                                    <div class="form-group mt-4 mb-0">
                                      <button @click.prevent="addCategory()" type="submit" class="btn btn-primary btn-block">Submit</button>
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
            form:new Form({
                category_name:''
            })
        }

    },
   
    methods:{
        addCategory(){
            this.form.post('/add-category')
            .then((response)=>{
               this.$router.push('/category-list')
               Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Category inserted successfully',
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