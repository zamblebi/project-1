<template>
    <div class="global">
        <!-- <ul class="order-menu">
            <li v-if="carts"><router-link to="/order">Vetement</router-link></li>
            <li v-if="deliverableType"><router-link to="/order-deliverable">Livraison</router-link></li>
            <li v-if="dateChoose"><router-link to="/order-slots">Choix de date de recuperation</router-link></li>
            <li v-if="adressMaps"><router-link to="/order-maps">Adresse</router-link></li>
            <li v-if="deliverableType && dateChoose && adressMaps"><router-link to="/order-validate">Validation</router-link></li>
        </ul> -->
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: "GlobalOrderComponent.vue",
        data(){
            return{
                adressMaps: localStorage.adressMaps,
                allPrice: localStorage.totalPrice,
                deliverableType: localStorage.deliverableType,
                dateChoose: localStorage.dateStored,
                adress_details: localStorage.allOtherAdress,
                carts: localStorage.getItem('carts'),
            }
        }
        ,updated() {

        }
    }
</script>

<style lang="scss">
    .order-menu{
        display: flex;
        justify-content: center;
        li{
            padding: 0 20px;
            a{
                /*text-decoration: none;*/
                color: black;
            }
        }
    }
    .global{
        margin-bottom: 0px;
    }
</style>
