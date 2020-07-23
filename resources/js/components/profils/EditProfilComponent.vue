<template>
   <div>
           <transition name="fade">
       <p v-if="show" style="color: green"  v-on:click="show = !show">
           Modification reussi
       </p>
           </transition>
       <form>
            <h1>Modifier mon Profil</h1>
            Votre nom <input type="text" v-model="user.lastName">
            <br>
            Votre prenom <input type="text" v-model="user.firstName">
            <br>
            Votre email <input type="text" v-model="user.email">
            <br>
            Votre numero de telephone <input type="text" v-model="user.phone_number">
            <br>
            <button class="btn" @click.prevent="editProfil">Modifier</button>
       </form>
    </div>
</template>

<script>
    import axios from 'axios'
export default {
    data(){
        return{
            user: '',
            show: false
            // lastName: user.lastName,
            // firstName: '',
            // email: '',
            // phone_number: '',
        }
    },
    updated(){
        setTimeout(()=> {
            this.show = false
        }, 3000)
    },
    mounted() {
        axios.get('/get-user')
        .then(response => {
            this.user = response.data
        })
    }
    ,methods: {
        editProfil(){
            axios.post(`/update/${this.user.id}`, {
                lastName: this.user.lastName,
                firstName: this.user.firstName,
                email: this.user.email,
                phone_number: this.user.phone_number,
            })
            .then(response => this.show = true)
            .catch(error => console.log(error))
        }
    }
}
</script>

<style lang="scss">
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>