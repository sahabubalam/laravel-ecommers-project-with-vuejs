<template>
    <span>
    <div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="card">
            <div class="card-header mb-3 text-center text-warning">
                Dear <strong class="text-dark">{{session.name}}</strong>
                .You have to give us product shipping info to complete your valuable
                order.If your billing info are samethen just press on Order confirm button.
            </div>
           </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto mb-5">
            <form>
           
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Cash on delevery</label>
                        </th>
                        <td>
                            <div class="form-check">
                            <input class="form-check-input" name="payment_type"  type="radio" value="cash">
                            <label>Cash on Delevery</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Paypal</label>
                        </th>
                        <td>
                            <div class="form-check">
                            <input class="form-check-input" name="payment_type"  type="radio" value="paypal">
                            <label>Paypal</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Bkash</label>
                        </th>
                        <td>
                            <div class="form-check">
                            <input class="form-check-input" name="payment_type"  type="radio" value="bkash">
                            <label>Bkash</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="#" class="btn btn-warning">Shipping Edit</a></td>
                        <td><input class="btn btn-success" type="submit" name="btn" value="Confirm order"></td>
                    
                    </tr>
                
                </table>
            </form>

        </div>
    </div>    
</div>
    
    </span>
</template>

<script>
    export default{
        name:"New",
       
        mounted()
        {
             this.$store.dispatch("GetShipping")
        },
       
        computed:
        {
          session()
          {
               return this.$store.getters.getShipping
          }
        },
        methods:
        {
            
           
           
        }
    }
</script>
<style scoped>
 </style>