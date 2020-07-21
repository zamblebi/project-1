
export const PUSH_PRODUCT_ON_CART = (state, product) => {
    state.carts.push({product, quantity: 1})
}