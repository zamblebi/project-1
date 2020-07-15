<template>
<div>
    <h1>Validation de la commande</h1>
    <label>Adresse :</label>
    {{adress}}
    <br>
    Prix total des article: {{allPrice}}
    <br>
    Type de livraison choisie: {{deliverableType}}
    <br>
    Date de recuperation: {{dateChoose}}
    <br>
    Details de l'adresses: Lieu => {{adress_details.lieu}}, Details => {{adress_details.other_adress}}
    <br>
    <div>
        
     <button type="button" class="btn">Commender</button>

    </div>
</div>
</template>
<script>
export default {
    data(){
        return{
            adress: JSON.parse(localStorage.adressMaps).long_name,
            allPrice: localStorage.totalPrice,
            deliverableType: localStorage.deliverableType,
            dateChoose: localStorage.dateStored,
            adress_details: JSON.parse(localStorage.allOtherAdress),
        }
    },
    methods:{
        
    }
}
</script>
<style lang="scss">

</style>