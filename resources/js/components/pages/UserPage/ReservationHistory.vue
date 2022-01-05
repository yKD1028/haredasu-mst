<template>
    <div>
        <div v-if="list == true">
            <v-row class="reserve" no-gutters v-for="(reserve,index) in reserves" :key="index">
                <v-col cols="auto">{{ reserve.address }}</v-col>
                <v-col cols="auto">
                    {{ reserve.date }} {{ reserve.start_time }}-{{ reserve.end_time }}
                    <!-- 初期二行表示 -->
                    <!-- <v-row align-content="left">{{ reserve.date }}</v-row>
                    <v-row>{{ reserve.start_time }}-{{ reserve.end_time }}</v-row> -->
                </v-col>
                <v-col cols="auto">
                    <!-- <button class="button" @click="list = false, num = index">詳細</button> -->
                    <button class="button" @click="showDetail(index)">詳細</button>
                    <!-- <Button buttonName="詳細" v-on:show-detail="list = false"></Button> -->
                </v-col>
            </v-row>
        </div>

        <div v-if="list == false" id="sample">
            <v-row no-gutters class="reserve-detail">
                <v-col>
                    <v-card outlined class="card detail">
                        <div class="card-title">予約情報</div>
                        <div class="card-contents">
                            <!-- width調整 -->
                            <div id="map" ref="googleMap" style="width:500px; height:280px;"/>
                            <ul>
                                <li>場所{{ reserves[num].address }}</li>
                                <li>
                                    日時{{ reserves[num].date }} {{ reserves[num].start_time }}-{{ reserves[num].end_time }}
                                </li>
                                <li>範囲{{ reserves[num].area }}</li>
                            </ul>
                        </div>
                    </v-card>
                </v-col>
                <v-col>
                    <v-row no-gutters>
                        <v-card outlined class="card cost">
                            <div class="card-title">料金詳細</div>
                            <div class="card-content">
                                <ul>
                                    <li>料金{{ reserves[num].cost }}<span>円</span></li>
                                    <li>時間</li>
                                </ul>
                            </div>
                        </v-card>
                    </v-row>
                    <v-row>
                        <v-card outlined class="card card-num"></v-card>
                    </v-row>
                </v-col>

                <div>
                    <v-row></v-row>
                </div>
            </v-row>
            this is ReservationHistoryPage.
        </div>
    </div>
</template>
<script>
    import GoogleMapsApiLoader from 'google-maps-api-loader';
    import mypin from '../../../../../public/assets/mypin.png';

    export default{
        data() {
            return {
                num: Number,
                list: true,
                dialog: false,

                google: null,
                Map:"",
                mapConfig: {
                    center: {
                        lat: 0.000,
                        lng: 0.000
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
                reserves: [
                    {
                        id: 1,
                        latitude: 35.830508,
                        longitude: 139.670543,
                        address: 'sample1',
                        date: '0000-00-00'.replace(/-/g,'/'),
                        start_time: '00:00:00',
                        end_time: '00:10:00',
                        area: 100,
                        cost: 10000,
                        status: 0,//予約中
                    },
                    {
                        id: 2,
                        latitude: 35.832265,
                        longitude: 139.680714,
                        address: 'sample2',
                        date: '0000-11-22',
                        start_time: '16:10:00',
                        end_time: '18:10:00',
                        area: 200,
                        cost: 20000,
                        status: 1,//完了
                    },
                    {
                        id: 3,
                        latitude:35.830908,
                        longitude: 139.690756,
                        address: 'sample3',
                        date: '0000-00-00',
                        start_time: '00:00:00',
                        end_time: '00:00:00',
                        area: 300,
                        cost: 30000,
                        status: 1,
                    },
                ],
            }
        },
        async mounted() {
            this.google = await GoogleMapsApiLoader({
                apiKey: 'AIzaSyCbr524Eht2tpaHaFLvBShbHBy1m1uqBy4'
            });
        },
        components:{
            // Button,
        },
        methods: {
            showDetail(index){
                this.list = false;
                this.num = index;
                const lat = this.reserves[index].latitude;
                const lng = this.reserves[index].longitude;
                this.$nextTick(function () {
                    this.Map = new this.google.maps.Map(this.$refs.googleMap, this.mapConfig);
                    this.marker = new this.google.maps.Marker({
                        position: new this.google.maps.LatLng(lat,lng),
                        map: this.Map,
                        icon: mypin,
                    });
                    this.nowMappin = new this.google.maps.Circle({
                        center: new this.google.maps.LatLng(lat,lng),
                        map: this.Map,
                        radius: 150,
                        strokeColor: "#eaf07900",
                        fillColor: "#A58888",
                    });
                    this.Map.panTo(new this.google.maps.LatLng(lat,lng));
                })
            },
        },
    }

</script>
