<template>
    <div class="menu-profil">
        <ul class="menu">
            <li><router-link to="/home/my-order-list">Mes Commande</router-link></li>
            <li><router-link to="/home/edit-profil">Modifier mes informations</router-link></li>
            <li><a href="/change-password">Modifier votre mot de passe</a></li>
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
        padding-left: 0;
        justify-content: center;
        display: flex;
        width: 100%;
        flex-direction: column;
        li{
            text-align: center;
            padding: 10px 20px;
            a{
                text-decoration: none;
                color: #b8524b;
            }
        }
    }

    @media(min-width: 800px){
        ul{
            flex-direction: row;
            li{

            }
        }
    }

}
</style>
