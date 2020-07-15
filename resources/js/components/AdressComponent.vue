<template>
<div>
        <h2>Vos Coordonnees</h2>
        <google-maps/>
        <br>
        <div class="more_details">
            <label for="">Détails supplémentaires</label> <br>
            <input class="search_" v-model="other_details" type="text" placeholder="Etage, Code porte, Batiment,Quartier">
            <br>
            <label for="">Lieu</label> <br>
            <select class="lieu" name="lieu" @change="onChange($event)" id="">
                <option value="bureau">Bureau</option>
                <option value="domicile">Domicile</option>
            </select>
        </div>
        <br>
        <div class="button">
            <button class="btn" @click="addOtherAdress">Ajouter</button>
            <div class="router">
                <router-link to="/order-validate" class="btn">Continuer</router-link>
            </div>
        </div>
</div>
</template>

<script>
import MapsComponent from './MapsComponent'
export default {
    data(){
        return{
            other_details: '',
            lieu: '',
            allOtherAdress: ''
        }
    },
    mounted(){
        if(localStorage.getItem('allOtherAdress')){
            this.allOtherAdress = localStorage.getItem('allOtherAdress')
            console.log(localStorage.getItem('allOtherAdress'))
        }
    },
    components: {
        'GoogleMaps' : MapsComponent
    },
    methods:{
        onChange(event){
            this.lieu = event.target.value
        },
        addOtherAdress(){
            this.allOtherAdress= ({'lieu':this.lieu, 'other_adress': this.other_details})
            
            localStorage.setItem('allOtherAdress',JSON.stringify(this.allOtherAdress))
        }
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
    .button{
        display: flex;
        /* justify-content: center; */
    }
    .router{
        margin: 0 40px;
    }
</style>