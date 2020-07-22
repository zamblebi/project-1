<template>
    <div>


            <h2 class="clothing-title">Choisir une quantiter</h2>
    <div class="order-clothing-list">
        <ul class="list-clothing">
                <li v-for="product in products" :key="product.id">
                <img v-bind:src="'/icons/'+product.icon+'.svg'" alt="">
                    <h3>
                        {{product.name}}
                    </h3>
                    <div>
                        <em>{{ product.prix }}f</em>
                        <br>
                        <strong>
                            <!-- <em>Quantiter : {{!empty($getSession->items[$clothing->id]['qty']) ? $getSession->items[$clothing->id]['qty'] : '0'}}</em> -->
                        </strong>
                    </div>
                    <br>

                     <!-- Le bouton pour ajouter un vetement a la cart -->
                        <button type="button" @click="addProductToCart(product)"  class="btn">Ajouter</button>

                </li>

        </ul>
        <cart-component :clt-qty-all="clothingQty" :clt-in-carts="carts" ></cart-component>
        
    </div>

    </div>
</template>


<script>
    import CartComponent from './CartComponent'
    import {mapState, mapActions, mapGetters} from 'vuex'

    export default{

        data: function(){
            return{
            } 
        },
        components: {
            'cart-component' : CartComponent
        },
        computed:{ 
            ...mapState({
                products : state => state.products.products,
                carts : state => state.carts.carts
            }),
            
            ...mapGetters(
                'carts', ['clothingQty']
            )},
        mounted(){
            // console.log(this.carts),
            this.$store.dispatch('products/getProducts')
        },
        methods: mapActions(
            'carts', ['addProductToCart']
        ) 

    }
</script>
<style lang="scss">
   
</style>