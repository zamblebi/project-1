// var menu = document.getElementById('menu-burger')

// function clickHandle(){
//     return true
// }
// var ok = menu.addEventListener("click",clickHandle)

// console.log(ok)

$(document).ready(function() {
    $("#menu-burger").click(function() {
        if($('.menu-all').hasClass('.toggle')){
            $('.menu-all').removeClass('toggle')
        }else if($('.menu-all').hasClass('.toggle')){
            $('.menu-all').addClass('toggle')
        }
    console.log('clicked')
    });
});