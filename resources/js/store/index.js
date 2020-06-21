import Axios from "axios"

export default{
    state:{
        category:[],
        brand:[],
        product:[],
        blogpost:[],
        singleproduct:[],
        cart:[],
        shipping:[],
      

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
        },
        getCart(state)
        {
            return state.cart
        },
        getShipping(state)
        {
            return state.shipping
        },
        
        
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
        },
        //get all cart list
        GetAllCart(context)
        {
            axios.get('/cart-list')
            .then((response)=>{
                context.commit('showcarts',response.data.content)
            })
        },
        GetShipping(context)
        {
            axios.get('/shipping-info')
            .then((response)=>{
                context.commit('shippings',response.data.customer)
            })
        },
      
        

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
        },
        //cart list
        showcarts(state,payload)
        {
            return state.cart=payload
        },
        shippings(state,payload)
        {
            return state.shipping=payload
        },
       
       
        
      

    }
}