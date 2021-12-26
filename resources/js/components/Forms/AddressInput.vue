<template>
    <div class="form" :class="formChange">
        <label for="address">住所</label>
        <input type="text" name="" id="address" placeholder="住所" v-model="address" v-on:focus="onFocus" v-on:blur="onBlur">
        <div class="err_msg">{{ errors.address }}</div>
    </div>
</template>

<script>
export default {
    props: {
    },
    data () {
        return {
        address: '',
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
            if(this.errors.address === undefined){
                this.colorChange('form_focus');
            }
        },
        onBlur: function(){
            if(this.errors.address){
                this.colorChange('form_err');
            }else if(!this.address) {
                this.$set(this.errors, 'address', '住所を入力してください。');
                this.colorChange('form_err');
            } else if(this.errors.address === undefined){
                this.colorChange('');
            }
        },
    },
    watch: {
        address(address) {
            var err = true;
            if(!address) {
                this.$set(this.errors, 'address', '住所を入力してください。');
            } else if(address.length > 100){
                this.$set(this.errors, 'address', '住所が長すぎます。');
            }else {
                this.$delete(this.errors, 'address');
                err = false;
            }

            if(err) {
                this.colorChange('form_err');
            }else {
                this.colorChange('form_focus');
            }
        },
    },
}
</script>
