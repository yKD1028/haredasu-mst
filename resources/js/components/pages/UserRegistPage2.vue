<template>
  <div class="pages-wrap regist2-wrap">
    <div class="content-wrap">
      <div class="title-block">
        <p class="gray title">基本情報入力</p>
        <p class="gray introduction">
          快適な晴れ体験のために<br />あなたのことを教えてください
        </p>
      </div>
      <div class="form-block"></div>
      <Name></Name>
      <NameKana></NameKana>
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
      <SubmitButton buttonName="登録"></SubmitButton>
      <!-- @click="click" -->
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
      searchText: "",
    };
  },
  methods: {
    // click: function() {
    // }
  },
  computed: {

  },
  watch: {
    //   searchText(searchText){
    //       console.log(this.searchText);
    //   }
  },
};
</script>
