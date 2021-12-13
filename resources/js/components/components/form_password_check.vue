<template>
    <div class="form_wrap">
        <div>
            <input class="form_pc" type="password" name="password" v-model="password" :placeholder="'パスワード'" :form_title="'パスワード'">
            <label for="form_pc" class="form_title">{{form_title}}</label>
            <span class="form_error">{{errors.password}}</span>
        </div>
        <div>
            <input class="form_pc" type="password" name="passwordCheck" v-model="passwordCheck" :placeholder="'パスワード確認'" :form_title="'パスワード確認'">
            <label for="form_pc" class="form_title">{{form_title}}</label>
            <span class="form_error">{{errors.passwordCheck}}</span>
        </div>
    </div>
</template>

<script>
export default {
    props: {
    },
    data () {
        return {
        password: '',
        passwordCheck: '',
        errors: {}
        }
    },
    computed: {
        isDisabled() {
            return Object.keys(this.errors).length > 0 ? true : false
        },

    },
    watch: {
        //バリデーション未着手
        password(passsword) {
            if (!password || !!password.match(/^[0-9\-]+$/)) {
                this.$delete(this.errors, 'password')
            } else {
                this.$set(this.errors, "password", 'パスワードは○○の形式で入力してください')
            }
        },
        passwordCheck(passwordCheck) {
            if (passwordCheck === this.password) {
                this.$delete(this.errors, 'passwordCheck')
            } else {
                this.$set(this.errors, "passwordCheck", 'パスワードが一致していません')
            }
        },
    },
}
</script>
