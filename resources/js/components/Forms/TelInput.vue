<template>
    <div class="form" :class="formChange">
        <label for="tel">電話番号</label>
        <input type="text" name="" id="tel" placeholder="000-0000-0000" v-mask="'###-####-####'" v-model="tel" v-on:focus="onFocus" v-on:blur="onBlur">
        <div class="err_msg">{{ errors.tel }}</div>
    </div>
</template>

<script>
export default {
    props: {
    },
    data () {
        return {
        tel: '',
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
            if(this.errors.tel === undefined){
                this.colorChange('form_focus');
            }
        },
        onBlur: function(){
            var pattern = /^0[789]{1}0[\-]{1}[\d]{4}[\-]{1}[\d]{4}/;
            if(this.tel.match(pattern)){
                this.colorChange('');
            } else if(this.errors.tel){
                this.colorChange('form_err');
            } else {
                this.$set(this.errors, 'tel', '電話番号を入力してください。');
                this.colorChange('form_err');
            }
        },
    },
    watch: {
        tel(tel) {
            var pattern = /^0[789]{1}0/;
            var err = true;
            if(!tel) {
                this.$set(this.errors, 'tel', '電話番号を入力してください。');
            }else if(!tel.match(pattern)){
                this.$set(this.errors, 'tel', '無効な電話番号です。正しい番号を入力してください。');
            }else {
                this.$delete(this.errors, 'tel');
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
