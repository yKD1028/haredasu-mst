<template>
    <div class="form_wrap">
        <!--<input type="text" placeholder={{form_placeholder}} class="form_black">-->
        <input class="form_pc" :type="type" :name="name" :value="value" :placeholder="placeholder" @input="updateValue" />
        <p class="form_title">{{form_title}}</p>
    </div>
</template>

<script>
export default {
    props: {
    value: { type: String, required: true },
    type: { type: String, required: true },
    name: { type: String, required: true },
    placeholder: { type: String, required: false },
    form_title: { type:String },
  },
}
</script>
