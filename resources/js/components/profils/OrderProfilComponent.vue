<template>
   <div>
       <h1>Mes Commandes : </h1>
       <ul class="all_orders">
            <li v-for="(order, n) in my_order" :key="n">
                <h4>
                    Vetements et Quantiter:
                    {{order.carts.carts}}
                </h4>
                <div v-for="(cart, n) in JSON.parse(order.carts).carts" :key="n">

                    Nom du vetement : {{cart.product.name}}
                    <p> <em>Prix de lavage du Vetement: {{cart.price}}</em></p>
                    <p> <strong>Quantiter :</strong>  {{cart.quantity}}</p>
                    <br>
                </div>
                <br>
                <p> <strong> Prix total de la commande : </strong>{{order.all_prices}} f</p>
<!--                <p>Mon adresse de livraison et de recuperation : {{JSON.parse(order.adress_maps).long_name}}</p>-->
               <p> <strong>Type de livraison :</strong> {{order.deliverable_type}}</p>
               <p> <strong>Date de livraison :</strong>{{order.deliverable_date}}</p>
               <hr>

<!--           </div>-->
            </li>
       </ul>
   </div>
</template>


<script>
    import axios from 'axios';

    export default {
        data(){
            return{

                user: '',
                my_order: ''
            }
        },
        mounted() {
            axios.get('/get-user')
                .then(response => {
                    this.user = response.data.id
                    console.log('la reponse est : ' + this.user)
                })
                .catch(error => console.log(error))

            // get user
            // get order
            axios.get("/get-user-order")
                .then(response => {
                    this.my_order = response.data
                    console.log(response.data)
                })
                .catch(error => console.log(error, this.user));
        }
    }
</script>
<style lang="scss">
    .all_orders{
        p{
            text-align: left;
        }
    }
</style>
