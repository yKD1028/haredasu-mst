<template>
  <div class="pages-wrap regist2-wrap">
    <div class="content-wrap">
      <div class="title-block">
        <p class="gray title">基本情報入力</p>
        <p class="gray introduction">
          快適な晴れ体験のために<br />あなたのことを教えてください
        </p>
      </div>
      <div class="form-block">
        <Name
          :value="name"
          @input="name = $event"
          @err="nameErr = $event"
        ></Name>
        <NameKana
          :value="nameKana"
          @input="nameKana = $event"
          @err="nameKanaErr = $event"
        ></NameKana>
        <Tel></Tel>
        <PassCheck
          form_label1="パスワード"
          name1="pass"
          placeholder1="パスワード"
          form_label2="確認用パスワード"
          name2="pass_check"
          placeholder2="確認用パスワード"
        ></PassCheck>
        <Zip></Zip>
        <Address></Address>
        <SubmitButton
          :isDisabled="isDisabled"
          @clickBtn="submit()"
          buttonName="登録"
        ></SubmitButton>
      </div>
    </div>
  </div>
</template>
<script>
import Name from "../Forms/NameInput.vue";
import NameKana from "../Forms/NameKanaInput.vue";
import Tel from "../Forms/TelInput.vue";
import PassCheck from "../Forms/PasswordCheckInput.vue";
import Zip from "../Forms/ZipInput.vue";
import Address from "../Forms/AddressInput.vue";
import SubmitButton from "../SubmitButton.vue";
export default {
  components: {
    Name,
    NameKana,
    Tel,
    PassCheck,
    Zip,
    Address,
    SubmitButton,
  },
  data() {
    return {
      name: "",
      nameErr: true,
      nameKana: "",
      nameKanaErr: true,
      tel: "",
      telErr: true,
      password: "",
      passErr: true,
      passCheck: "",
      passCheckErr: true,
      zip: "",
      zipErr: true,
      address: "",
      addressErr: true,
      isDisabled: true,
    };
  },
  watch: {
    nameErr(nameErr) {
      if (!nameErr && !this.nameKanaErr) {
        this.isDisabled = false;
      } else {
        this.isDisabled = true;
      }
    },
    nameKanaErr(nameKanaErr){
        if (!nameKanaErr && !this.nameErr) {
        this.isDisabled = false;
      } else {
        this.isDisabled = true;
      }
    }
  },
  methods: {
    // click: function() {
    // }
  },
};
</script>
