<template>
  <div>
    <div v-if="list == true" class="reserve-list-wrap">
      <!-- 予約履歴一覧の表示 -->
      <!-- 予約履歴件数文v-forで回す -->
      <div v-for="(reserve, index) in reserves" :key="index" class="reserve">
        <p>{{ reserve.address }}</p>
        <p>
          {{ reserve.date }} {{ reserve.start_time }}-{{ reserve.end_time }}
        </p>
        <button class="button" @click="showDetail(index)">詳細</button>
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
            <p>{{ reserves[num].address }}</p>
          </div>
          <div class="info-contents">
            <p>日時</p>
            <p>
              {{ reserves[num].date }} {{ reserves[num].start_time }}-{{
                reserves[num].end_time
              }}
            </p>
          </div>
          <div class="info-contents">
            <p>範囲</p>
            <p>{{ reserves[num].area }}</p>
          </div>
        </div>
        <div class="others-wrap">
          <!-- 料金詳細、支払い情報(右側のblock)tate -->
          <div class="cost-wrap">
            <p class="cost-title">料金詳細</p>
            <div class="cost-contents">
              <p>基本料金</p>
              <p>
                {{ reserves[num].cost }}
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
                {{ reserves[num].cost }}
              </p>
            </div>
          </div>
          <div class="card-wrap">
            <div class="card-contents">
              <p>お支払い情報</p>
              <p>{{ reserves[num].cardNum }}</p>
              <a href="#">変更</a>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-wrap">
        <button class="button submit-button" @click="list = true">戻る</button>
        <button class="button submit-button danger" @click="openModal(num)">
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
                  <p>{{ reserves[num].address }}</p>
                </div>
                <div class="info-contents">
                  <p>日時</p>
                  <p>
                    {{ reserves[num].date }} {{ reserves[num].start_time }}-{{
                      reserves[num].end_time
                    }}
                  </p>
                </div>
                <div class="info-contents">
                  <p>範囲</p>
                  <p>{{ reserves[num].area }}</p>
                </div>
                <div class="info-contents">
                  <p>金額</p>
                  <p>{{ reserves[num].cardNum }}</p>
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
      num: Number,
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
      //表示確認するための仮データ、後で取得データに変更
      reserves: [
        {
          id: 1,
          latitude: 35.830508,
          longitude: 139.670543,
          address: "sample1",
          date: "0000-00-00".replace(/-/g, "/"),
          start_time: "00:00:00",
          end_time: "00:10:00",
          area: 100,
          cost: 10000,
          status: 0, //予約中
          cardNum: "**** **** **** 0000",
        },
        {
          id: 2,
          latitude: 35.832265,
          longitude: 139.680714,
          address: "sample2aaaaa",
          date: "0000-11-22",
          start_time: "16:10:00",
          end_time: "18:10:00",
          area: 200,
          cost: 20000,
          status: 1, //完了
          cardNum: "**** **** **** 0000",
        },
        {
          id: 3,
          latitude: 35.830908,
          longitude: 139.690756,
          address: "sampleaa3",
          date: "0000-00-00",
          start_time: "00:00:00",
          end_time: "00:00:00",
          area: 300,
          cost: 30000,
          status: 1,
          cardNum: "**** **** **** 0000",
        },
      ],
    };
  },
  async mounted() {
    this.google = await GoogleMapsApiLoader({
      apiKey: "AIzaSyCbr524Eht2tpaHaFLvBShbHBy1m1uqBy4",
    });
  },
  methods: {
    openModal(index) {
      this.modal = true;
    },
    closeModal() {
      this.modal = false;
    },
    showDetail(index) {
      this.list = false;
      this.num = index;
      const lat = this.reserves[index].latitude;
      const lng = this.reserves[index].longitude;
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
        id: this.num,
      };
      axios.post(url, params).then((response) => {
        //処理
        //予約(Reserve)削除
      });
    },
  },
};
</script>
