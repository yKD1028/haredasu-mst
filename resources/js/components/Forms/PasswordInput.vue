<template>
    <div class="form" :class="formChange">
        <label for="password">{{ form_label }}</label>
        <input type="text" :name="name" id="password" :placeholder="placeholder" v-model="password" v-on:focus="onFocus" v-on:blur="onBlur">
        <div class="err_msg">{{ errors.password }}</div>
    </div>
</template>

<script>
export default {
    props: {
        form_label: { type: String, required: true },
        name: { type: String, required: true },
        placeholder: { type: String, required: true },
    },
    data () {
        return {
        password: '',
        formChange: '',
        errors: {}
        }
    },
    computed: {
    },
    methods: {
        colorChange: function (color){
            this.formChange = color;
        },
        onFocus: function(){
            if(this.errors.password === undefined){
                this.colorChange('form_focus');
            }
        },
        onBlur: function(){
            var pattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/;
            if(this.password.match(pattern)){
                this.colorChange('');
            } else if(this.errors.password){
                this.colorChange('form_err');
            }else if(!this.password){
                this.$set(this.errors, 'password', 'パスワードを入力してください。');
                this.colorChange('form_err');
            } else {
                this.$set(this.errors, 'password', 'パスワードは8字以上、20字以内で入力してください。');
                this.colorChange('form_err');
            }
        },
    },
    watch: {
        password(password) {
            var pattern1 = /^[A-Za-z\d]*$/;
            var pattern2 = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{2,}$/;
            var err = true;
            if(!password) {
                this.$set(this.errors, 'password', 'パスワードを入力してください。');
            } else if(!password.match(pattern1)) {
                this.$set(this.errors, 'password', 'パスワードには半角英数字しか利用できません。');
            } else if(!password.match(pattern2)) {
                this.$set(this.errors, 'password', 'パスワードは半角英字と、数字の両方を含めてください。');
            } else {
                this.$delete(this.errors, 'password');
                err = false;
            }

            if(err) {
                this.colorChange('form_err');
            }else {
                this.colorChange('form_focus');
            }
        },
    }
}
</script>
