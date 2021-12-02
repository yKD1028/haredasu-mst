<template>
    <div class="form_wrap">
        <!--<input type="text" placeholder={{form_placeholder}} class="form_black">
        <input class="form_pc" :type="type" :name="name" :value="value" :placeholder="placeholder" @input="updateValue" :v-model="form_v_model" />-->
        <input class="form_pc" type="text" v-model="phoneNumber" :placeholder="placeholder">
        <label for="form_pc" class="form_title">{{form_title}}</label>
        <span class="form_error">{{errors.phoneNumber}}</span>
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
        phoneNumber: '',
        errors: {}
        }
    },
    computed: {
        isDisabled() {
            return Object.keys(this.errors).length > 0 ? true : false
        }
    },
    watch: {
        phoneNumber(phoneNumber) {
        if (!phoneNumber || !!phoneNumber.match(/^[0-9\-]+$/)) {
            this.$delete(this.errors, 'phoneNumber')
        } else {
            this.$set(this.errors, "phoneNumber", '電話番号が正しくありません。')
        }
        },
    }
}
</script>
