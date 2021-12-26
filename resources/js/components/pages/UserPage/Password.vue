<template>
    <div>
        <password></password>
        <passCheck></passCheck>
    </div>
</template>
<script>
    import password from '../../Forms/PasswordInput.vue'
    import passCheck from '../../Forms/PasswordCheckInput.vue'
    export default{
        data () {
            return {
            }
        },
        components:{
            password,
            passCheck,
        },
    }
</script>
