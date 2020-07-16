<template>
<div>
    <h1>Validation de la commande</h1>


     <strong><label>Adresse : </label></strong>{{JSON.parse(adressMaps).long_name}} | <router-link to="/order-maps">Modifier</router-link>
    <br>
    <strong>Prix total des article :  </strong> {{allPrice}} |  <router-link to="/order">Modifier</router-link>
    <br>
    <strong>Type de livraison choisie : {{deliverableType}}</strong>  | <router-link to="/order-deliverable">Modifier</router-link>
    <br>
    <strong>Date de recuperation : {{dateChoose}}</strong>  |   <router-link to="/order-slots">Modifier</router-link>
    <br>
    <strong>Details de l'adresses :</strong> Lieu => {{JSON.parse(adress_details).lieu}}, Details => {{JSON.parse(adress_details).other_adress}}

        <!-- <p>{{carts}}</p> -->
    <br>
    <h3 v-if="!user_id">Veillez vous connecter sinon votre commande ne sera pas valide</h3>
    {{user_id}}
    <!-- Post all -->


        <div v-if="user_id">
            <router-link class="btn" @click.native="orderStore" to="/order-success">
                <span  >Commender</span>
            </router-link>
        </div>

</div>
</template>
<script>
    import axios from 'axios';
export default {

    data(){
        return{
            adressMaps: localStorage.adressMaps,
            allPrice: localStorage.totalPrice,
            deliverableType: localStorage.deliverableType,
            dateChoose: localStorage.dateStored,
            adress_details: localStorage.allOtherAdress,
            carts: localStorage.getItem('carts'),
            user_id : '',
        }
    },
    mounted(){
        axios.get('/get-user').then(response => {
            this.user_id = response.data.id
            console.log(response.data)
            })
        .catch(error => console.log(error))

    },
    methods:{
        orderStore(){
            axios.post('/order/commander/',{
                user_id: this.user_id,
                carts: this.carts,
                adress_maps: this.adressMaps,
                adress_details: this.adress_details,
                deliverable_date: this.dateChoose,
                deliverable_type: this.deliverableType,
                all_prices: this.allPrice,
                deliver: false

            })
            .then(response => console.log(response))
            .catch(error => console.log(error))

            // localStorage.clear();
            // window.location.href = '/success-order'

        }
    }
}
</script>
<style lang="scss">

</style>
