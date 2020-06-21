<template>
    <span>
          <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                               <h1 hidden>{{$sum=0}}</h1>

                                <tr v-for="cart in getallcart">
                                    <td class="shoping__cart__item">
                                        <img :src="`/../../uploadimage.product_image/${cart.options.image}`" alt="">
                                        <h5>{{cart.name}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                       {{cart.price}}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            
                                                <h5>{{cart.qty}}</h5>
                                           
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                     {{cart.qty*cart.price}}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close"></span>
                                    </td>

                                    <h1 hidden>{{$sum =$sum+cart.price*cart.qty}}</h1>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <router-link to="/" class="primary-btn cart-btn">CONTINUE SHOPPING</router-link>
                        <router-link to="/shipping-cart" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Checkout</router-link>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul >
                            <li>Subtotal <span>$454.98</span></li>
                            <li>Total <span>${{$sum}}</span></li>
                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
    </span>
</template>

<script>

    export default{
        name:"Cart",
    
        computed:
        {
            getallcart()
            {
                return this.$store.getters.getCart
            },
           
        },
        methods:
        {
         CartImage(img)
         {
             return "/Cart::content/"+img;
         },
          
         
        },
        mounted()
        {
            this.$store.dispatch("GetAllCart")
            
        },
        
        watch:
        {
          $route(to,from)
          {
           
          }
        }
    }
</script>  
<style scoped>
 </style>  