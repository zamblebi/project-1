<template>
    <div>
        <!-- <h1>Votre profils depuis vuejs</h1> -->
        <div class="menu_center">
            <button @click="activer" class="menu_profil btn">Menu</button>
        </div>
        <transition name="fade">
            <menu-profil  v-show="active"/>
        </transition>
         <menu-profil class="menu_profil_desktop"/>
        <router-view>
        </router-view>
            
    </div>
</template>

<script>
import MenuProfil from './MenuProfil'
export default {
    data(){
        return{
            active: false
        }
    },
    components: {
        'menu-profil' : MenuProfil
    },methods: {
        activer(){
            if(!this.active){
                this.active = true

            }else{
                this.active = false
            }
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



@media(min-width: 800px){
    .menu_profil{
        display: none;
    }

}
@media(max-width: 800px){
    .menu_center{
        display: grid;
        place-items: center;
    }
    .menu_profil_desktop{
        display: none;
    }
}

</style>