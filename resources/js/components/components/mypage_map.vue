<template>
    <div class="mypage_map">
        <!-- mapのコード(仮) -->
        <!-- <img :src="'/images/test/map.png'" alt="仮の画像" width="100%"> -->
        <div class="map" ref="googleMap" />
    </div>
</template>

<script>
import GoogleMapsApiLoader from 'google-maps-api-loader';

export default {
  name: 'Map',
  data() {
    return {
      google: null,
      mapConfig: {
        center: {
          lat: 35.68944,
          lng: 139.69167
        },
        zoom: 15
      }
    }
  },
  //Reserve 256行目くらい
  async mounted() {
    this.google = await GoogleMapsApiLoader({
      apiKey: 'AIzaSyCbr524Eht2tpaHaFLvBShbHBy1m1uqBy4'
    });
    this.initializeMap();
  },
  //Reserve 266行目くらい
  methods: {
    initializeMap() {
      new this.google.maps.Map(this.$refs.googleMap, this.mapConfig);
    }
  }
}
</script>

<style lang="scss" scoped>
.map {
  width: 79vw;
  height: 50vh;
}
</style>