<template>
    <div class="form_wrap">
        <input class="form_pc" type="password" v-model="password" :placeholder="placeholder">
        <label for="form_pc" class="form_title">{{form_title}}</label>
        <span class="form_error">{{errors.password}}</span>
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
        password: '',
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
        password(passsword) {
        if (!email || !!email.match(/^[0-9\-]+$/)) {
            this.$delete(this.errors, 'password')
        } else {
            this.$set(this.errors, "password", 'パスワードは○○の形式で入力してください')
        }
        },
    },
}
</script>
