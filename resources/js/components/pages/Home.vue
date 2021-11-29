<template>
    <div>
        <Header></Header>
        <h1 class="test">Yano home max</h1>
        <form>
            <FormPc placeholder="プレースホルダー" name="sample-input" type="text" form_title="タイトルテスト"></FormPc>
            <OrangeButton button_name="ボタンだよ"></OrangeButton>
        </form>
    </div>
</template>

<script>
    import Header from "../components/Header.vue"
    import OrangeButton from "../components/button.vue"
    import FormPc from "../components/Form_pc.vue"
    export default{
        components:{
            Header,
            OrangeButton,
            FormPc
        }
    }
</script>
