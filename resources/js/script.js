// burger menu

var menu = document.querySelector('#menu-burger')

var stateNav = false
// ajouter un evenement click qui detectera l'evenement au moment du click
menu.addEventListener("click",(e) =>{
    if(stateNav == false){
        let nav = document.querySelector('.navbar-nav')
    nav.style.top = '47px'
        stateNav = true
    }else{
        let nav = document.querySelector('.navbar-nav')
        // nav.style.display = "none"
        nav.style.top = "-250px"
        stateNav = false
    }
}, false)

// loader
window.addEventListener("load", function(e){
    // setTimeout(function(){
    let loading = document.querySelector('#theLoader');
        loading.style.display = "none";
        console.log('Loaded')
    // }, 3000)
})

// window.
// loader end




//ajax request

//end ajax request


// document.addEventListener('scroll', function(e){
//     let top = document.querySelector('.parentTop');
//     if(window.scrollY >= 700){
//         top.style.display = 'block'
//      console.log('Display Top')   
//     }
//     // console.log(window.scrollY);
// })



