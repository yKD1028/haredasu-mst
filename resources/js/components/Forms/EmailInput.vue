<template>
  <div class="form" :class="formChange">
    <label for="email">メールアドレス</label>
    <input
      type="text"
      id="email"
      placeholder="haredas@gmail.com"
      v-model="email"
      v-on:focus="onFocus"
      v-on:blur="onBlur"
    />
    <div class="err_msg">{{ errors.email }}</div>
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
      email: "",
      formChange: "",
      errors: {},
    };
  },
  watch: {
    email(email) {
      var pattern = /^[A-Za-z\d_.@\-]*$/;
      var err = true;
      if (!email) {
        this.$set(this.errors, "email", "メールアドレスを入力してください。");
      } else if (!email.match(pattern)) {
        this.$set(
          this.errors,
          "email",
          "メールアドレスに使用できない文字が含まれています。"
        );
      } else if (email.length > 50) {
        this.$set(this.errors, "email", "メールアドレスが長すぎます。");
      } else {
        this.$delete(this.errors, "email");
        err = false;
      }

      if (err) {
        this.colorChange("form_err");
      } else {
        this.colorChange("form_focus");
      }
      this.$emit("err", err);
      this.$emit("input", email);
    },
  },
  mounted() {
    this.email = this.value;
  },
  methods: {
    colorChange: function (color) {
      this.formChange = color;
    },
    onFocus: function () {
      if (this.errors.email === undefined) {
        this.colorChange("form_focus");
      }
      this.$emit("err", false);
    },
    onBlur: function () {
      var pattern =
        /^[A-Za-z\d_.\-]{1,}@{1}[A-Za-z\d_\-]{1,}\.{1}[A-Za-z\d_.\-]{1,}$/;
      var err = true;
      if (this.email.match(pattern)) {
        this.colorChange("");
        err = false;
      } else if (this.errors.email) {
        this.colorChange("form_err");
      } else if (!this.email) {
        this.$set(this.errors, "email", "メールアドレスを入力してください。");
        this.colorChange("form_err");
      } else {
        this.$set(
          this.errors,
          "email",
          "メールアドレスは「XX@XX.XX」の形式で入力してください。"
        );
        this.colorChange("form_err");
      }
      this.$emit("err", err);
    },
  },
};
</script>
