<template>
    <div>
        <div class="sample1">基本情報入力</div>
        <div class="sample2">快適な晴れ体験のために<br>あなたのことを教えてください</div>
        <form action="/regist_user_info" method="post">
            <Name></Name>
            <NameKana></NameKana>
            <Tel></Tel>
            <PassCheck></PassCheck>
            <Zip></Zip>
            <Address></Address>
            <OrangeButton button_name="登録"></OrangeButton>
        </form>
    </div>
</template>
<script>
    import Name from '../Forms/NameInput.vue'
    import NameKana from '../Forms/NameKanaInput.vue'
    import Tel from '../Forms/TelInput.vue'
    import PassCheck from '../Forms/PasswordCheckInput.vue'
    import Zip from '../Forms/ZipInput.vue'
    import Address from '../Forms/AddressInput.vue'
    import OrangeButton from '../components/button.vue'
    export default{
        components:{
            Name,
            NameKana,
            Tel,
            PassCheck,
            Zip,
            Address,
            OrangeButton,
        },
    }
</script>
