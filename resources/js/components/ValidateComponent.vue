<template>
<div class="validation">
    <transition name="slide-fade">

    <div v-if="show" class="valide_">

    <h1>Validation de la commande</h1>


    <p>
        <strong><label>Adresse : </label></strong> <span class="reponse_">{{JSON.parse(adressMaps).long_name}}</span> | <router-link to="/order-maps"><i class="fa fa-edit"></i></router-link>
    </p>
    
    <p>
        <strong>Prix total des articles :  </strong> <span class="reponse_"> {{allPrice}}f</span> |  <router-link to="/order"><i class="fa fa-edit"></i></router-link>
    </p>

      <p>
        <strong>Type de livraison choisie : </strong> <span class="reponse_"> {{deliverableType}}</span> | <router-link to="/order-deliverable"><i class="fa fa-edit"></i></router-link>
      </p> 
    <p>
        <strong>Date de récupération et auraire: </strong> <span class="reponse_">{{dateOfRecuperation}} et entre {{JSON.parse(dateChoose).slot}} ( {{slotDeliverableHours ? ` Vous serez livrer le ${dateOfDeviverable} ` : 'Vous serez livrer dans 4h'}} )</span>  |   <router-link to="/order-slots"><i class="fa fa-edit"></i></router-link>
    </p>
    <p>
       <strong>Details de l'adresse :</strong> Lieu :<span class="reponse_">  {{details_lieu ? details_lieu : "Aucun"}} </span> , Details du lieu<span class="reponse_"> : {{details_adress ? details_adress : "Aucun"}}</span>
    </p>

    <br>

    <div v-if="!user_id || !carts || !allPrice || !deliverableType || !dateChoose" class="restriction-validation">

            <h4 v-if="!user_id">Merci de renseigner vos coordonnées pour la récupération et livraison de votre linge.

                <br>
                Déjà client ? <a href="/login" class="login-validation"> Connectez-vous</a>
            </h4>
        <!--    {{user_id}}-->
            <!-- Post al -->
            <span v-if="allPrice == 0">
                <h3>Veuillez calculer votre commande dans <router-link to="/order">Le panier</router-link></h3>
                    ou
                <h3>Aucun vêtement n'a été choisi</h3>
            </span>
            <h3 v-if="!deliverableType">Veillez Choisir un type de livraison</h3>
            <h3 v-if="!dateChoose">Veillez Choisir une date de récupération</h3>
            <!-- <div>
            <h3 v-if="!adress_details">Vous n'avez pas preciser les details sur le lieu choisi </h3>
                <p><router-link to="/order-maps">Voulez vous <i class="fa fa-edit"></i> ?</router-link></p>
            </div> -->
    </div>

    <br>
        <div class="commander_" v-if="user_id && carts && allPrice && deliverableType && dateChoose">
            <router-link class="btn commande_ok" @click.native="orderStore" to="/order-success">
                <span  >Commender</span>
            </router-link>
        </div>

    </div>
    </transition>
</div>
</template>
<script>
    import axios from 'axios';
export default {

    data(){
        return{
            show: false,
            adressMaps: localStorage.adressMaps,
            allPrice: JSON.parse(localStorage.getItem('store')).carts.allPrice,
            deliverableType: localStorage.deliverableType,
            dateChoose: JSON.stringify({"date" : localStorage.dateStored, "slot": localStorage.slotStored}),
            details_adress: localStorage.details_adress,
            details_lieu: localStorage.details_lieu,
            carts: JSON.parse(localStorage.getItem('store')).carts,
            user_id : '',
            slotDeliverableHours: false,
            dateOfDeviverable: '',
            dateOfRecuperation: ''
        }
    },
    created(){

        if(localStorage.deliverableType == 'Express'){
           this.allPrice *= 2
        }else if(localStorage.deliverableType == 'Standard'){
            if(this.allPrice > 5000){
                this.allPrice += 1000
            }
        }

        this.details_adress = localStorage.details_adress 
        this.details_lieu = localStorage.details_lieu 
    },
    
    mounted(){
        // option de changement d'ecriture de la date (variable declarer en global)
        var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }

        // Pour afficher la date de recuperation en format francais
        let recDate = new Date(localStorage.dateStored).toLocaleDateString('fr-FR', options)
        this.dateOfRecuperation = recDate


        if(this.deliverableType == "Standard"){
            this.slotDeliverableHours = true
            var gDate = localStorage.dateStored
            var dateH = new Date(gDate)
            dateH.setDate(dateH.getDate() + 2)
            this.dateOfDeviverable = dateH.toLocaleDateString("fr-FR", options)
        }


        this.show = true

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
            window.location.href= '/send'
        }
    }
}
</script>
<style lang="scss">

.restriction-validation{
    background-color: #E8E8E8;
    padding: 30px;
    color: #787A7B;
    border-radius: 7px;
}
.login-validation{
    text-decoration: none;
    color:#33B8EC;
}

.reponse_{
    color: #8C4452;
}
.valide_{
    .fa{
        color: #d65047;
    }
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 50px 10px;
    height: 100%;
}
.validation{
    display: grid;
    
    place-content: center;
    // flex-direction: column;
    // align-items: center;
    p{
        padding: 10px 0;
        text-align: left;
    }
}
.commander_{
    display: flex;
    justify-content: center;
}
@media(max-width: 800px){
    .commander_{
        width: 100%;
    }
    .commande_ok{
        display: flex;
        width: 70%;
        justify-content: center;
    }
}
</style>
