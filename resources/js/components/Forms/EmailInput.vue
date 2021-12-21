<template>
    <div :class="form">
        <label for="email">メールアドレス</label>
        <input type="text" name="" id="email" placeholder="haredas@gmail.com" v-model="email" v-on:focus="onFocus" v-on:blur="onBlur">
        <div class="err_msg">{{ errors.email }}</div>
    </div>
</template>

<script>
export default {
    props: {
    },
    data () {
        return {
        email: '',
        form: 'form',
        errors: {}
        }
    },
    computed: {
    },
    methods: {
        colorChange: function (color){
            this.form = color;
        },
        onFocus: function(){
            if(this.errors.email === undefined){
                this.colorChange('form_focus');
            }
        },
        onBlur: function(){
            // if (!this.email) {
            //     this.$delete(this.errors, 'email');
            //     this.colorChange('form');
            // }else {
                if(this.errors.email === undefined) {
                    this.colorChange('form');
                }
            // }
        },
    },
    watch: {
        email(email) {
            var pattern1 = /^[A-Za-z\d_.@\-]*$/;
            var pattern2 = /^.{1,}@{1}.{1,}\.{1}.{1,}$/;
            var err = true;
            if(!email) {
                this.$set(this.errors, 'email', 'メールアドレスを入力してください。');
            } else if(!email.match(pattern1)) {
                this.$set(this.errors, 'email', 'メールアドレスに使用できない文字が含まれています。');
            } else if(email.length > 50) {
                this.$set(this.errors, 'email', 'メールアドレスが長すぎます。');
            } else if(!email.match(pattern2)) {
                this.$set(this.errors, 'email', 'メールアドレスは「XX@XX.XX」の形式で入力してください。');
            } else {
                this.$delete(this.errors, 'email');
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
