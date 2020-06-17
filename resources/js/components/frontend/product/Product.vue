  
<template>
    <span>
	 <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/../../assets/front/img/categories/cat-1.jpg">
                            <h5><a href="#">Fresh Fruit</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/../../assets/front/img/categories/cat-2.jpg">
                            <h5><a href="#">Dried Fruit</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/../../assets/front/img/categories/cat-3.jpg">
                            <h5><a href="#">Vegetables</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/../../assets/front/img/categories/cat-4.jpg">
                            <h5><a href="#">drink fruits</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/../../assets/front/img/categories/cat-5.jpg">
                            <h5><a href="#">drink fruits</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

 <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product{{this.$route.params.id}}</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                           <li data-filter=".vegetables">All Product</li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <div class="col-lg-3 col-md-4 col-sm-6  vegetables" v-for="product in getallproductbycatid">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" >
						<img :src="PostImage(product.product_image)">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><router-link :to="`/shop-details/${product.id}`"><i class="fa fa-shopping-cart"></i></router-link></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

	
    </span>
</template>
<script>
    export default{
        name:"New",
        components:
        {
            
           
        },
		mounted()
        {
            this.$store.dispatch("GetAllProduct")
			this.getallproduct();
			
        },
       
        computed:
        {
			getallproductbycatid()
			{
				return this.$store.getters.getProduct
			}
        },
        methods:
        {
		  PostImage(img)
         {
             return "uploadimage/"+img;
         },
		 getallproduct()
         {
            
			this.$store.dispatch('GetProductByCatId',this.$route.params.id)   
         }
          
        },
        watch:
        {
          $route(to,from)
          {
            this.getallproduct();
          }
        }
    }
</script>  
<style scoped>
 </style>