<template>
    <div>
        <Header></Header>
        <div class="mypage">
            <MyMap></MyMap>
            <MyWeather></MyWeather>
            <Button class="reserve" button_name="予約"></Button>
        </div>
    </div>

</template>

<script>
    import Header from "../components/Header.vue"
    import MyMap from "../components/mypage_map.vue"
    import MyWeather from "../components/mypage_weather.vue"
    import Button from "../components/button.vue"
    export default{
        components:{
            Header,
            MyMap,
            MyWeather,
            Button
        }
    }
</script>
