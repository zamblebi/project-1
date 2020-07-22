<template>
    <div>
            <h3>Estimation du prix (hors livraison)</h3>
            <hr>
            <strong>
             <!-- Voir la quantiter total -->
                <p>Type de vetement Total : {{cltQtyAll}}</p>
                    <p>Prix : f</p>
                    <ul>
                        <li v-for="(cart, n) in cltInCarts" :key="cart.id">
                            <!-- <div v-if="cart.qty > 0"> -->
                                <!-- {{cart.product.prix}} -->
                                <!-- {{cart.name}} -->
                              {{cart.product.prix * cart.quantity != 0 ? cart.product.prix * cart.quantity : '' }}f -  {{cart.product.name}} <input type="number" v-model="cart.quantity">
                                <a type="button" ><i class="fa fa-remove"></i></a>
                            <!-- </div> -->
                            <!-- {{debugger}} -->
                        <button @click="changeProductQuantity({cart,n})">Change</button>

                        </li>
                    </ul>
            </strong>


            <hr>
            <router-link to="/order-deliverable" class="btn" >Passer une commande</router-link>
        <!-- <a href="#" class="btn">Passer la commande</a> -->
        </div>


</template>
<script>
import { mapActions } from 'vuex'
    // console.log(ctlInCarts)
export default {
    data(){
        return {

        }
    },
    props: ['cltQtyAll','cltInCarts'],
    methods: mapActions(
        'carts', ['changeProductQuantity']
    )
}
</script>
<style lang="scss">

</style>