

export const clothingQty = (state) => {
   return state.carts.length
}


export const priceClt = (state) => cart  => {
   
   
    if(cart.price){
        return cart.price * cart.quantity
    } 
    
}



// export const totalPrice = (state) => {
//      state.carts.reduce(item => {
//         console.log(item)
//     })
// }