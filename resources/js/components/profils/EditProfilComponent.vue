<template>
   <div>
           <transition name="fade">
       <p v-if="show" style="color: green"  v-on:click="show = !show">
           Modification réussie
       </p>
           </transition>
    <transition name="slide-fade">
        <div v-if="showUp">

            <h1 class="title_edit_profil">Modifier mes informations </h1>
            
       <form  class="edit_profil">
            <div>
                <label for="">Votre nom </label>
                <!-- <br> -->
                <div>
                    <input type="text" v-model="user.lastName">
                </div>
            </div>

            <div>
                <br>
                <label for="">Votre prénom </label>

                <!-- <br> -->
                <div>
                    <input type="text" v-model="user.firstName">
                </div>
            </div>

            <div>
                <br>
                <label for="">Votre email </label>
                <!-- <br> -->
                <div>
                    <input type="text" v-model="user.email">
                </div>
            </div>

            <div>
                <br>
                <label for="">Votre numéro de téléphone </label>
                <!-- <br> -->
                <div>
                    <input type="text" v-model="user.phone_number">
                </div>
            </div>
            <br>
            <button class="btn" @click.prevent="editProfil">Modifier</button>
       </form>
        </div>
    </transition>
    </div>
</template>

<script>
    import axios from 'axios'
export default {
    data(){
        return{
            user: '',
            show: false,
            showUp: false
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
        this.showUp = true,
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
.title_edit_profil{
    text-align: center;
}


.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
.edit_profil{
    display: grid;
    width: 100%;
    grid-auto-columns: 1fr 1fr;
    // grid-auto-row.#1c2d3417s: 1fr 1fr;
        place-items: center;
    // display: flex;
    // flex-direction: column;
    // justify-content: center;
    // align-items: center;
    input[type=text], input[type=email],input[type=password]{
        // margin: 0 auto;
                width: 270px;
                height: 30px;
                border-radius: none;
                padding: 3px 10px;
                border: 1px solid #11111177;
                margin: 20px 0;
            }

}
</style>