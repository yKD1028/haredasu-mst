<template>
    <button class="button_orange"><span class="button_chara">{{button_name}}</span></button>
</template>

<script>
export default {
    name: "OrabgeButton",
    props: {
    button_name: { type: String },
  },
}
</script>
