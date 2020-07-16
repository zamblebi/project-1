<template>
    <div>
        <h2 class="date-title">Choisissez la date et l'heure de recuperation des vetements </h2>
        <h4>Date choisi: {{dateStored}}</h4>
        <VueCtkDateTimePicker locale="fr" :inline="true" color="green" button-now-translation="Maintenant" format="DD-MM-YYYY HH:mm" v-model="date" />

          <div class="add-date">
                <button class="btn" @click="addDate">Ajouter</button>
              <div style="padding: 0 60px">
                  <router-link class="btn" to="/order-maps">Continuer</router-link>
              </div>
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
            this.viewDate()
            },
        methods: {
            addDate(){
                localStorage.dateStored = this.date
                console.log(this.date)
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
