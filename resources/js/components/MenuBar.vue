<style>
.menu-bar{
    display: flex;
    justify-content: space-between;
}
    .menu-burger{
        width: 2em;
    }
    .brand{
        font-size: 1.4em;
        text-decoration: none;
        color: black;
    }
</style>


<template>
    <div class="header-navbar">
        <nav class="menu-bar">
            <a class="brand" href="/">
                Acceuil
            </a>
            <div>
                <img class="menu-burger" src="/icons/menu.svg" alt="">
            </div>
        </nav>
    </div>
</template>

<script>
export default {
   mounted(){
       console.log('menu monted')
   } 
}
</script>