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
        <!-- <div v-if="adress_details"> -->
            <strong>Details de l'adresses :</strong> Lieu => {{details_lieu ? details_lieu : "Aucun"}}, Details du lieu => {{details_adress ? details_adress : "Aucun"}}
        <!-- </div> -->

        <!-- <p>{{carts}}</p> -->
    <br>
    <h3 v-if="!user_id">Veillez vous connecter sinon votre commande ne sera pas valide</h3>
<!--    {{user_id}}-->
    <!-- Post al -->
    <span v-if="allPrice == 0">
        <h3 >Veillez calculer votre commande dans <router-link to="/order">Le panier</router-link></h3>
            ou
        <h3>Aucun vetement n'a ete choisi</h3>
    </span>
    <h3 v-if="!deliverableType">Veillez Choisir un type de livraison</h3>
    <h3 v-if="!dateChoose">Veillez Choisir une date de recuperation</h3>
    <!-- <div>
    <h3 v-if="!adress_details">Vous n'avez pas preciser les details sur le lieu choisi </h3>
        <p><router-link to="/order-maps">Voulez vous Modifier ?</router-link></p>
    </div> -->

    <br>
        <div v-if="user_id && carts && allPrice && deliverableType && dateChoose">
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
            allPrice: JSON.parse(localStorage.getItem('store')).carts.allPrice,
            deliverableType: localStorage.deliverableType,
            dateChoose: localStorage.dateStored,
            details_adress: localStorage.details_adress,
            details_lieu: localStorage.details_lieu,
            carts: JSON.parse(localStorage.getItem('store')).carts,
            user_id : '',
        }
    },
    created(){

        if(localStorage.deliverableType == 'Express'){
           this.allPrice *= 2
        }else if(localStorage.deliverableType == 'Simple'){
            if(this.allPrice > 5000){
                this.allPrice += 1000
            }
        }

        this.details_adress = localStorage.details_adress 
        this.details_lieu = localStorage.details_lieu 
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
                carts: JSON.stringify(this.carts),
                adress_maps: this.adressMaps,
                adress_details: JSON.stringify({details_lieu : this.details_lieu,details_adress: this.details_adress}),
                deliverable_date: this.dateChoose,
                deliverable_type: this.deliverableType,
                all_prices: this.allPrice,
                deliver: false

            })
            .then(response => console.log(response))
            .catch(error => console.log(error))

            localStorage.clear();
            // window.location.href = '/success-order'

        }
    }
}
</script>
<style lang="scss">

</style>
