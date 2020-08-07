<template>
    <div>
        <router-link v-if="deliverableType" to="/order-deliverable">Livraison</router-link>
        <transition name="slide-fade">

        <div v-if="show">

     <h1 class="delivery-title">Choisissez un moyen de livraison</h1>
                        <h4 class="display_subtitle">
                            Type de livraison choisie : {{deliverableType}}
                        </h4>

        <div class="container-deliverys">
            <div class="standard">



                <div class="delivery">
                    <h3>Standard</h3>
                    <img class="icon-delivery" src="/icons/delivery.svg" alt="">
                    <div class="small-datails">
                        <strong>
                            <em>Vos vêtements serons livrées 48h après récupération</em>
                        </strong>
                    </div>
                    <div class="frais">
                            <span v-if="deliverablePrices.standard == 'Gratuit' ">
                                <h4>Frais de transport Gratuit</h4>
                            </span>
                            <span v-if="deliverablePrices.standard != 'Gratuit'" class="standard_del">
                                 <h4 >Frais de transport :  </h4> <em> {{deliverablePrices.standard}} f </em>
                            </span>

                    </div>
                    <router-link to="/order-slots" @click.native="addDeliverable('Standard')" class="btn">Sélectionner</router-link>
                </div>
                </div>
                <div class="express">
                    <div class="delivery">
                        <h3>Express</h3>
                        <img class="icon-delivery" src="/icons/express-delivery.svg" alt="">
                        <div class="small-datails">
                            <strong>
                                <em>Vos vêtements serons livrées 4h après récupération</em>
                            </strong>
                        </div>
                        <div class="frais">
                            
                            <em> {{deliverablePrices.express}}f x 2 </em>
                        </div>
                        <router-link to="/order-slots" @click.native="addDeliverable('Express')" class="btn">Sélectionner</router-link>
                    </div>
            </div>
        </div>

       </div>
    </transition>

        </div>

</template>

<script>
import Noty from 'noty'

export default {
    data(){
        return{
            deliverablePrices : {
                standard : 'Gratuit',
                express: 5000
            },
            deliverableType: '',
            show: false,
            deliverableType: localStorage.deliverableType,
            // typeD : ''
        }
    },
    mounted(){
        
        this.show = true
        this.viewDeliverable()
        if(localStorage.getItem('store')){
            if(JSON.parse(localStorage.getItem('store')).carts.allPrice < 5000){
                this.deliverablePrices.standard = 1000 
                new Noty({
                    // theme: 'metroui',
                    type: 'error',
                    text: "Votre commande est en dessous de 5000f alors la livraison Standard sera à 1000f", 
                    layout: 'topRight',
                    timeout: 3500,
                }).show();
            }
            this.deliverablePrices.express = JSON.parse(localStorage.getItem('store')).carts.allPrice

            //notification
            if(JSON.parse(localStorage.getItem('store')).carts.allPrice > 5000){
                new Noty({
                   type: 'success',
                   text: "La livraison Standard sera gratuite !", 
                   layout: 'topRight',
                   timeout: 3500,
               }).show();
            }

        }
    },
    methods: {
        addDeliverable(type){
            localStorage.deliverableType = type
            console.log(localStorage.deliverableType);
            this.deliverableType = localStorage.deliverableType
        },
        storedDeliverable(){
            localStorage.deliverableType = this.deliverableType
            this.viewDeliverable()

        },
        viewDeliverable(){
            if(localStorage.deliverableType){
                this.deliverableType = localStorage.deliverableType
                console.log(this.deliverableType)
            }
        }
    }
}
</script>

<style lang="scss">
.display_subtitle{
    text-align: center;
    margin-top: 0;
    padding-bottom: 20px ;
    
}
.delivery-title{
    margin: 0;
}
.standard_del{
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>