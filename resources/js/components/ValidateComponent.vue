<template>
<div>
    <h1>Validation de la commande</h1>
    <label>Adresse :</label>
    {{adressMaps}}
    <br>
    Prix total des article: {{allPrice}}
    <br>
    Type de livraison choisie: {{deliverableType}}
    <br>
    Date de recuperation: {{dateChoose}}
    <br>
    Details de l'adresses: Lieu => {{adress_details.lieu}}, Details => {{adress_details.other_adress}}
        <!-- <p>{{carts}}</p> -->
    <br>
    {{user_id}}
    <!-- Post all -->

    <form>
        <input type="hidden" name="adress_maps" :value="adressMaps">
        <input type="hidden" name="adress_details" :value="adress_details">
        <input type="hidden" name="all_prices" :value="allPrice">
        <input type="hidden" name="carts" :value="carts">
        <input type="hidden" name="deliverable_date" :value="dateChoose">
        <div>
            
        <button type="button" class="btn" @click="orderStore">Commender</button>

        </div>
    </form>

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
        axios.get('/order/commander/').then(response => {
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

            localStorage.clear();
            window.location.href = '/'

        }
    }
}
</script>
<style lang="scss">

</style>