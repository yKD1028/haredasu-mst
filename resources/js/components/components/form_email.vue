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
        //form_phoneと同じ、未着手
        email(email) {
        if (!email || !!email.match(/^[0-9\-]+$/)) {
            this.$delete(this.errors, 'email')
        } else {
            this.$set(this.errors, "email", 'メールアドレスは○○の形式で入力してください')
        }
        },
    }
}
</script>
