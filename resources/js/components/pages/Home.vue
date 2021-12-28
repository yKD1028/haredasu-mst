<template>
    <div class="home_wrap">
        <div class="home_wrap">
            <Header></Header>
            <Mainvisual></Mainvisual>
            <Situation></Situation>
            <Howto></Howto>
            <Sonohi></Sonohi>
            <Question></Question>
            <Business></Business>
        </div>
    </div>
</template>

<script>
    import Mainvisual from '../components/home_main.vue'
    import Header from "../components/Header.vue"
    import Situation from '../components/situation.vue'
    import Question from '../components/home_question.vue'
    import Howto from '../components/home_howto.vue'
    import Business from '../components/home_business.vue'
    import Sonohi from '../components/home_sonohi.vue'
    export default{
        components:{
            Header,
            Situation,
            Question,
            Howto,
            Business,
            Mainvisual,
            Sonohi,
        },
    }
</script>
