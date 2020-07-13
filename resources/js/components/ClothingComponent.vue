<template>
    <div>


            <h2>Choisir une quantiter</h2>
    <div class="order-clothing-list">
        <ul class="list-clothing">
                <li v-for="clothing in clothings" :key="clothing.id">
                <img v-bind:src="'/icons/'+clothing.icon+'.svg'" alt="">
                    <h3>
                        {{clothing.name}}
                    </h3>
                    <div>
                        <em>{{ clothing.prix }}f</em>
                        <br>
                        <strong>
                            <!-- <em>Quantiter : {{!empty($getSession->items[$clothing->id]['qty']) ? $getSession->items[$clothing->id]['qty'] : '0'}}</em> -->
                        </strong>
                    </div>
                    <br>

                     <!-- Le bouton pour ajouter un vetement a la cart -->
                        <button type="button" @click.prevent="addInCart(clothing)" class="btn">Ajouter</button>
                </li>

        </ul>

        <div>
            <h3>Estimation du prix (hors livraison)</h3>
            <hr>
            <strong>
             <!-- Voir la quantiter total -->
                <p>Quantiter Total : {{totalQuantity}}</p>
                    <p>Prix : {{this.totalPrice}}f</p>
                    <ul>
                        <li v-for="(cart, c) in carts" :key="cart.iD">
                            {{cart.name}}
                            <button type="button" @click="removeCart(c)">X</button>
                            {{c}}
                        </li>
                    </ul>
            </strong>

            <hr>
            <router-link to="/order-deliverable">Passer une commande</router-link>
        <!-- <a href="#" class="btn">Passer la commande</a> -->
        </div>
    </div>






        <ul>
            <!-- <li >{{clothing.name}}</li> -->
        </ul>
    </div>
</template>


<script>
    import axios from 'axios'
    export default{

        data: function(){
            return{
                clothings: '',
                carts: [],
                cartAdd: {
                    id: '',
                    name: '',
                    price: '',
                    qty: '',
                    item: '',

                },
                totalPrice: '0',
                totalQuantity: '0',

            }
        },
        mounted(){
            axios.get('/clothing-lists')
            .then(response => (this.clothings = response.data))
            .catch(error => console.log("Il y'a eu une erreur a la reccuperation " + error))
            this.viewCart()
        },
        methods:{
            
            addInCart(clothing){
                
                    this.cartAdd.id = clothing.id;
                    this.cartAdd.name = clothing.name;
                    this.cartAdd.price = clothing.prix;
                    this.cartAdd.icon = clothing.icon;
                    
                    this.carts.push(this.cartAdd)
                    this.cart = {}
                    this.storeCart();
                    // localStorage.setItem('cart', JSON.stringify(this.carts))
                    // console.log(JSON.parse(localStorage.getItem('cart')))

            },
            storeCart(){
                let parsed = JSON.stringify(this.carts)
                localStorage.setItem('carts', parsed)
                this.viewCart();
            },
            removeCart(clot){
                this.carts.splice(clot,1)
                this.storeCart();
            },
            viewCart(){
                if(localStorage.getItem('carts')){
                    this.carts = JSON.parse(localStorage.getItem('carts'))
                    this.totalQuantity = this.carts.length
                    this.totalPrice = this.carts.reduce((total, clothing) => {
                        return total + clothing.price
                    }, 0)
                        console.log('Hello ' , this.carts)
                }

            }
            
        }
    }
</script>