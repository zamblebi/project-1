<template>
    <div class="user_profil">
        <!-- <h1>Votre profils depuis vuejs</h1> -->
        <div class="menu_center">
            <button @click="activer" class="menu_profil btn">{{!active ? 'Afficher le menu' : 'Masquer le menu'}}</button>
        </div>
        <transition name="fade">
            <menu-profil  v-show="active"/>
        </transition>
         <menu-profil class="menu_profil_desktop"/>
         
         <transition name="slide-fade">
             <div v-if="show">
                <router-view>
                </router-view>
             </div>
         </transition>
            
    </div>
</template>

<script>
import MenuProfil from './MenuProfil'
export default {
    data(){
        return{
            active: false,
            show: false
        }
    },
    mounted(){
        this.show = true
    },
    // destroyed(){
    //     this.active = false
    // },
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
.user_profil{
    min-height: 100% !important;

}
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
/* Enter and leave animations can use different */
/* durations and timing functions.              */
.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}
</style>