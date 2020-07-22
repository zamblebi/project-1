export const clothingQty = (state) => {
   return state.carts.length
}

export const totalPrice = (state) => {
    return state.carts.reduce(total , item => {
        total +  item.product.prix 
    }, 0)
}
