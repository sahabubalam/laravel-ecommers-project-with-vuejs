<template>
    <span>
     
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter" >
                    <div class="filter-widget">
                        <h4 class="fw-title">Categories</h4>
                        <ul class="filter-catagories" v-for="category in getallcategory">
                            <li><a href="#">{{category.category_name}}</a></li>
                            
                        </ul>
                    </div>
                       <div class="filter-widget">
                        <h4 class="fw-title">Brand</h4>
                        <div class="fw-brand-check">
                            <div class="bc-item" v-for="brand in getallbrand">
                                <label for="bc-calvin">
                                    {{brand.brand_name}}
                                    <input type="checkbox" id="bc-calvin">
                                    <span class="checkmark"></span>
                                </label>
                            </div>            
                           
                        </div>
                    </div>
                   
                   
                    <div class="filter-widget">
                        <h4 class="fw-title">Size</h4>
                        <div class="fw-size-choose">
                            <div class="sc-item">
                                <input type="radio" id="s-size">
                                <label for="s-size">s</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="m-size">
                                <label for="m-size">m</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="l-size">
                                <label for="l-size">l</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="xs-size">
                                <label for="xs-size">xs</label>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select class="sorting">
                                        <option value="">Default Sorting</option>
                                    </select>
                                    <select class="p-show">
                                        <option value="">Show:</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                                <p>Show 01- 09 Of 36 Product</p>
                            </div>
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row">
                           
                            <div class="col-lg-4 col-sm-6" v-for="product in getallproduct">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img :src="`uploadimage/${product.product_image}`" alt="">
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="#">+ Quick View</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">{{product.category.category_name}}</div>
                                        <a href="#">
                                            <h5>{{product.product_name}}</h5>
                                        </a>
                                        <div class="product-price">
                                            ${{product.price}}
                                            <span>${{product.selling_price}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
               
               
    </span>
   
</template>
<script>
    export default{
        name:"Category",
        
       computed:
        {
           getallproduct()
           {
               return this.$store.getters.getProduct
           },
           getallcategory()
           {
               return this.$store.getters.getCategory
           },
           getallbrand()
           {
               return this.$store.getters.getBrand
           }
           
          
           
        },
        mounted()
        {
            
             this.$store.dispatch("GetAllProduct")
             this.$store.dispatch("allcategory")
             this.$store.dispatch("GetAllBrand")
            
        },
        methods:
        {
          
        }
    }
</script>  
<style scoped>
 </style>    