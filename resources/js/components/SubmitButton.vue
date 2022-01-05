<template>
    <button class="button submit-button">{{ buttonName }}</button>
</template>

<script>
export default {
    props: {
        buttonName: { type: String },
    },
}
</script>
