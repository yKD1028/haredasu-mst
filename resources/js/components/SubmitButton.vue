<template>
    <button class="button">{{ buttonName }}</button>
        <!-- <button class="button_orange" type="submit" :disabled="isDisabled"><span class="button_chara">{{button_name}}</span></button> -->
</template>

<script>
export default {
    props: {
        buttonName: { type: String },
    },
}
</script>
