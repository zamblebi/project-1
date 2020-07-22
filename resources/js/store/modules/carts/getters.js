

export const clothingQty = (state) => {
   return state.carts.length
}


export const priceClt = (state) => cart  => {
   
   
    if(cart.price){
        return cart.price 
    } 
    
}

export const totalPrice = (state) => {
    // if(state.carts != []){
        console.log(state.allPrice)

    // }
    // console.log(state.carts) 
}