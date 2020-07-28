<template>
    <div>

        <!-- <select name="" id="" >
            <option v-for="(category, k) in categories" :key="k" v-bind:value="category.id">{{category.name}}</option>
        </select> -->


      <h2 class="clothing-title">Choisir une quantité</h2>
    <div class="order-clothing-list">
        <div class="list_clothing_position">

        <ul class="list-clothing" v-for="(category, i) in categories" :key="i">
                    <h4>{{category.name}}</h4>
                    <br>
            <div v-for="product in products" :key="product.id">
                <li v-if="product.category_id == category.id">

                    <div class="clothing_info" >
                        <img v-bind:src="'/'+product.image" alt="">

                                <div class="info_clothing">
                                    <h3>
                                        {{product.name}}
                                    </h3>
                                    <div>
                                        <em>{{ product.prix }}f</em>
                                        <br>
                                    </div>
                                    <div>
                                        <p> Catégorie :  <em>{{product.category.name}}</em></p>
                                    </div>

                                </div>

                    </div>
                    <br>
                     <!-- Le bouton pour ajouter un vetement a la cart -->
                        <button type="button" @click="addProductToCart(product)"  class="btn">Ajouter</button>

                </li>
            </div>

        </ul>
        </div>
        <cart-component :clt-qty-all="clothingQty" :clt-in-carts="carts" ></cart-component>
        
    </div>

    </div>
</template>


<script>
    import CartComponent from './CartComponent'
    import {mapState, mapActions, mapGetters} from 'vuex'

    export default{

        data: function(){
            return{
                value: '',
            } 
        },
        updated(){
            console.log(this.value)
        },
        components: {
            'cart-component' : CartComponent
        },
        computed:{ 
            ...mapState({
                products : state => state.products.products,
                carts : state => state.carts.carts,
                categories: state => state.products.categories,
            }),
            
            ...mapGetters(
                'carts', ['clothingQty']
            )},
        mounted(){
            this.$store.dispatch('products/getProducts'),
            this.$store.dispatch('products/getCategories')
            // console.log(this.categories)
        },
        methods: mapActions(
            'carts', ['addProductToCart']
        ) 

    }
</script>
<style lang="scss">


    .list_clothing_position{
        // display: flex;
        // flex-direction: column;
    }

  .clothing-title{
      text-align: center;
  } 
  .list-clothing{
      @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap');
       font-family: 'Quicksand', sans-serif;;
          flex-direction: column;
      li{
          border-radius: 7px;
    background-color: #d650471f;
      display: flex;
      align-items: center;
      justify-content: space-between;
    flex-wrap: nowrap;

    width: 70%;
    margin: 10px 0;
          padding: 20px 10px !important;
          img{
              width: 72px !important;
            }
      }
      .clothing_info{
          display: flex;
          align-items: center;
          h3{
              margin: 0;

          }
          .info_clothing{
            display: flex;
            flex-direction: column;
            /* justify-content: start; */
            align-items: flex-start;

              padding-left: 15px;
          }
      }
  }
  @media(max-width: 900px){
     .carts_list_clothing{
         margin: 0 15px;
     } 
      .list-clothing{
          overflow: hidden !important;
          li{
              width: 80%;
          }
      }
  }
  @media(max-width: 420px){
      .btn{
          font-size: .7rem;
        padding: 0.7rem 1.4rem !important;
      }
      .info_clothing{
          padding-left: 10px ;
          font-size: .7rem;
      }
  }
</style>