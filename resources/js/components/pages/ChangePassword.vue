<template>
    <div class="home_wrap">
        <div class="home_wrap">
            <Header></Header>
            <p>パスワード変更</p>
            <p>パスワードは半角英数含め、<br>8字以上で入力してください。</p>
            <FormPassCheck></FormPassCheck>
            <OrangeButton button_name="登録"></OrangeButton>
        </div>
    </div>
</template>

<script>
    import Header from "../components/Header.vue"
    import FormPassCheck from '../components/form_password_check.vue'
    import OrangeButton from '../components/button.vue'
    export default{
        components:{
            Header,
            FormPassCheck,
            OrangeButton,
        },
    }
</script>
