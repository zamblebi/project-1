<template>
    <div>
            <h3>Estimation du prix (hors livraison)</h3>
            <hr>
            <strong>
             <!-- Voir la quantiter total -->
             
                <p>Type de vetement Total : {{cltQtyAll}}</p>

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

                <button @click="count" class="btn">Calculer</button>

            <hr>
            <router-link to="/order-deliverable" class="btn" >Passer une commande</router-link>
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
            
            }
            
    },
    computed: {...mapGetters(
        'carts', ['priceClt', 'totalPrice','getAllCarts']
    ),
    ...mapState(
        'carts', ['allPrice']
    )},
    props: ['cltQtyAll','cltInCarts'],
    methods: mapActions(
        'carts', ['changeProductQuantity', 'removeOnCart', 'increment', 'decrement', 'count']
    )
}
</script>
<style lang="scss">
$orange: #D65047;
$orange-bold: #b8524b;
 .qty_{
     width: 20px;
     height: 23px;
 }
 .btn_button{
            display: inline-block;
            border: none;
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
 }
 @media(max-width: 800px){
     .all_clothing_list{
         display: grid;
        place-items: center;
         .clothing_list{
             
          padding-left: 0;
         li{
             //  margin: 0 auto;
             
             padding: 0 !important;
         }
     }
}
 }
</style>