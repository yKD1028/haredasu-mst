<template>
    <div class="form_wrap">
        <div>
            <input class="form_pc" type="password" name="password" v-model="password" v-on:blur="onBlur" :placeholder="'パスワード'" :form_title="'パスワード'">
            <label for="form_pc" class="form_title">{{form_title}}</label>
            <span class="form_error">{{errors.password}}</span>
        </div>
        <div>
            <input class="form_pc" type="password" name="passwordCheck" v-model="passwordCheck" v-on:blur="onBlur" :placeholder="'パスワード確認'" :form_title="'パスワード確認'">
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
    methods: {
        onBlur: function(){
            if (!this.password) {
                this.$delete(this.errors, 'password')
            }
            if(!this.passwordCheck) {
                this.$delete(this.errors, 'passwordCheck')
            }
        },
    },

    watch: {
        password(password) {
            //半角英字数字それぞれ1字以上、計8字以上一括判定
            // var pattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
            // if(!password) {
            //     this.$set(this.errors, 'password', 'パスワードを入力してください。')
            // } else if(!password.match(pattern)) {
            //     this.$set(this.errors, 'password','パスワードは半角英数含め、8字以上で入力してください。')
            // } else {
            //     this.$delete(this.errors, 'password')
            // }
            var pattern1 = /^[A-Za-z0-9]*$/;
            var pattern2 = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/;
            var pattern3 = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{2,}$/
            if(!password) {
                this.$set(this.errors, 'password', 'パスワードを入力してください。')
            } else if(!password.match(pattern1)) {
                this.$set(this.errors, 'password', 'パスワードには半角英数字しか利用できません。')
            } else if(!password.match(pattern2)) {
                var err1 = '', err2 = '';
                if(!password.match(pattern3)){
                    err1 = 'パスワードは半角英字と、数字の両方を含めてください。';
                }
                if (password.length < 8 || password.length > 20) {
                    err2 = 'パスワードは8字以上、20字以内で入力してください。';
                }
                this.$set(this.errors, 'password', err1 + err2)
            } else {
                this.$delete(this.errors, 'password')
                if(this.passwordCheck && password !== this.passwordCheck){
                    this.$set(this.errors, "passwordCheck", 'パスワードが一致していません')
                } else{
                    this.$delete(this.errors, 'passwordCheck')
                }
            }
        },
        passwordCheck(passwordCheck) {
            if (passwordCheck !== this.password) {
                this.$set(this.errors, "passwordCheck", 'パスワードが一致していません')
            } else {
                this.$delete(this.errors, 'passwordCheck')
            }
        },
    },
}
</script>
