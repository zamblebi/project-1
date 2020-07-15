<template>
<div>
        <h2>Vos Coordonnees</h2>
        <google-maps/>
        <br>
        <div class="more_details">
            <label for="">Détails supplémentaires</label> <br>
            <input class="search_" type="text" placeholder="Etage, Code porte, Batiment,Quartier">
            <br>
            <label for="">Lieu</label> <br>
            <select class="lieu" name="" id="">
                <option value="bureau">Bureau</option>
                <option value="domicile">Domicile</option>
            </select>
        </div>
        <br>
        <button class="btn">Ajouter</button>
</div>
</template>

<script>
import MapsComponent from './MapsComponent'
export default {
    data(){
        return{

        }
    },
    components: {
        'GoogleMaps' : MapsComponent
    }
}
</script>

<style>
.lieu{
    width: 200px;
    height: 40px;
}
.more_details{
    display: flex;
    flex-direction: column;
}
.search_{
        width: 270px;
        height: 40px;
        border-radius: none;
        padding: 3px 10px;
        border: 1px solid #11111177;
    }
</style>