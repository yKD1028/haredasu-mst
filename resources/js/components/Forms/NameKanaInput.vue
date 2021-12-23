<template>
    <div>
        <div class="form" :class="formChange">
            <label for="nameKana">フリガナ</label>
            <input type="text" name="" id="nameKana" placeholder="ハレダスタロウ" v-model="nameKana" v-on:focus="onFocus" v-on:blur="onBlur">
            <div class="err_msg">{{ errors.nameKana }}</div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
    },
    data () {
        return {
        nameKana: '',
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
            if(this.errors.nameKana === undefined){
                this.colorChange('form_focus');
            }
        },
        onBlur: function(){
            if(this.errors.nameKana){
                this.colorChange('form_err');
            }else if(!this.nameKana) {
                this.$set(this.errors, 'nameKana', 'フリガナを入力してください。');
                this.colorChange('form_err');
            } else if(this.errors.nameKana === undefined){
                this.colorChange('');
            }
        },
    },
    watch: {
        nameKana(nameKana) {
            var pattern = /^[\u30A1-\u30F6\u30FB-\u30FC]+$/;
            var err = true;
            if(!nameKana) {
                this.$set(this.errors, 'nameKana', 'フリガナを入力してください。');
            } else if(!nameKana.match(pattern)) {
                this.$set(this.errors, 'nameKana', 'フリガナは全角カタカナで入力してください。');
            } else if(nameKana.length > 50) {
                this.$set(this.errors, 'nameKana', 'フリガナが長すぎます。');
            } else {
                this.$delete(this.errors, 'nameKana');
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
