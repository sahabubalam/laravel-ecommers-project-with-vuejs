<template>
    <div>
         <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><router-link to="/home">Home</router-link></li>
                        <li><a href="./shop.html">Shop</a></li>
                        <li><a href="#">Collection</a>
                            <ul class="dropdown">
                                <li><a href="#">Men's</a></li>
                                <li><a href="#">Women's</a></li>
                                <li><a href="#">Kid's</a></li>
                            </ul>
                        </li>
                        <li><a href="./blog.html">Blog</a></li>
                        <li><a href="./contact.html">Contact</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="./blog-details.html">Blog Details</a></li>
                                <li><a href="./shopping-cart.html">Shopping Cart</a></li>
                                <li><a href="./check-out.html">Checkout</a></li>
                                <li><a href="./faq.html">Faq</a></li>
                                <li><a href="./register.html">Register</a></li>
                                <li><a href="./login.html">Login</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                

                
                
    </div>
    
  
</template>
<script>
import LeftSidebar from "./LeftSidebar.vue"
    export default{
        name:"Category",
        components:
        {
            LeftSidebar
        },
       computed:
        {
           
           
        },
        mounted()
        {
            
            
        },
        methods:
        {
          
        }
    }
</script>  
<style scoped>
 </style>    
