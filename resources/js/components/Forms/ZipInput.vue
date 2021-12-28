<template>
    <div class="form" :class="formChange">
        <label for="zip">郵便番号</label>
        <input type="text" name="" id="zip" placeholder="000-0000" v-mask="'###-####'" v-model="zip" v-on:focus="onFocus" v-on:blur="onBlur">
        <div class="err_msg">{{ errors.zip }}</div>
    </div>
</template>

<script>
export default {
    props: {
    },
    data () {
        return {
        zip: '',
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
            if(this.errors.zip === undefined){
                this.colorChange('form_focus');
            }
        },
        onBlur: function(){
            var pattern = /^[\d]{3}[\-]{1}[\d]{4}/;
            if(this.zip.match(pattern)){
                this.colorChange('');
            } else {
                this.$set(this.errors, 'zip', '郵便番号を入力してください。');
                this.colorChange('form_err');
            }
        },
    },
    watch: {
        zip(zip) {
            var err = true;
            if(!zip) {
                this.$set(this.errors, 'zip', '郵便番号を入力してください。');
            } else {
                this.$delete(this.errors, 'zip');
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
