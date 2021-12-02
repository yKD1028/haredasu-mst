<template>
    <div class="home_wrap">
        <Header></Header>
        <Situation></Situation>
    </div>
</template>

<script>
    import Header from "../components/Header.vue"
    import Situation from '../components/situation.vue'
    export default{
        components:{
            Header,
            Situation,
        },
    }
</script>
