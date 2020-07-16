<template>
    <div class="menu-profil">
        <ul class="menu">
            <li><router-link to="/home/my-order-list">Mes Commande</router-link></li>
            <li><router-link to="/home/edit-profil">Modifier le profil </router-link></li>
            <li><router-link to="/home/edit-password">Modifier votre mot de passe</router-link></li>
        </ul>
    </div>
</template>

<script>
// import
export default {
    name:'MenuProfil',
    data(){
        return{

        }
    }
}
</script>

<style lang="scss">
.menu-profil{
    ul{
        justify-content: center;
        display: flex;
        width: 100%;
        li{
            padding: 0 20px;
        }
    }

}
</style>
