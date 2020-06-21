//For admin
import AdminHome from './components/admin/AdminMaster.vue'
import CategoryList from './components/admin/category/List.vue'
import AddCategory from './components/admin/category/New.vue'
import EditCategory from './components/admin/category/Edit.vue'

//brand

import BrandList from './components/admin/brand/List.vue'
import AddBrand from './components/admin/brand/New.vue'
import EditBrand from './components/admin/brand/Edit.vue'
//product
import ProductList from './components/admin/product/List.vue'
import AddProduct from './components/admin/product/New.vue'
import EditProduct from './components/admin/product/Edit.vue'
//blogpost
import BlogpostList from './components/admin/blogpost/List.vue'
import AddBlogpost from './components/admin/blogpost/New.vue'
import EditBlogpost from './components/admin/blogpost/Edit.vue'
//for frontend work
import PublicHome from './components/frontend/PublicHome.vue'
import BlogPost from './components/frontend/blog/BlogPost.vue'
import Product from './components/frontend/product/Product.vue'
import ShopDetails from './components/frontend/shopdetails/ShopDetails.vue'
//customer
import Login from './components/frontend/customer/Login.vue'
import Register from './components/frontend/customer/Registration.vue'
import CartDetails from './components/frontend/cart/CartDetails.vue'

import ShippingCart from './components/frontend/cart/Shipping.vue'
import Payment from './components/frontend/cart/Payment.vue'





export const routes=[
    {
        path:'/home',
        component:AdminHome
    },
    {
        path:'/category-list',
        component:CategoryList
    },
    {
        path:'/add-category',
        component:AddCategory
    },
    {
        path:'/edit-category/:id',
        component:EditCategory
    },

    //brand
    {
        path:'/brand-list',
        component:BrandList
    },
    {
        path:'/add-brand',
        component:AddBrand
    },
    {
        path:'/edit-brand/:id',
        component:EditBrand
    },
    //product
    {
        path:'/product-list',
        component:ProductList
    },
    {
        path:'/add-product',
        component:AddProduct
    },
    {
        path:'/edit-product/:id',
        component:ShippingCart
    },
    //blogpost
    {
        path:'/blogpost-list',
        component:BlogpostList
    },
    {
        path:'/add-blogpost',
        component:AddBlogpost
    },
    {
        path:'/edit-blogpost/:id',
        component:EditBlogpost
    },
    //public home
    {
        path:'/',
        component:PublicHome
    },
    {
        path:'/blog',
        component:BlogPost
    },
    {
        path:'/product-category/:id',
        component:Product
    },
    {
        path:'/shop-details/:id',
        component:ShopDetails
    },
    {
        path:'/login',
        component:Login
    },
    {
        path:'/register',
        component:Register
    },
    {
        path:'/cart-details',
        component:CartDetails
    },
   
    {
        path:'/shipping-cart',
        component:ShippingCart
    },
    {
        path:'/payment',
        component:Payment
    },

   
    
    
    

];