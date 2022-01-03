<template>
    <div>
        <Header></Header>
        <div class="form-page-wrap">
            <div class="title">はじめまして！</div>
            <div class="introduction">メールアドレスで登録して<br>晴れ予約を開始しましょう！</div>
            <form>
                <Email></Email>
                <SubmitButton buttonName="確認メールを送信"></SubmitButton>
            </form>
            <div class="link_wrap">
                <div>または</div>
                <div><a href="/login">ログイン</a></div>
            </div>
        </div>

    </div>
</template>
<script>
    import Header from "../components/Header.vue"
    import Email from '../Forms/EmailInput.vue'
    import SubmitButton from '../SubmitButton.vue'
    export default{
        components:{
            Header,
            Email,
            SubmitButton,
        },
    }
</script>
