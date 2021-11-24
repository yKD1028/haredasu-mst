<template>
    <div>
       <div class="Reservepage_main">
           <div class="map" id="map" ref="googleMap"/>
       </div>
    </div>
</template>

<script>
import GoogleMapsApiLoader from 'google-maps-api-loader';

export default {
    data() {
        return{
            google: null,
      mapConfig: {
        center: {
          lat: 35.68944,
          lng: 139.69167
        },
        zoom: 17,
      },
      nowMaker:"",
      Map:"",
      marker:"",
      hani:"",
      jyusyo: "住所だよ",
      latitude:0,
      longitude:0,
        }
    },
    async mounted() {
         this.google = await GoogleMapsApiLoader({
      apiKey: 'AIzaSyDnkNCNBQSaN8cZkaxMvVcWXURg-QxJCCc'
    });
    this.initializeMap();
    },
    methods: {
initializeMap() {
      this.Map = new this.google.maps.Map(this.$refs.googleMap, this.mapConfig);
    }
    }
}
</script>

<style lang="scss">
.map{
  width: 70%;
  height: 90vh;
}
</style>
