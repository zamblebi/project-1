<template>
    <div>
        <div>

     <h1 class="delivery-title">Choisisssez un moyen de livraison</h1>
                        <h4 class="display_subtitle">
                            Type de livraison choisie : {{deliverableType}}
                        </h4>

        <div class="container-deliverys">
            <div class="simple">



                <div class="delivery">
                    <h3>Simple</h3>
                    <img class="icon-delivery" src="/icons/delivery.svg" alt="">
                    <div class="small-datails">
                        <strong>
                            <em>Votre vetement sera livrer 48h apres recuperation</em>
                        </strong>
                    </div>
                    <div class="frais">
                            <span v-if="deliverablePrices.simple == 'Gratuit' ">
                                <h4>Frais de transport Gratuit</h4>
                            </span>
                            <span v-if="deliverablePrices.simple != 'Gratuit'" class="simple_del">
                                 <h4 >Frais de transport : </h4> <em> {{deliverablePrices.simple}} f </em>
                            </span>

                    </div>
                    <router-link to="/order-slots" @click.native="addDeliverable('Simple')" class="btn">Sélectionner</router-link>
                </div>
                </div>
                <div class="express">
                    <div class="delivery">
                        <h3>Express</h3>
                        <img class="icon-delivery" src="/icons/express-delivery.svg" alt="">
                        <div class="small-datails">
                            <strong>
                                <em>Votre vetement sera livrer 4h apres recuperation</em>
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

        </div>

</template>

<script>

export default {
    data(){
        return{
            deliverablePrices : {
                simple : 'Gratuit',
                express: 5000
            },
            deliverableType: '',
            // typeD : ''
        }
    },
    mounted(){
        this.viewDeliverable()
        if(localStorage.getItem('store')){
            if(JSON.parse(localStorage.getItem('store')).carts.allPrice > 5000){
                this.deliverablePrices.simple = 1000 
            }
            this.deliverablePrices.express = JSON.parse(localStorage.getItem('store')).carts.allPrice
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
.simple_del{
    display: flex;
}
</style>