<template>
    <div class="cart_component">
            <h3>Estimation du prix (hors livraison)</h3>
            <!-- <hr> -->
            <div class="carts_list_clothing">
                <strong>
                <!-- Voir la quantiter total -->
                
                    <p>Type de vêtement Total : {{cltQtyAll}}</p>

                        <div class="all_clothing_list">

                            <p class="all_price">Prix : {{allPrice}}f</p>
                            <ul class="clothing_list">
                                <li v-for="(cart, n) in cltInCarts" :key="cart.id">
                                    <!-- <div v-if="cart.qty > 0"> -->
                                        <!-- {{cart.product.prix}} -->
                                        <!-- {{cart.name}} -->
                                    {{priceClt(cart)}}f -  {{cart.product.name}} 
                                    <button class="btn_button" @click="increment(n)" type="button" > + </button>
                                        <input  type="text" class="qty_" v-model.number="cart.quantity" @input="changeProductQuantity({cart, n})"> 
                                    <button class="btn_button" @click="decrement(n)" type="button" > - </button>
                                    <a type="button" @click="removeOnCart(n)" ><i class="fa fa-remove"></i></a>
                                    <!-- </div> -->
                                        <!-- {{debugger}} -->
                                <!-- <button >Change</button> -->

                                </li>
                        </ul>
                        </div>
                </strong>

                <!-- <button @click="count" class="btn">Calculer</button> -->

                <p @click="clearCart" class="clear_cart">Vider le panier</p>
            </div>
            <!-- <hr> -->
            <br>
            <div v-if="!orderingCart">
                <button class="btn btn-desable">Choisissez un service</button>
            </div>
            <div v-if="orderingCart">
                <router-link to="/order-deliverable" class="btn" >Passer une commande</router-link>
            </div>
        <!-- <a href="#" class="btn">Passer la commande</a> -->
        </div>


</template>
<script>
import { mapActions, mapGetters, mapState } from 'vuex'
    // console.log(ctlInCarts)
    // console.log(priceClt(n))
export default {
    data(){
        return {
                orderingCart: false
            }
            
    },
    mounted(){
        var myCart = JSON.parse(localStorage.getItem('store')).carts
        if(myCart.allPrice != 0){
            this.orderingCart = true
            console.log('cart updated order true', myCart.carts.length)
        }else if(myCart.allPrice == 0){
            this.orderingCart = false
            console.log('cart updated order false', this.orderingCart)
        }
        myCart

    }
    ,
    updated(){
        // debugger
        var myCart = JSON.parse(localStorage.getItem('store')).carts
        if(myCart.allPrice != 0){
            this.orderingCart = true
            console.log('cart updated order true', myCart.carts.length)
        }else if(myCart.allPrice == 0){
            this.orderingCart = false
            console.log('cart updated order false', this.orderingCart)
        }
        myCart
    },
    // mounted(){
    //     if(this.myCart.allPrice != 0){
    //         this.orderingCart = true
    //     }else if(this.myCart.allPrice == 0){
    //         this.orderingCart = false
    //     }
    // },
    computed: {...mapGetters(
        'carts', ['priceClt', 'totalPrice','getAllCarts']
    ),
    ...mapState(
        'carts', ['allPrice']
    )},
    props: ['cltQtyAll','cltInCarts'],
    methods:{ ...mapActions(
        'carts', ['changeProductQuantity', 'removeOnCart', 'increment', 'decrement', ]
    ), clearCart(){
        localStorage.removeItem('store');
        location.reload()
    }
    }
}
</script>
<style lang="scss">
.clear_cart{
    width: 150px;
    margin: 0 auto;
    cursor: pointer;
    border: 1px solid #ffff;
    border-radius: 7px;
}
.btn-desable{
        background: rgb(138, 138, 138) !important;
    }

#app{
    min-height: 100%;
}
$orange: #D65047;
$orange-bold: #b8524b;
 .qty_{
     width: 20px;
     height: 23px;
 }
 .btn_button{
            display: inline-block;
            border: none;
            border-radius: 7px;
            padding: 5px 10px;
            margin: 0;
            text-decoration: none;
            background: $orange;
            color: #ffffff;
            font-family: sans-serif;
            font-size: 1rem;
            cursor: pointer;
            text-align: center;
            transition: background 250ms ease-in-out, 
            transform 150ms ease;
            -webkit-appearance: none;
            -moz-appearance: none;

            &:hover{
            background: $orange-bold;
            }
            
            &:focus {
                background: $orange-bold;
                outline: 1px solid #fff;
                outline-offset: -4px;
            }

            &:active {
                transform: scale(0.99);
            }
 }
 .all_price{
     padding-top: 5px;
 }
 .clothing_list{
     display: flex;
     flex-direction: column;
     align-items: flex-end;
     li{
         padding: 3px 0 !important;

     }
 }
 .carts_list_clothing{
    padding: 40px 20px;
    color: #fff;
    border-radius: 7px;
    background-color: #8C4452;

 }
 @media(max-width: 800px){
     .cart_component{
         grid-row: 1;
    
    }
     .all_clothing_list{
         display: grid;
        place-items: center;
         .clothing_list{
             
          padding-left: 0;
         li{
             //  margin: 0 auto;
             padding: 3px 0 !important;
         }
     }
}
 }
</style>