<template>
<div>

    <transition name="slide-fade">

    <div v-if="show">
        <div>
            
        <h2 class="date-title">Choisissez la date et l'heure de récupération des vêtements</h2>
        <h4 class="display_subtitle">Date et crénaux choisi : {{ dateStored }}</h4>
        <div class="date_time">
            <VueCtkDateTimePicker locale="fr" :inline="true" color="#D65047" inputSize="lg" :noTime=true  button-now-translation="Maintenant" :noButtonNow=true format="DD-MM-YYYY" :noLabel=true  formatted="ll" :onlyDate=true v-model="date">
                <!-- <input type="text" /> -->
            </VueCtkDateTimePicker>
        </div>

        <div class="horaire">
            <ul>
               <li v-for="(h, i) in horaire" :key="i" >
                   <button @click="getSlot(h)" class="btn btn-slot" :value=h >{{h}}</button>
                   </li> 
            </ul>
        </div>

          <div class="add-date">
                <router-link to="/order-maps" class="btn" @click.native="addDate">Continuer</router-link>
              <!-- <div style="padding: 0 60px">
                  <router-link class="btn" to="/order-maps">Continuer</router-link>
              </div> -->
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
            dateStored: '',
            show: false,
            horaire: [
                "8h-10h","10h-12h","13-15h","13h-15h","15h-17h"
            ],
            value: '',
            slot: ''
        }

        },
        
        mounted(){
            this.show = true

            if(localStorage.dateStored){
                this.dateStored = localStorage.dateStored
                // console.log('date', this.dateStored)
            }
            this.viewDate()
            },
        methods: {
            addDate(){
                if(this.dateStored && this.date == ''){
                    localStorage.dateStored = this.dateStored
                    // localStorage.slot = this.slot 
                }else{
                    localStorage.dateStored = [this.date, this.slot]
                    console.log(this.date)
                }
                    this.viewDate();
            },
            viewDate(){
                if(localStorage.dateStored){
                    this.dateStored = localStorage.dateStored
                    console.log('date', this.dateStored)
                }
            },
            getSlot(slot){
                this.slot = slot
                console.log(slot)
            }

        }
    }

</script>
<style lang="scss">

// Horaire style 
.horaire{
    ul{
        padding-left: 0;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        li{
            padding: 10px 20px;
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