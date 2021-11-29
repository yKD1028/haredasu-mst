<template>
    <button class="button_orange">{{button_name}}</button>
</template>

<script>
export default {
    name: "OrabgeButton",
    props: {
    button_name: { type: String },
  },
}
</script>
