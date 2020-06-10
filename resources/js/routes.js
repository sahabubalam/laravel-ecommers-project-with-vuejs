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
import AddBlogpost from './components/admin/blogpost/List.vue'
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
        path:'/add-blogpost',
        component:AddBlogpost
    }

];