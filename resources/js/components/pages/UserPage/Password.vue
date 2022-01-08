<template>
  <div>
    <Password
      form_label="現在のパスワード"
      name="old_pass"
      placeholder="現在のパスワード"
    />
    <PassCheck
      form_label1="新しいパスワード"
      name1="new_pass"
      placeholder1="新しいパスワード"
      form_label2="新しいパスワード(確認用)"
      name2="new_pass_check"
      placeholder2="新しいパスワード(確認用)"
    />
    <SubmitButton buttonName="変更" />
  </div>
</template>
<script>
import Password from "../../Forms/PasswordInput.vue";
import PassCheck from "../../Forms/PasswordCheckInput.vue";
import SubmitButton from "../../SubmitButton.vue";
export default {
  data() {
    return {};
  },
  components: {
    Password,
    PassCheck,
    SubmitButton,
  },
};
</script>
