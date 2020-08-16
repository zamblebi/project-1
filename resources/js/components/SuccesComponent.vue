<template>
    <div class="success-order">
        <!-- <transition name="fade"> -->
            <img  :src="'/icons/check.svg'" alt="check">
        <!-- </transition> -->
        <br>
        <h4>Veillez patienter un moments votre commande est en cours de validation!</h4>
            <p>Vous serez redirigez vers votre profil</p>
            <br>
        <div class="loader"></div>
        <br>
        <!-- <router-link class="btn checked_ok" to="home/my-order-list">Continuer</router-link> -->
        <!-- <div class="loader"></div> -->
        <div class="space"></div>
    </div>
</template>

<script>
    export default {
        name: "SuccesComponent.vue",
        data(){
            return{
                show: false
                // img_src = ''
            }
        },
        mounted(){
            setTimeout(()=> {
                this.show = true

            },1000)
        }

    }
</script>

<style lang="scss">
.loader {
    margin: 0 auto;
  border: 7px solid #f3f3f3; /* Light grey */
  border-top: 7px solid #11AF22; /* Blue */
  border-radius: 50%;
  width: 40px;
  height: 40px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}


    .space{
        margin-bottom: 150px;
    }
    .success-order{
        margin-top: 50px;
        text-align: center;
        img{
            width: 200px;
            padding-bottom: 30px;
        }
    }
.fade-enter-active, .fade-leave-active {
transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
} 

@media(max-width: 800px){
    .checked_ok{
    display: flex;
    justify-content: center;
    width: 70%;
    margin: 0 auto;
    }
}
</style>
