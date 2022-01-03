<template>
    <div>
        <Header></Header>
        <div class="formPage_wrap">
            <div class="title">基本情報入力</div>
            <div class="introduction">快適な晴れ体験のために<br>あなたのことを教えてください</div>
            <!-- <form action="/regist_user_info" method="post"> -->
            <form>
                <Name></Name>
                <NameKana></NameKana>
                <Tel></Tel>
                <PassCheck></PassCheck>
                <Zip></Zip>
                <Address></Address>
                <SubmitButton buttonName="登録"></SubmitButton>
                <!-- @click="click" -->
            </form>
        </div>
    </div>
</template>
<script>
    import Header from '../components/Header.vue'
    import Name from '../Forms/NameInput.vue'
    import NameKana from '../Forms/NameKanaInput.vue'
    import Tel from '../Forms/TelInput.vue'
    import PassCheck from '../Forms/PasswordCheckInput.vue'
    import Zip from '../Forms/ZipInput.vue'
    import Address from '../Forms/AddressInput.vue'
    import SubmitButton from '../SubmitButton.vue'
    export default{
        components:{
            Header,
            Name,
            NameKana,
            Tel,
            PassCheck,
            Zip,
            Address,
            SubmitButton,
        },
        methods: {
            // click: function() {

            // }
        },
    }
</script>
