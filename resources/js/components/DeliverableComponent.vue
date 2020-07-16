<template>
    <div>
        <div>

     <h1 class="delivery-title">Choisisssez un moyen de livraison</h1>
                        <h4>
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
                    <button type="button" @click="addDeliverable('Simple')" class="btn">Sélectionner</button>
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
                        <button type="button" @click="addDeliverable('Express')" class="btn">Sélectionner</button>
                    </div>
            </div>
        </div>

       </div>

         <div class="delivery-btn">
            <router-link to="/order-slots" class="btn">Continuer</router-link>
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
            console.log(localStorage.deliverableType, localStorage.getItem('carts'));
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
