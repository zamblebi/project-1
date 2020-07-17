<template>
   <div>
       <h1>Modifier mon Profil</h1>
       Votre nom <input type="text" :value="user.lastName">
       <br>
       Votre prenom <input type="text" :value="user.firstName">
       <br>
       Votre email <input type="text" :value="user.email">
    </div>
</template>

<script>
    import axios from 'axios'
export default {
    data(){
        return{
            user: '',
        }
    },
    mounted() {
        axios.get('/get-user')
        .then(response => {
            this.user = response.data
        })
    }
}
</script>
