<template>
    <div class="success-order">
        <transition name="fade">
            <img  :src="'/icons/check.svg'" alt="check">
        </transition>
        <br>
        <h1>Commande effectuez avec succès !</h1>
        <br>
        <router-link class="btn checked_ok" to="home/my-order-list">Continuer</router-link>
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
