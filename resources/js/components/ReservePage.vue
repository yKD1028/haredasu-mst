<template>
    <div class="reservePage_main">
        <div class="map">
             <div id="map" ref="googleMap"/>
             <div class="mapimg"><img :src="'/images/Group73.png'" alt="現在地ボタン" @click="backAddress"></div>
             <div class="trigger">+</div>
        </div>
        <div class="reservePage_inputform">
            <div class="reservePage_inputform_forms">
                <div class="reservePage_inputform_forms_box">
                    <div class="reservePage_inputform_forms_box_exclamation errActive">
                        <p>!</p>
                    </div>
                    <p class="reservePage_inputform_forms_box_title">場所</p>
                </div>
                <p class="weight">{{ addressName }}</p>
            </div>
            <div class="reservePage_inputform_forms" >
                <div class="reservePage_inputform_forms_box">
                    <div class="reservePage_inputform_forms_box_exclamation  errActive">
                        <p>!</p>
                    </div>
                    <p class="reservePage_inputform_forms_box_title">日付</p>
                </div>
                <p class="weight" @click="datePicker">{{ text }}</p>
            </div>
            <div class="reservePage_inputform_calendar">
                <v-date-picker
                v-bind:class="{calendarActive: calendarPicker}"
                class="calendar"
                :available-dates="dates"
                :mode="mode"
                v-model="picker"
                @input="formatDate(picker)">
                </v-date-picker>
            </div>
            <div class="reservePage_inputform_forms">
                <div class="reservePage_inputform_forms_box">
                    <div class="reservePage_inputform_forms_box_exclamation" @click="errMessage">
                        <p>!</p>
                    </div>
                    <div class="reservePage_inputform_forms_box_errmessage" v-bind:class="{ errActive: errActive }">
                        <p>時間は予約予定日の~24:00までの登録しか出来ません。</p>
                    </div>
                    <p class="reservePage_inputform_forms_box_title">時間</p>
                </div>
                <p class="weight">17:00~19:00</p>
            </div>
            <div class="reservePage_inputform_forms">
                <div class="reservePage_inputform_forms_box">
                    <div class="reservePage_inputform_forms_box_exclamation" @click="errMessage2">
                        <p>!</p>
                    </div>
                    <div class="reservePage_inputform_forms_box_errmessage" v-bind:class="{ errActive: errActive2 }">
                        <p>これはエラーです</p>
                    </div>
                    <p class="reservePage_inputform_forms_box_title">範囲</p>
                </div>
                <select name="example" class="range" id="range" v-on:change="changeRange">
                    <option value="150">150m</option>
                    <option value="300">300m</option>
                    <option value="500">500m</option>
                    <option value="750">750m</option>
                    <option value="1000">1000m</option>
                </select>
            </div>
            <div class="reservePage_inputform_forms_droneErr"></div>
            <div class="reservePage_inputform_forms_money">
                <div class="reservePage_inputform_forms_money_text"><p>見積り価格</p></div>
                <div class="reservePage_inputform_forms_money_sum"><div class="first">¥</div><p id="val">{{sumval}}</p></div>
            </div>
            <div class="reservePage_inputform_forms_next">
                <button>次へ進む</button>
            </div>
        </div>
    </div>
</template>

<script>
import GoogleMapsApiLoader from 'google-maps-api-loader';
import Vue from 'vue';
import VCalendar from 'v-calendar';
import axios from 'axios';
import { compareAsc, format } from 'date-fns'
import gsap from 'gsap'


Vue.use(VCalendar);

export default {
    data() {
        return{
            dates: {
                start: new Date()
            },
            mode: 'single',
            selectedDate: new Date(),
            google: null,
            mapConfig: {
                center: {
                    lat: 35.68944,
                    lng: 139.69167
                },
                zoom: 15,
                mapTypeControl: false,
                fullscreenControl: false,
                streetViewControl: false,
                zoomControl: false,
            },
            nowMappin:null,
            errActive:true,
            errActive2:true,
            addressName:"",
            calendarPicker:true,
            Map:"",
            menu: "",
            text: "2021/11/31",
            picker: "",
            sumval:"",
            totalFee:{
                val:0,
                latlng:{lat:35.68944,lng:139.69167},
                radius:150,
                radiusIndex:0,
                address:"",
                sumDrone:0
            }
        }
    },

    async mounted() {
        this.google = await GoogleMapsApiLoader({
            apiKey: 'AIzaSyCbr524Eht2tpaHaFLvBShbHBy1m1uqBy4'
        });
        this.initializeMap();
    },

    methods: {
        initializeMap() {
            this.Map = new this.google.maps.Map(this.$refs.googleMap, this.mapConfig);

            //中心のピン詳細
            this.marker =  new this.google.maps.Marker({
                position: new this.google.maps.LatLng(this.mapConfig.center),
                map: this.Map,
            });

            //範囲の詳細
            this.nowMappin = new this.google.maps.Circle({
                center: new this.google.maps.LatLng(this.mapConfig.center),
                map: this.Map,
                radius: 150,
                strokeColor: '#eaf07900',
                fillColor: '#A58888',
            });

            //初期住所の名前取得
            axios.post('/api',this.mapConfig.center).then((response) => {
                if(response.data.results[0].formatted_address.substr( 13 ).length >=22){
                    this.addressName=response.data.results[0].formatted_address.substring(12,35)+"...";;
                }else{
                    this.addressName=response.data.results[0].formatted_address.substr( -13 );
                }
            })

            //Mapがクリックされた時のハンドラ
            this.Map.addListener('click',(e)=> {
                this.getMap(e);
            });

            //Mapのドラックされた時のハンドラ
            this.Map.addListener("dragend", () =>{
                var lat = this.Map.getCenter().lat()
                var lng = this.Map.getCenter().lng()
                var data = {lat,lng}
                this.totalFee.latlng = data;
                this.nowMappin.setMap(null);
                this.nowMappin = new this.google.maps.Circle({
                    center: new this.google.maps.LatLng(data),
                    map: this.Map,
                    radius: Number(document.getElementById("range").value),
                    strokeColor: '#A5888800',
                    fillColor: '#A58888',
                });
                this.marker.setMap(null)
                this.marker =  new this.google.maps.Marker({
                    position: new this.google.maps.LatLng(data),
                    map: this.Map,
                });
            });
        },

        //Mapの住所名取得
        getMap(e){
            const data = {
                lat:Number(e.latLng.lat()),
                lng:Number(e.latLng.lng())
            }
            axios.post('/api',data).then((response) => {
                if(response.data.results[0].formatted_address.substr( 13 ).length >=22){
                    this.addressName=response.data.results[0].formatted_address.substring(12,35)+"...";;
                }else{
                    this.addressName=response.data.results[0].formatted_address.substr( -13 );
                }
            })
        },

        //時間エラーメッセージ
        errMessage(){
            if(this.errActive){
                this.errActive=false;

            }else{
                this.errActive=true;
            }

        },

        //範囲エラーメッセージ
        errMessage2(){
            if(this.errActive2){
                this.errActive2=false;

            }else{
                this.errActive2=true;
            }

        },

        //カレンダーピッカーの表示切り替え
        datePicker(){
            this.calendarPicker=false;
        },

        //日付データのフォーマット
        formatDate(date) {
            if (!date) return null;
            const day = format(date, 'yyyy-MM-dd');
            var str = day;
            var result =day.replace('-', '/')

            while(result !== str) {
                str = str.replace('-', '/');
                result = result.replace('-', '/');
            }
            this.text =result;
            this.calendarPicker = true
        },

        //範囲選択値の更新
        changeRange(){
            this.nowMappin.setMap(null);
            this.nowMappin = new this.google.maps.Circle({
                center: new this.google.maps.LatLng( this.totalFee.latlng),
                map: this.Map,
                radius: Number(document.getElementById("range").value),
                strokeColor: '#A5888800',
                fillColor: '#A58888',
            });
            this.totalFee.radiusIndex=Number(document.getElementById("range").selectedIndex+1);
            this.Calculation();
        },

        //合計金額計算
        Calculation(){
            var str = String(100000 * 3 * this.totalFee.radiusIndex);
            var num=[];
            for (let i = 0; i < str.length; i += 3) {
                num.unshift(str.substring(str.length-3-i,str.length-i));
            }
            this.sumval = num.join(",");

            gsap.to(document.getElementById("val"), {
                y: -250,
                opacity: 0,
            })
            gsap.to(document.getElementById("val"), {
                y: 0,
                opacity: 1,
                duration: 0.5,
                ease: "bounce"
            })
        },

        //現在地の戻るボタン
        backAddress(){
            this.nowMappin.setMap(null);
            this.nowMappin = new this.google.maps.Circle({
                center: new this.google.maps.LatLng(this.mapConfig.center),
                map: this.Map,
                radius: Number(document.getElementById("range").value),
                strokeColor: '#A5888800',
                fillColor: '#A58888',
            });
            this.marker.setMap(null)
            this.marker =  new this.google.maps.Marker({
                position: new this.google.maps.LatLng(this.mapConfig.center),
                map: this.Map,
            });
            this.Map.panTo(new this.google.maps.LatLng(this.mapConfig.center));
        }
    }
}
</script>

<style lang="scss">
    .reservePage_main{
        display: flex;
        height: calc(100vh - 80px - 64px);
        padding: 32px 0 32px 32px;

        .map{
            position: relative;
            width: 70%;
            height: 100%;

            #map{
                width: 100%;
                height: 100%;

            }
            .mapimg{
                position: absolute;
                right: 0px;
                bottom:0px
            }
            .trigger{
                position: absolute;
                bottom:calc(50% - 50px);
                right:calc(50% - 26px);
                font-size: 5em;
                opacity: 0.5;
                font-weight: 100;
                user-select: none;

            }

        }
        .reservePage_inputform{
            position: relative;
            width: 480px;
            height: 100%;

            .reservePage_inputform_forms{
                display: flex;
                justify-content: space-between;
                align-items: center;
                height: 64px;
                width: 420px;
                padding: 0 30px;
                background-color: #fff;
                margin-bottom: 32px;

                .reservePage_inputform_forms_box{
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    width: 50px;
                    position: relative;

                    .reservePage_inputform_forms_box_exclamation{
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        border: solid 1px red;
                        width: 12px;
                        height: 12px;
                        font-size: 0.75rem;
                        border-radius: 10px;
                        text-align: center;

                        p{
                            user-select: none;
                            color: red;
                            font-size: 0.75em;

                        }
                    }
                    .reservePage_inputform_forms_box_errmessage{
                        position: absolute;
                        background-color: #eaf079;
                        width: 250px;
                        height: auto;
                        padding: 15px;
                        right: 70px;

                        p{
                            color: #00473E;

                        }
                    }
                    .reservePage_inputform_forms_box_errmessage:before {
                        content: "";
                        position: absolute;
                        top: 50%;
                        left: 100%;
                        margin-top: -10px;
                        border: 10px solid transparent;
                        border-left: 15px solid #eaf079;
                        pointer-events: none;

                    }
                }
                .reservePage_inputform_forms_box_title{
                    color: #00473E;

                }
                .range{
                    border:solid 0px;
                    font-weight: 500;
                    color: #333;
                    font-size: 1.25em;
                    outline: none;
                    text-align: right;

                }
            }
            .reservePage_inputform_forms_money{
                display: flex;
                justify-content: space-between;
                align-items: flex-end;
                width: 400px;
                padding: 0 40px;
                height: 200px;

                .reservePage_inputform_forms_money_text{
                    p{
                        color: #333;
                        font-weight: 500;

                    }
                }
                .reservePage_inputform_forms_money_sum{
                    display: flex;
                    align-items: flex-end;
                    p{
                        color: #333;
                        font-weight: 900;
                        font-size:1.75em;

                    }
                    .first{
                        font-size:1.25em;
                        margin-bottom: 4px;

                    }
                }

            }
            .reservePage_inputform_forms_next{
                position: absolute;
                bottom:0px;

                button{
                    width: 448px;
                    height: 68px;
                    background-color: #FAAE2B;
                    border: none;
                    color: #fff;
                    font-size: 1.25rem;
                    font-weight: 800;
                    border-radius: 5px;
                    margin: 0 16px;

                }
            }
        }
        .reservePage_inputform_calendar{
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 20;

            .calendar{

                position: absolute;
                top:-20px;

            }
        }
    }

    .errActive,.calendarActive{
        visibility: hidden;

    }

    .weight{
        font-weight: 800;
        user-select: none;
        color: #333;
    }

</style>
