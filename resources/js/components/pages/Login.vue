<template>
    <div>
        <Header></Header>
        <div class="formPage_wrap">
            <div class="title">おかえりなさい！</div>
            <div class="introduction">アカウントをお持ちですか？<br>ログインして晴れを予約しましょう！</div>
            <form>
                <Email></Email>
                <Pass></Pass>
                <div class="remember_wrap">
                    <input type="checkbox" id="remenber" name="">
                    <label for="remenber">ログイン状態を保持する</label>
                    <span><a href="/change_pass">パスワードを忘れた？</a></span>
                </div>
                <SubmitButton buttonName="ログイン"></SubmitButton>
            </form>
            <div class="link_wrap">
                <div>または</div>
                <div><a href="/user_regist1">アカウントを作成</a></div>
            </div>
        </div>
    </div>
</template>

<script>
    import Header from '../components/Header.vue'
    import Email from '../Forms/EmailInput.vue'
    import Pass from '../Forms/PasswordInput.vue'
    import SubmitButton from '../SubmitButton.vue'
    export default{
        components:{
            Header,
            Email,
            Pass,
            SubmitButton,
        },
    }
</script>
