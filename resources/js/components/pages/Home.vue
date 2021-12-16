<template>
    <div class="home_wrap">
        <div class="home_wrap">
            <Header></Header>
            <Situation></Situation>
            <Question></Question>
            <Howto></Howto>
            <p>footer</p>
        </div>
    </div>
</template>

<script>
    import Header from "../components/Header.vue"
    import Situation from '../components/situation.vue'
    import Question from '../components/home_question.vue'
    import Howto from '../components/home_howto.vue'
    export default{
        components:{
            Header,
            Situation,
            Question,
            Howto,
        },
    }
</script>
