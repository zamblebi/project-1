<template>
    <div class="success-order">
        <transition name="fade">
            <img  :src="'/icons/check.svg'" alt="check">
        </transition>
        <br>
        <h1>Commande effectuez !</h1>
        <br>
        <router-link class="btn" to="home/my-order-list">Continuer</router-link>
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
        text-align: center;
        img{
            width: 200px;
            padding-bottom: 30px;
        }
    }
       
</style>
