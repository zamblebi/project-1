<template>
<div>

    <transition name="slide-fade">

    <div v-if="show">
        <div>
            
        <h2 class="date-title">Choisissez la date et l'heure de récupération des vêtements</h2>
        <h4 class="display_subtitle" v-if="dateStored">Date et crénaux choisi : {{ dateStored }} et {{ slotStored }}</h4>
        <div class="date_time">
            <VueCtkDateTimePicker locale="fr" :inline="true" color="#D65047" inputSize="lg" :noTime=true  button-now-translation="Maintenant" :noButtonNow=true format="YYYY-MM-DD" :noLabel=true  formatted="ll" :onlyDate=true v-model="date">
            </VueCtkDateTimePicker>
        </div>

        <div class="horaire">
            <ul >
                   <li v-for="(h, i) in horaire" :key="i">
                    
                       <label :for="i" class="btn btn-slot" >{{h}}</label>
                     <input type="radio" :value="h" v-model="slot" :id="i" />
                       
                   </li> 
            </ul>
        </div>

          <div class="add-date">
                <router-link to="/order-maps" class="btn" @click.native="addDate">Continuer</router-link>
          </div>
        </div>
    </div>
</transition>
</div>

</template>

<script>

export default {
    data(){
        return{
            date : '',
            show: false,
            dateStored: '',
            slotStored: '',
            horaire: [
                "8h-10h","10h-12h","13-15h","15h-17h"
            ],
            value: '',
            slot: '',
            value: ''
            // slotChoose: false,
        }

        },
        
        mounted(){
                this.show = true

                // this.slot
                // afficher la date choisie si il est dans le localstorage 
                if(localStorage.dateStored){
                    this.dateStored = localStorage.dateStored
                }

                // afficher l'horaire choisie si il est dans le localstorage 
                if(localStorage.slotStored){
                    this.slot = localStorage.slotStored

                }

                // Voir ce qui et dans le localstorage 
                this.viewDate()

            },
            updated(){
                // debugger
                this.slotStored = localStorage.slotStored
                console.log(this.slot)
            },

        methods: {
            // Ajouter la date dans le localStorage 
            addDate(){
                if(this.dateStored && this.date == ''){
                    localStorage.dateStored = this.dateStored
                    localStorage.slotStored = this.slotStored
                    localStorage.slotStored = this.slot
                }
                else{
                    localStorage.dateStored = this.date
                }
                    this.viewDate();
            },
        // Afficher les element depuis le localStorage 
            viewDate(){
                if(localStorage.dateStored){
                    this.dateStored = localStorage.dateStored
                    console.log('date', this.dateStored)
                }
                if(localStorage.slotStored){
                    this.slotStored = localStorage.slotStored
                    console.log(this.slotStored)
                }
            },

            // Recuperer l'horaire  
            // getSlot(slot){
                // debugger
                // if(this.slotStored && this.slot == ''){
                    // localStorage.dateStored = this.dateStored
                    // console.log(slot)
                // }
                // else{
                    // debugger
                // }
                    // console.log(slot)
            // }

        }
    }

</script>
<style lang="scss">

// .active{
//     background: red;
// }

.display_subtitle{
    color: #D65047;
}

// Horaire style 
.horaire{
    ul{
        padding-left: 0;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        li{
            padding: 10px 20px;
            input:checked + label {
                    background-color: red !important;
                    color: red !important;
                    box-shadow: red !important;
                    border-color: red !important;
                    z-index: 1;
                }
        }
    }
    .btn-slot{
        border: 1px solid #D65047;
        background:#EFEFEF;
        color: black;
        &:hover{
        background:#9b9b9b;
        color: #ffff;
        }
    }

}
// Horaire style End 







.date-title{
    text-align: center;
}
@media(max-width: 800px){
    .date_time{
        margin: 0 30px;
    }
}
/* Enter and leave animations can use different */
/* durations and timing functions.              */
// .slide-fade-enter-active {
//   transition: all .3s ease;
// }
// .slide-fade-leave-active {
//   transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
// }
// .slide-fade-enter, .slide-fade-leave-to
// /* .slide-fade-leave-active below version 2.1.8 */ {
//   transform: translateX(10px);
//   opacity: 0;
// }

.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>