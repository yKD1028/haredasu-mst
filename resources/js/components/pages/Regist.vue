<template>
    <div>
        <Header></Header>
        <h1>基本情報入力</h1>
        <p>快適な晴れ体験のために<br>あなたのことを教えてください。</p>
        <FormPc placeholder="晴れ出す太郎" name="sample-input" type="text" form_title="タイトルテスト"></FormPc>
        <OrangeButton button_name="ボタンだよ"></OrangeButton>
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
