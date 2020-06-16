import Axios from "axios"

export default{
    state:{
        category:[],
        brand:[],
        product:[],
        blogpost:[],
    },
    getters:
    {
        getCategory(state)
        {
            return state.category
        },
        getBrand(state)
        {
            return state.brand
        },
        getProduct(state)
        {
            return state.product
        },
        getBlogpost(state)
        {
            return state.blogpost
        }
    },
    actions:
    {
        allcategory(context)
        {
            axios.get('/category')
            .then((response)=>{

                context.commit("categories",response.data.categories)
            })
        },
        GetAllBrand(context)
        {
            axios.get('/brand')
            .then((response)=>{
                context.commit("brands",response.data.brands)
            })
        },
        GetAllProduct(context)
        {
            axios.get('/product')
            .then((response)=>{
                context.commit("products",response.data.products)
            })
        },
        GetAllBlogpost(context)
        {
            axios.get('/blogpost')
            .then((response)=>{
                context.commit("blogposts",response.data.blogposts)
            })
        },
        //get product by id
        GetProductById(context,payload)
        {
            axios.get('/productbyid/'+payload)
            .then((response)=>{
                context.commit('productbycatid',response.data.products)
            })
        }
    },
    mutations:
    {
        categories(state,data)
        {
            return state.category=data
        },
        brands(state,data)
        {
            return state.brand=data
        },
        products(state,data)
        {
            return state.product=data
        },
        blogposts(state,data)
        {
            return state.blogpost=data
        },
          //get product by id
        productbycatid(state,data)
        {
            return state.product=data
        }

    }
}