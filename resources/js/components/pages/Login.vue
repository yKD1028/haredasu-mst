<template>
    <div class="home_wrap">
        <div class="home_wrap">
            <Header></Header>
            <p>おかえりなさい！</p>
            <p>アカウントをお持ちですか？</p>
            <p>ログインして晴れを予約しましょう！</p>
            <FormEmail placeholder="haredas@gmail.com" name="email" form_title="メールアドレス"></FormEmail>
            <FormPass placeholder="password" name="password" form_title="パスワード"></FormPass>
            <div class="remenber_check">
                <input type="checkbox" id="remenber" name="remenber" v-model="formCheck">
                <label for="remenber">ログイン状態を保持する</label>
                <span><a href="/change_pass">パスワードを忘れた？</a></span>
            </div>
            <OrangeButton button_name="ログイン"></OrangeButton>
            <p>または</p>
            <p><a href="/mail_auth">アカウントを作成</a></p>
        </div>
    </div>
</template>

<script>
    import Header from "../components/Header.vue"
    import FormEmail from '../components/form_email.vue'
    import FormPass from '../components/form_password.vue'
    import OrangeButton from '../components/button.vue'
    export default{
        components:{
            Header,
            FormEmail,
            FormPass,
            OrangeButton,
        },
    }
</script>
