<template>
<div>
        <h2 class="adress_title">Vos Coordonnees</h2>
        <google-maps/>
        <br>
        <div class="adress_recup" v-if="adress">
           
        </div>
        <br>
        <div class="more_details">
            <div>
                <label for="">Détails supplémentaires</label> <br>
                <input class="search_"  v-model="details_adress"  type="text" placeholder="Etage, Code porte, Batiment,Quartier" @input="addOtherAdress">
            </div>

            <br>
            <div>
                <label for="">Lieu</label> <br>
                <label for="domiciel">Domicile</label>
               <input type="radio" id="domicile" value="Domicile" v-model="details_lieu" @change="addLieu">
                <label for="bureau">Bureau</label>
                <input type="radio" id="bureau" value="Bureau" v-model="details_lieu" @change="addLieu">
                
            </div>
        </div>
        <br>
        <div class="button">
            
            <div class="router" >
                <router-link to="/order-validate" class="btn" >Continuer</router-link>
            </div>
        </div>
</div>
</template>

<script>
import MapsComponent from './MapsComponent'
export default {
    data(){
        return{
            details_adress: '',
            details_lieu: '',
            other_details: '',
            // checkedLieu: '',
            adress: localStorage.adress,
            selected: "Domicile",
            options: [
                {lieu : 'Aucun', value: 'pas choisi' },
                {lieu : 'Domicile', value: 'Domicile' },
                {lieu : 'Bureau', value: 'Bureau' },
            ]
        }
    },updated(){
        if(localStorage.details_adress){
              localStorage.details_adress = this.details_adress
            // this.details_lieu = localStorage.details_lieu
            // console.log(localStorage.getItem('allOtherAdress'))
        }
        if(localStorage.details_lieu){
              localStorage.details_lieu = this.details_lieu
        }
    },
    mounted(){
        
        if(localStorage.adressMaps){
            this.adress = localStorage.adressMaps
            // console.log(JSON.parse(this.adress).long_name)
        }
        if(localStorage.details_adress){
            this.details_adress = localStorage.details_adress
            // this.details_lieu = localStorage.details_lieu
            // console.log(localStorage.getItem('allOtherAdress'))
        }
        if(localStorage.details_lieu){
            this.details_lieu = localStorage.details_lieu
        }
    },
    
    components: {
        'GoogleMaps' : MapsComponent
    },
    methods:{
        onChange(event){
            this.lieu = event.target.value
        },
        addLieu(){
          return  localStorage.details_lieu = this.details_lieu
        },
        addOtherAdress(){
           return   localStorage.details_adress = this.details_adress 

        }
    }
}
</script>

<style lang="scss">
.adress_recup{
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
}
.lieu{
    width: 200px;
    height: 50px;
}
.more_details{
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 30px 0;
    div{
        padding: 0 40px;
    }
    // flex-direction: column;
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
         justify-content: center; 
    }
    // .router{
    //     margin: 0 40px;
    // }
    .adress_title{
        text-align: center;
    }
    @media(max-width: 700px){
        
        .more_details{
            text-align: center;
            flex-direction: column;
            .lieu{
                width: 300px;
            }
        }
    }
</style>
