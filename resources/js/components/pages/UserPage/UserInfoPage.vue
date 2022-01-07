<template>
    <div>
        <tel></tel>
        <email></email>
        <zip></zip>
        <userAddress></userAddress>
        <!--btn-->
    </div>
</template>
<script>
    import tel from '../../Forms/TelInput.vue'
    import email from '../../Forms/EmailInput.vue'
    import zip from '../../Forms/ZipInput.vue'
    import userAddress from '../../Forms/AddressInput.vue'
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
        },
    }
</script>
