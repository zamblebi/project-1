<template>
   <div>
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
            // lastName: user.lastName,
            // firstName: '',
            // email: '',
            // phone_number: '',
        }
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
            .then(response => console.log(response))
            .catch(error => console.log(error))
        }
    }
}
</script>
