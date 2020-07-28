<template>

    <transition name="slide-fade">
    <!-- <p v-if="show">hello</p> -->

   <div v-if="show" class="my_order_list_all">

       <h1 class="my_title_order">Mes Commandes : </h1>
       <ul class="all_orders">
                <div v-for="(order, n) in my_order" :key="n" >
            <li v-if="order.deliver == 0">
                <h4 >
                    Vêtements et Quantiter:
                    <!-- {{order.carts.carts}} -->
                </h4>
                <div v-for="(cart, n) in JSON.parse(order.carts).carts" :key="n">

                    Nom du vêtement: {{cart.product.name}}
                    <p> <em>Prix du service: {{cart.price}}</em></p>
                    <p> <strong>Quantités :</strong>  {{cart.quantity}}</p>
                    <br>
                </div>
                <br>
                <p> <strong> Prix total de la commande : </strong>{{order.all_prices}} f</p>
<!--                <p>Mon adresse de livraison et de recuperation : {{JSON.parse(order.adress_maps).long_name}}</p>-->
               <p> <strong>Type de livraison :</strong> {{order.deliverable_type}} {{order.deliverable_type == 'Simple' ? " | delais d'attente 48 heures " : " | delais d'attente 4 heures "}}</p>
               <p> <strong>Date et heure de recuperation : </strong>{{order.deliverable_date}}</p>
               <p> <strong>Lieu de récupération :</strong>{{JSON.parse(order.adress_details).details_lieu}}</p>
               <hr>

<!--           </div>-->
            </li>
       </div>
       </ul>
   </div>
  </transition>
</template>


<script>
    import axios from 'axios';

    export default {
        data(){
            return{
                user: '',
                my_order: '',
                show: false
            }
        },
        mounted() {
            this.show = true,
            axios.get('/get-user')
                .then(response => {
                    this.user = response.data.id
                    // console.log('la reponse est : ' + this.user)
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
    .my_title_order{
        text-align: center;
    }
    .all_orders{
        padding-left: 0;
        li{
            margin: 15px 10px;
            padding: 5px 10px;
            border-radius: 7px;
            background-color: #1c2d3417;
        }
        p{

            text-align: left;
        }
    }
    /* Enter and leave animations can use different */
/* durations and timing functions.              */
.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}
</style>
