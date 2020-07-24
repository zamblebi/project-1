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

                        <h4>Frais de transport : </h4> <em> {{deliverablePrices.simple}} f </em>

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
                            <h4>Frais de transport : </h4> <em> {{deliverablePrices.express}} f </em>
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
                simple : 1000,
                express: 5000
            },
            deliverableType: '',
            // typeD : ''
        }
    },
    mounted(){
        this.viewDeliverable()
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
</style>