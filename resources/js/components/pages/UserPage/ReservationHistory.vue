<template>
  <div>
    <div v-if="list == true" class="reserve-list-wrap">
      <!-- 予約履歴一覧の表示 -->
      <!-- 予約履歴件数文v-forで回す -->
      <div v-for="reserve in reserves" :key="reserve.id" class="reserve">
        <p>{{ reserve.address }}</p>
        <p>
          {{ reserve.date }} {{ reserve.start_time }}-{{ reserve.end_time }}
        </p>
        <button class="button" @click="showDetail(reserve.id)">詳細</button>
      </div>
    </div>
    <div v-else class="reserve-detail-wrap">
      <!-- 予約詳細 -->
      <div class="content-wrap">
        <div class="info-wrap">
          <p class="info-title">予約情報</p>
          <div id="map" ref="googleMap"></div>
          <div class="info-contents">
            <p>場所</p>
            <p>{{ reserves[reserveId].address }}</p>
          </div>
          <div class="info-contents">
            <p>日時</p>
            <p>
              {{ reserves[reserveId].date }} {{ reserves[reserveId].start_time }}-{{
                reserves[reserveId].end_time
              }}
            </p>
          </div>
          <div class="info-contents">
            <p>範囲</p>
            <p>{{ reserves[reserveId].area }}</p>
          </div>
        </div>
        <div class="others-wrap">
          <!-- 料金詳細、支払い情報(右側のblock)tate -->
          <div class="cost-wrap">
            <p class="cost-title">料金詳細</p>
            <div class="cost-contents">
              <p>基本料金</p>
              <p>
                {{ reserves[reserveId].cost }}
              </p>
            </div>
            <div class="cost-contents">
              <p>利用時間</p>
              <p>2時間</p>
              <!-- 本来はstarttimeとendTimeの差の時間を入れる -->
            </div>
            <div class="cost-border"></div>
            <div class="cost-contents total">
              <p>基本料金</p>
              <p>
                {{ reserves[reserveId].cost }}
              </p>
            </div>
          </div>
          <!-- <div class="card-wrap">
            <div class="card-contents">
              <p>お支払い情報</p>
              <p>{{ reserves[num].cardNum }}</p>
              <a href="#">変更</a>
            </div>
          </div> -->
        </div>
      </div>
      <div class="btn-wrap">
        <button class="button submit-button" @click="list = true">戻る</button>
        <button class="button submit-button danger" @click="openModal()">
          キャンセル
        </button>
      </div>
      <!-- キャンセルボタン押した時のモーダル -->
      <transition name="modal" appear v-if="modal">
        <div class="modal modal-overlay" @click="closeModal()">
          <div class="modal-window">
            <div class="modal-title-block">
              <p class="title">予約キャンセル</p>
              <p class="introduction">下記の予約をキャンセルしますか？</p>
            </div>
            <div class="modal-body">
              <div class="info-wrap">
                <!-- <div id="map" ref="googleMap"></div> -->
                <div class="info-contents">
                  <p>場所</p>
                  <p>{{ reserves[reserveId].address }}</p>
                </div>
                <div class="info-contents">
                  <p>日時</p>
                  <p>
                    {{ reserves[reserveId].date }} {{ reserves[reserveId].start_time }}-{{
                      reserves[reserveId].end_time
                    }}
                  </p>
                </div>
                <div class="info-contents">
                  <p>範囲</p>
                  <p>{{ reserves[reserveId].area }}</p>
                </div>
                <div class="info-contents">
                  <p>金額</p>
                  <p>{{ reserves[reserveId].cost }}</p>
                </div>
              </div>
            </div>
            <div class="modal-btn">
              <button class="button submit-button" @click="closeModal()">
                戻る
              </button>
              <button class="button submit-button danger" @click="submit()">
                キャンセル
              </button>
            </div>
          </div>
        </div>
      </transition>
    </div>
  </div>
</template>
<script>
import GoogleMapsApiLoader from "google-maps-api-loader";
import mypin from "../../../../../public/assets/mypin.png";

export default {
  components: {},
  data() {
    return {
      reserveId: Number,
      list: true,
      modal: false,

      google: null,
      Map: "",
      mapConfig: {
        center: {
          lat: 0.0,
          lng: 0.0,
        },
        zoom: 15,
        mapTypeControl: false,
        fullscreenControl: false,
        streetViewControl: false,
        zoomControl: false,
        disableDoubleClickZoom: true,
        scrollwheel: false,
        draggable: false,
        clickable: false,
      },
      reserves: [],
    };
  },
  computed: {

  },
  async mounted() {
    this.google = await GoogleMapsApiLoader({
      apiKey: "AIzaSyCbr524Eht2tpaHaFLvBShbHBy1m1uqBy4",
    });
    var url = "/api/user_reserves";
    axios.get(url).then((res) => {
      this.reserves = res.data;
    });
    console.log(this.reserves);
  },
  methods: {
    openModal() {
      this.modal = true;
    },
    closeModal() {
      this.modal = false;
    },
    showDetail(reserveId) {
      this.list = false;
      this.reserveId = reserveId;
      const lat = this.reserves[reserveId].latitude;
      const lng = this.reserves[reserveId].longitude;
      this.$nextTick(function () {
        this.Map = new this.google.maps.Map(
          this.$refs.googleMap,
          this.mapConfig
        );
        this.marker = new this.google.maps.Marker({
          position: new this.google.maps.LatLng(lat, lng),
          map: this.Map,
          icon: mypin,
        });
        this.nowMappin = new this.google.maps.Circle({
          center: new this.google.maps.LatLng(lat, lng),
          map: this.Map,
          radius: 150,
          strokeColor: "#eaf07900",
          fillColor: "#A58888",
        });
        this.Map.panTo(new this.google.maps.LatLng(lat, lng));
      });
    },
    submit() {
      //url 書き換えてコントローラー指定
      var url = "/";
      var params = {
        id: this.reserveId,
      };
      console.log(this.reserveId);
      axios.post(url, params).then((response) => {
        //処理
        //予約(Reserve)削除
      });
    },
  },
};
</script>
