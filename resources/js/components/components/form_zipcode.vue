<template>
    <div class="form_wrap">
        <input class="form_pc" type="text" v-model="zipCode" :placeholder="placeholder">
        <label for="form_pc" class="form_title">{{form_title}}</label>
        <span class="form_error">{{errors.zipCode}}</span>
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
        zipCode: '',
        errors: {}
        }
    },
    computed: {
        isDisabled() {
            return Object.keys(this.errors).length > 0 ? true : false
        }
    },
    watch: {
        zipCode(zipCode) {
            if (!zipCode || !!zipCode.match(/^\d{7}$/)) {
                this.$delete(this.errors, 'zipCode')
            } else {
                this.$set(this.errors, "zipCode", '郵便番号が正しくありません。')
            }
        },
    }
}
</script>
