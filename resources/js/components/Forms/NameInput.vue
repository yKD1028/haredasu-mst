<template>
  <div class="form" :class="formChange">
    <label for="name">氏名</label>
    <input
      type="text"
      id="name"
      placeholder="晴れ出す太郎"
      v-model="name"
      v-on:focus="onFocus"
      v-on:blur="onBlur"
    />
    <div class="err_msg">{{ errors.name }}</div>
  </div>
</template>

<script>
export default {
  props: {
    value: {
      type: String,
    },
  },
  data() {
    return {
      name: "",
      formChange: "",
      errors: {},
    };
  },
  watch: {
    name(name) {
      //漢字カタカナひらがな全角半角英字大文字小文字
      //\u4E00-\u9FA0：漢字(一-龠)、u3005-3007：々〆〇(漢数字)、3041-3094：ひらがな、\u309D:ゝ\u309E:ゞ
      //30A1-30F6：カタカナ、30FB-30FE：・ーヽヾ
      var pattern =
        /^[A-Za-zＡ-Ｚａ-ｚ\u4E00-\u9FA0\u3005-\u3007\u3041-\u3094\u309D\u309E\u30A1-\u30F6\u30FB-\u30FE]+$/;
      var err = true;
      if (!name) {
        this.$set(this.errors, "name", "氏名を入力してください。");
      } else if (!name.match(pattern)) {
        this.$set(
          this.errors,
          "name",
          "氏名に使用できない文字が含まれています。"
        );
      } else if (name.length > 50) {
        this.$set(this.errors, "name", "氏名が長すぎます。");
      } else {
        this.$delete(this.errors, "name");
        err = false;
      }

      if (err) {
        this.colorChange("form_err");
      } else {
        this.colorChange("form_focus");
      }
      this.$emit("err", err);
      this.$emit("input", name);
    },
  },
  mounted() {
    this.name = this.value;
  },
  methods: {
    colorChange: function (color) {
      this.formChange = color;
    },
    onFocus: function () {
      if (this.errors.name === undefined) {
        this.colorChange("form_focus");
      }
      this.$emit("err", false);
    },
    onBlur: function () {
      var err = true;
      if (this.errors.name) {
        this.colorChange("form_err");
      } else if (!this.name) {
        this.$set(this.errors, "name", "氏名を入力してください。");
        this.colorChange("form_err");
      } else if (this.errors.name === undefined) {
        this.colorChange("");
        err = false;
      }
      this.$emit("err", err);
    },
  },
};
</script>
