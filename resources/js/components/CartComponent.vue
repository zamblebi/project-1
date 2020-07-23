<template>
    <div>
            <h3>Estimation du prix (hors livraison)</h3>
            <hr>
            <strong>
             <!-- Voir la quantiter total -->
                <p>Type de vetement Total : {{cltQtyAll}}</p>
                    <ul>
                    <p>Prix : {{allPrice}}f</p>
                        <li v-for="(cart, n) in cltInCarts" :key="cart.id">
                            <!-- <div v-if="cart.qty > 0"> -->
                                <!-- {{cart.product.prix}} -->
                                <!-- {{cart.name}} -->
                              {{priceClt(cart)}}f -  {{cart.product.name}} <button @click="increment(n)" type="button" > + </button> <input type="text" v-model.number="cart.quantity" @input="changeProductQuantity({cart, n})">  <button @click="decrement(n)" type="button" > - </button>
                                <a type="button" @click="removeOnCart(n)" ><i class="fa fa-remove"></i></a>
                            <!-- </div> -->
                            <!-- {{debugger}} -->
                        <!-- <button >Change</button> -->

                        </li>
                    </ul>
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

</style>