<template>
  <div>
    <Tel />
    <Email />
    <Zip />
    <Address />
    <SubmitButton buttonName="変更" />
  </div>
</template>
<script>
import Tel from "../../Forms/TelInput.vue";
import Email from "../../Forms/EmailInput.vue";
import Zip from "../../Forms/ZipInput.vue";
import Address from "../../Forms/AddressInput.vue";
import SubmitButton from "../../SubmitButton.vue";
export default {
  data() {
    return {};
  },
  components: {
    Tel,
    Email,
    Zip,
    Address,
    SubmitButton,
  },
};
</script>
