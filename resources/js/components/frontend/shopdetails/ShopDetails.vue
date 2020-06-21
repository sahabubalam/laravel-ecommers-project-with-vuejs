<template>
    <span>
    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6" >
                    <div class="product__details__pic" >
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                :src="`uploadimage/${singleproduct.product_image}`" alt="">
                                
                        </div>
                       
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>Vetgetable’s Package</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">$50.00</div>
                        <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam
                            vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet
                            quam vehicula elementum sed sit amet dui. Proin eget tortor risus.</p>
                    <form role="form">        
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                   <span class="input-number-decrement"> <i class="ti-minus"></i></span>
                                    <input class="input-number" type="number"  value="1" min="0" max="10" v-model="form.product_quantity" name="product_quantity">
                                    <input class="input-number" type="hidden" name="id" value="">
                                    <span class="input-number-increment"> <i class="ti-plus"></i></span>
                                </div>
                            </div>
                        </div>
                      
                        <button type="submit" @click.prevent="addcart()" class="primary-btn">ADD TO CARD</button>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                     
                    </form>    
                        
                        <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    </span>
</template>
<script>

    export default{
        name:"New",
        data()
        {
            return{
                form:new Form({
                product_quantity:'',
            })
            }
        },
        computed:
        {
            singleproduct()
            {
                return this.$store.getters.singleProduct
            }
        },
        methods:
        {
          singleProduct()
          {
            this.$store.dispatch('GetProductById',this.$route.params.id)
          }, 
          addcart(){
            this.form.post(`/add-cart/${this.$route.params.id}`)
            .then((response)=>{
               this.$router.push('/cart-details')
               Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Cart inserted successfully',
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
        },
        mounted()
        {
            this.singleProduct();
        },
        
        watch:
        {
          $route(to,from)
          {
            this.singleProduct();
          }
        }
    }
</script>  
<style scoped>
 </style>  