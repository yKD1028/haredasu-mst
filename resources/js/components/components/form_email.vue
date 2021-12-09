<template>
    <div class="form_wrap">
        <input class="form_pc" type="text" v-model="email" :placeholder="placeholder">
        <label for="form_pc" class="form_title">{{form_title}}</label>
        <span class="form_error">{{errors.email}}</span>
    </div>
</template>

<script>
export default {
    props: {
        placeholder: { type: String, required: false },
        form_title: { type:String },
    },
    data () {
        return {
        email: '',
        errors: {}
        }
    },
    computed: {
        isDisabled() {
            return Object.keys(this.errors).length > 0 ? true : false
        }
    },
    watch: {
        email(email) {
            var pattern = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/;
            if(!email) {
                this.$set(this.errors, "email", 'メールアドレスを入力してください')
            } else if(!email.match(pattern)){
            // }else if(!email.match(/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/)) {
                this.$set(this.errors, "email", 'メールアドレスは半角英数、「XX@XX.XX」の形式で入力してください')
            } else {
                this.$delete(this.errors, 'email')
            }
        },
    }
}
</script>
