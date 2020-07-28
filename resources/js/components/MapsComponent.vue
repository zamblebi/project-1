<template>
    <div class="maps_details">
       <h4>L'adresse de récupération :</h4>
            <p class="current_adress">
               {{adress ?  JSON.parse(adress).long_name : "Aucun"}}
            </p>
        <!-- <h2>Votre adresse : </h2> -->
           <!-- <input type="text" class="search_maps">
            <button type="button" class="btn">Valider</button> -->

        <div>
            <label>
                <gmap-autocomplete class="search_ maps"
                :options="{fields: ['geometry', 'address_components']}"
                @place_changed="setPlace">
                </gmap-autocomplete>
                <button class="btn add_in_maps" @click="addMarker">Ajouter</button>
            </label>
            <br/>

            </div>
            <br>
            <div class="maps_carte">
              <gmap-map
              :center="center"
              :zoom="12"
              style="width:100%;  height: 400px;" 
              >
              <gmap-marker
                  :key="marker.lat"
                  :position="marker"
                  @click="center=marker"
              ></gmap-marker>
              </gmap-map>
            </div>

    </div>

    
</template>
<script>
export default {
    name: 'GoogleMaps',
    data() {
    return {
      adress : '',
      // default to montreal to keep it simple
      // change this to whatever makes sense
      center: { lat: 5.3599517, lng: -4.0082563 },
      adress: '', 
      marker: '',
      places: [],
      currentPlace: null
    };
  },
  updated(){
    this.adress = localStorage.adressMaps
  },

  mounted() {
    // this.geolocate();
    if(localStorage.adressMaps){
      this.adress = localStorage.adressMaps
    }
    // this.mapStored();
  },

  methods: {
    setPlace(place) {
      this.currentPlace = place;
    },
    addMarker() {
      if (this.currentPlace) {
        this.marker = {
          lat: this.currentPlace.geometry.location.lat(),
          lng: this.currentPlace.geometry.location.lng()
        };
        // this.markers.push({ position: marker });
    // this.mapStored();
    // console.log(this.marker)
        this.places[0] = this.currentPlace;
        this.center = this.marker;
        this.currentPlace = null;
        localStorage.adressMaps = JSON.stringify(this.places[0].address_components[0]);
        console.log('Place' , JSON.stringify(this.places[0].address_components[0]))
        this.$emit('clicked', 'Sa marche')
      }
    },

    // mapStored(){
    //   if(localStorage.adressMaps){
    //     this.places = localStorage.adressMaps
    //   }
    // }
    // geolocate: function() {
    //   navigator.geolocation.getCurrentPosition(marker => {
    //     this.center = {
    //       lat: marker.coords.latitude,
    //       lng: marker.coords.longitude
    //     };
    //   });
    // }
  }
}
</script>

<style lang="scss">
    $orange : #B8524B;
    .current_adress{
      color: $orange;
    }
    .maps_details{
        text-align: center;
    }
    .search_ .maps{
        width: 270px;
        height: 40px;
        border-radius: none;
        padding: 3px 10px;
        border: 1px solid #11111177;
    }
    label{
      .add_in_maps{
        margin-top: 20px;
      }
    }
    @media(max-width: 800px){
      .maps_carte{
        margin: 0 25px;
      }
    }
</style>