<template>
    <div>
        <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All departments</span>
                        <ul class="depart-hover">
                            
                            <li v-for="category in allcategories ">
                            <a href="#">{{category.category_name}}</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
                <Navbar/>
                
    </div>
</template>
<script>
import Navbar from "./Navbar.vue"
    export default{
        name:"Category",
        components:
        {
            Navbar
        },
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
          
        }
    }
</script>  
<style scoped>
 </style>    