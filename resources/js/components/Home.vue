<template>
    <div>
        <Header></Header>
        <h1>Yano home max</h1>
        <form>
            <FormBlack></FormBlack>
            <OrangeButton></OrangeButton>
        </form>
    </div>

</template>

<script>
    import Header from "./Header.vue"
    import OrangeButton from "./button.vue"
    import FormBlack from "./Form_black.vue"
    export default{
        components:{
            Header,
            OrangeButton,
            FormBlack
        }
    }
</script>
