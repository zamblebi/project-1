<template>
<div>

    <transition name="slide-fade">

    <div v-if="show">
        <div>
            
        <h2 class="date-title">Choisissez la date et l'heure de récupération des vêtements</h2>
        <h4 class="display_subtitle">Date choisi: {{dateStored}}</h4>
        <div class="date_time">
            <VueCtkDateTimePicker locale="fr" :inline="true" color="#D65047" minuteInterval="60" :disabled-hours="['00','01','02','03','04','05','06','07','19','20','21','22','23']"  button-now-translation="Maintenant" format="DD-MM-YYYY HH:mm" v-model="date" />
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
            show: false
        }

        },
        
        mounted(){
            this.show = true

            if(localStorage.dateStored){
                this.dateStored = localStorage.dateStored
                console.log('date', this.dateStored)
            }
            this.viewDate()
            },
        methods: {
            addDate(){
                if(this.dateStored && this.date == ''){
                    localStorage.dateStored = this.dateStored   
                }else{
                    localStorage.dateStored = this.date
                    console.log(this.date)
                }
                    this.viewDate();
            },
            viewDate(){
                if(localStorage.dateStored){
                    this.dateStored = localStorage.dateStored
                    console.log('date', this.dateStored)
                }
            }

        }
    }

</script>
<style lang="scss">
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