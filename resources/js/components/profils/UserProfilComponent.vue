<template>
    <div>
        <!-- <h1>Votre profils depuis vuejs</h1> -->
        <menu-profil/>
        <router-view>
        </router-view>
            
    </div>
</template>

<script>
import MenuProfil from './MenuProfil'
export default {
    data(){
        return{

        }
    },
    components: {
        'menu-profil' : MenuProfil
    }
}
</script>

<style lang="scss">

</style>