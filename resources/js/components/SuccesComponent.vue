<template>
    <div class="success-order">
        <h1>Commander effectuez !</h1>
        <br>
        <img :src="'/icons/check.svg'" alt="check">
        <br>
        <router-link class="btn" to="home/my-order-list">Continuer</router-link>
    </div>
</template>

<script>
    export default {
        name: "SuccesComponent.vue",
        data(){
            return{

                // img_src = ''
            }
        }
    }
</script>

<style lang="scss">
    .success-order{
        text-align: center;
        img{
            width: 200px;
            padding-bottom: 30px;
        }
    }
</style>
