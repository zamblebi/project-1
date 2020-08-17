<template>
  <div @scroll.passive="handleScroll">
    <!-- <loader-component :is-visible="isLoading"></loader-component> -->
    <!-- <div class="parentTop"> -->
    <a v-show="dsp" href="#top" class="top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- </div> -->
    <h2 class="clothing-title mt-4">Choisir un service</h2>
    <select v-model="value" name id class="select_category">
      <option value="all">Nos services</option>
      <option
        v-for="(category, k) in categories"
        :key="k"
        v-bind:value="category.id"
      >{{category.name}}</option>
    </select>

    <transition name="fade">
      <div class="order-clothing-list" v-if="show">
        <div class="list_clothing_position">
          <br />

          <div v-for="product in products" :key="product.id">
            <!-- display all -->

            <div v-if="value == 'all'">
              <ul class="list-clothing">
                <li>
                  <div class="clothing_info">
                    <img v-bind:src="'/'+product.image" alt />

                    <div class="info_clothing">
                      <h3>{{product.name}}</h3>
                      <div>
                        <em>{{ product.prix }}f</em>
                        <br />
                      </div>
                      <div>
                        <p>
                          Catégorie :
                          <em>{{product.category.name}}</em>
                        </p>
                      </div>
                    </div>
                  </div>
                  <br />
                  <!-- Le bouton pour ajouter un vetement a la cart -->
                  <button type="button" @click="addProductToCart(product)" class="btn">Ajouter</button>
                </li>
              </ul>
            </div>

            <!-- end display all -->

            <!-- display by category -->

            <!-- <div v-for="(category, i) in categories" :key="i"> -->
            <!-- <h4>{{category.name}}</h4> -->
            <div v-if="product.category_id == value">
              <ul class="list-clothing">
                <li>
                  <div class="clothing_info">
                    <img v-bind:src="'/'+product.image" alt />

                    <div class="info_clothing">
                      <h3>{{product.name}}</h3>
                      <div>
                        <em>{{ product.prix }}f</em>
                        <br />
                      </div>
                      <div>
                        <p>
                          Catégorie :
                          <em>{{product.category.name}}</em>
                        </p>
                      </div>
                    </div>
                  </div>
                  <br />
                  <!-- Le bouton pour ajouter un vetement a la cart -->
                  <button type="button" @click="addProductToCart(product)" class="btn">Ajouter</button>
                </li>
              </ul>
              <!-- </div> -->
            </div>

            <!-- end display by category -->
          </div>
        </div>
        <cart-component :clt-qty-all="clothingQty" :clt-in-carts="carts"></cart-component>
      </div>
    </transition>
  </div>
</template>


<script>
import CartComponent from "./CartComponent";
import LoaderComponent from "./LoaderComponent";
import { mapState, mapActions, mapGetters } from "vuex";

export default {
  name: "ClothingComponent",
  components: {
    LoaderComponent: LoaderComponent,
  },

  data: function () {
    return {
      value: "all",
      show: false,
      isLoading: true,
      dsp: true,
    };
  },
  updated() {},
  components: {
    "cart-component": CartComponent,
  },
  computed: {
    ...mapState({
      products: (state) => state.products.products,
      carts: (state) => state.carts.carts,
      categories: (state) => state.products.categories,
    }),

    ...mapGetters("carts", ["clothingQty"]),
  },
  created() {
    // window.addEventListener('scoll', this.handleScroll)
    window.document.body.onscroll = function () {
      if (window.scrollY >= 700) {
        this.dsp = true;
        console.log(window.scrollY, "top");
      } else {
        this.dsp = false;
      }
      // console.log(123);
    };
  },
  mounted() {
    this.show = true;
    this.$store.dispatch("products/getProducts"),
      this.$store.dispatch("products/getCategories");
    // console.log(this.categories)
  },
  methods: { ...mapActions("carts", ["addProductToCart"]) },
  handleScroll(e) {
    console.log(e.target.scrollY);
  },
};
</script>
<style lang="scss">
// .parentTop{
//     visibility: visible;
// }
.top {
  // visibility: ;
  position: fixed;
  bottom: 20px;
  right: 20px;
  // border-radius: 100px;
  text-align: center;
  display: grid;
  place-content: center;
  text-decoration: none;
  color: #ffff;
  font-size: 20px;
  z-index: 500;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background-color: #d65047;
}

.select_category {
  display: flex;
  padding: 10px 10px;
  width: 75%;
  max-width: 200px;
  text-align: left;
  margin: 0 auto;
  background-color: #d65047;
  color: #fff;
}

.clothing-title {
  text-align: center;
}
.list-clothing {
  @import url("https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap");
  font-family: "Quicksand", sans-serif;
  flex-direction: column;
  align-items: center;
  li {
    border-radius: 7px;
    background-color: #d650471f;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: nowrap;

    width: 70%;
    margin: 10px 0;
    padding: 20px 10px !important;
    img {
      width: 72px !important;
    }
  }
  .clothing_info {
    display: flex;
    align-items: center;
    h3 {
      margin: 0;
    }
    .info_clothing {
      display: flex;
      flex-direction: column;
      /* justify-content: start; */
      align-items: flex-start;

      padding-left: 15px;
    }
  }
}
@media (max-width: 900px) {
  .carts_list_clothing {
    margin: 0 15px;
  }
  .list-clothing {
    overflow: hidden !important;
    li {
      width: 80%;
    }
  }
}
@media (max-width: 420px) {
  .btn {
    font-size: 0.7rem;
    padding: 0.7rem 1.4rem !important;
  }
  .info_clothing {
    padding-left: 10px;
    font-size: 0.7rem;
  }
}
</style>
