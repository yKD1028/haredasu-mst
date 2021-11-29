<template>
    <div>
        <Header></Header>
        <h1 class="test">Yano home max</h1>
        <form>
            <FormBlack placeholder="変更" name="sample-input" type="text" form_title="タイトルテスト"></FormBlack>
            <OrangeButton button_name="ボタンだよ"></OrangeButton>
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
