<template>
    <div>
        <password></password>
        <passCheck></passCheck>
        <SubmitButton buttonName="変更"></SubmitButton>
    </div>
</template>
<script>
    import password from '../../Forms/PasswordInput.vue'
    import passCheck from '../../Forms/PasswordCheckInput.vue'
    import SubmitButton from '../../SubmitButton.vue'
    export default{
        data () {
            return {
            }
        },
        components:{
            password,
            passCheck,
            SubmitButton,
        },
    }
</script>
