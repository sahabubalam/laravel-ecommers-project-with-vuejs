<template>
    <span>

     <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li v-for="category in allcategories">
                            <router-link :to="`/product-category/${category.id}`">{{category.category_name}}</router-link>
                            </li>
                            
                        </ul>
                    </div>
    </span>
</template>
<script>

    export default{
        name:"New",
      
       computed:
        {
           allcategories()
           {
               return this.$store.getters.getCategory
           }
           
        },
        mounted()
        {
            
             this.$store.dispatch("allcategory")
        },
        methods:
        {
          
        },
         watch:
        {
          
          
        }
       
        
    }
</script>  
<style scoped>
 </style>      