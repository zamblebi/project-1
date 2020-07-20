<template>
   <div>
       <form>

        <h1>Modifier votre mot de passe</h1>
        <label for="">Mot de passe actuel</label>
        <input type="password" name="current_password" v-model="current_password">
        <br>
        <label for="">Nouveau mot de passe</label>
        <input type="password" v-model="new_password" name="password" id="">
        <br>
        <label for="">Confirmer votre mot de passe</label>
        <input type="password" v-model="new_confirm_password" name="password" id="">
        <br>
        <button type="submit" @click="changePassword" class="btn">Modifier</button>
       </form>
    </div> 
</template>

<script>
import axios from 'axios'

export default {
    data(){
        return {
            current_password: '',
            new_password : '',
            new_confirm_password: ''
        }
    },
    mounted(){
        },
    methods: {
        changePassword(){
            axios.post('/change-password', {
                current_password: this.current_password,
                new_password: this.new_password,
                new_confirm_password: this.new_confirm_password,
            })
            .then(response => console.log(response))
            .catch(error => console.log(error))
        }
    }

    
}
</script>
<style lang="scss">

// form{
//     text-align: center;
//     display: flex;
//     flex-direction: column;
//     width: 400px;
//     margin: 0 auto;
// }

</style>