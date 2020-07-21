<template>
    <div>
            <h3>Estimation du prix (hors livraison)</h3>
            <hr>
            <strong>
             <!-- Voir la quantiter total -->
                <p>Type de vetement Total : {{cltQtyAll}}</p>
                    <p>Prix : f</p>
                    <ul>
                        <li >
                            <!-- <div v-if="cart.qty > 0"> -->
                              <!-- {{cart.price * cart.qty != 0 ? cart.price * cart.qty : '' }}f -  {{cart.name}} <input type="number" v-model="augQty"> -->
                                <a type="button" ><i class="fa fa-remove"></i></a>
                            <!-- </div> -->

                        </li>
                    </ul>
            </strong>

            <hr>
            <router-link to="/order-deliverable" class="btn" @click="saveQty()">Passer une commande</router-link>
        <!-- <a href="#" class="btn">Passer la commande</a> -->
        </div>


</template>
<script>
export default {
    data(){
        return {

        }
    },
    props: ['cltQtyAll']
}
</script>
<style lang="scss">

</style>