<template>
    <div class="home_wrap">
        <div class="home_wrap">
            <Header></Header>
            <Situation></Situation>
            <Question></Question>
        </div>
    </div>
</template>

<script>
    import Header from "../components/Header.vue"
    import Situation from '../components/situation.vue'
    import Question from '../components/home_question.vue'
    export default{
        components:{
            Header,
            Situation,
            Question,
        },
    }
</script>
