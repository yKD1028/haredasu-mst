<template>
    <button class="button">{{ buttonName }}</button>
</template>
<script>
export default {
    props: {
        buttonName: { type: String },
    },
}
</script>
