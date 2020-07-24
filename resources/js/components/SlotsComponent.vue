<template>
    <div>
        <h2 class="date-title">Choisissez la date et l'heure de recuperation des vetements </h2>
        <h4 class="display_subtitle">Date choisi: {{dateStored}}</h4>
        <div class="date_time">
            <VueCtkDateTimePicker locale="fr" :inline="true" color="#D65047" minuteInterval="30" :disabled-hours="['00','01','02','03','04','05','06','07','19','20','21','22','23']"  button-now-translation="Maintenant" format="DD-MM-YYYY HH:mm" v-model="date" />
        </div>

          <div class="add-date">
                <router-link to="/order-maps" class="btn" @click.native="addDate">Continuer</router-link>
              <!-- <div style="padding: 0 60px">
                  <router-link class="btn" to="/order-maps">Continuer</router-link>
              </div> -->
          </div>
    </div>

</template>

<script>

export default {
    data(){
        return{
            date : '',
            dateStored: ''
        }

        },
        
        mounted(){
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
</style>