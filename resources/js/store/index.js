import Axios from "axios"

export default{
    state:{
        category:[],
        brand:[],
        product:[],
        blogpost:[],
        singleproduct:[],
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
        },
        singleProduct(state)
        {
            return state.singleproduct
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
        //get product by catid
        GetProductByCatId(context,payload)
        {
            axios.get('/productbyid/'+payload)
            .then((response)=>{
                context.commit('productbycatid',response.data.products)
            })
        },
        GetProductByStatus(context)
        {
            axios.get('/productbystatus')
            .then((response)=>{
                context.commit('productbystatus',response.data.products)
            })
        },
        //product details by id
        GetProductById(context,payload)
        {
            axios.get('/product-details/'+payload)
            .then((response)=>{
                context.commit('single',response.data.products)
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
          //get product by catid
        productbycatid(state,data)
        {
            return state.product=data
        },
        //product by status
        productbystatus(state,data)
        {
            return state.product=data
        },
        //product details by id
        single(state,payload)
        {
            return state.singleproduct=payload
        }

    }
}