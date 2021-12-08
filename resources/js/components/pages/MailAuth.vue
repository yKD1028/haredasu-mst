<template>
    <div class="home_wrap">
      <p>はじめまして！</p>
      <p>メールアドレスで登録して晴れ予約を開始しましょう！</p>
        <div class="home_wrap">
            <Header></Header>
            <FormEmail placeholder="haredas@gmail.com" name="sample-input" type="text" form_title="メールアドレス"></FormEmail>
            <OrangeButton button_name="確認メールを送信"></OrangeButton>
        </div>
        <p>または</p>
        <p><a href="#">ログイン</a></p>
    </div>
</template>

<script>
    import Header from "../components/Header.vue"
    import FormEmail from '../components/form_email.vue'
    import OrangeButton from '../components/button.vue'
    export default{
        components:{
            Header,
            FormEmail,
            OrangeButton,
        },
    }
</script>
