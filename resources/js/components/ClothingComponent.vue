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
                        <a href="#" class="btn">Ajouter</a>
                </li>

        </ul>

        <div>
            <h3>Estimation du prix (hors livraison)</h3>
            <hr>
            <strong>
             <!-- Voir la quantiter total -->
                <p>Quantiter Total : </p>
                    <!-- <p>{{Session::has('cart') ? Session::get('cart')->totalPrice : '0' }}f</p> -->
            </strong>

            <hr>
        <a href="#" class="btn">Passer la commande</a>
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
                clothings: ''
            }
        },
        mounted(){
            axios.get('/clothing-lists')
            .then(response => (this.clothings = response.data))
            .catch(error => console.log("Il y'a eu une erreur a la reccuperation " + error))
        }
    }
</script>