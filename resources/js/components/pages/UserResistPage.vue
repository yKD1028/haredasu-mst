<template>
    <form>
        <div class="sample1">はじめまして！</div>
        <div class="sample2">メールアドレスで登録して<br>晴れ予約を開始しましょう！</div>
        <Email></Email>
        <div>
            <OrangeButton button_name="新規登録"></OrangeButton>
            <div>または</div>
            <div><a href="#">ログイン</a></div>
        </div>
    </form>
</template>
<script>
    import Header from "../components/Header.vue"
    import Email from '../Forms/EmailInput.vue'
    import OrangeButton from '../components/button.vue'
    export default{
        components:{
            Header,
            Email,
            OrangeButton,
        },
    }
</script>
