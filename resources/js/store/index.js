import Axios from "axios"

export default{
    state:{
        category:[],
        brand:[],
        product:[],
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
        }
    }
}