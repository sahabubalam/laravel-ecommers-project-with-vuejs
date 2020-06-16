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
//for frontend
import PublicHome from './components/frontend/PublicHome.vue'
import BlogPost from './components/frontend/blog/BlogPost.vue'
import Product from './components/frontend/product/Product.vue'





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
        component:EditProduct
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
        path:'/product/:id',
        component:Product
    }
   
    
    
    

];