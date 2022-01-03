<template>
    <div>
        <tel></tel>
        <email></email>
        <zip></zip>
        <userAddress></userAddress>
        <SubmitButton buttonName="変更"></SubmitButton>
    </div>
</template>
<script>
    import tel from '../../Forms/TelInput.vue'
    import email from '../../Forms/EmailInput.vue'
    import zip from '../../Forms/ZipInput.vue'
    import userAddress from '../../Forms/AddressInput.vue'
    import SubmitButton from '../../SubmitButton.vue'
    export default{
        data () {
            return {
            }
        },
        components:{
            tel,
            email,
            zip,
            userAddress,
            SubmitButton,
        },
    }
</script>
