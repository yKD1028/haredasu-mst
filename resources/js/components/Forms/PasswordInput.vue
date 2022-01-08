<template>
  <div class="form" :class="formChange" :value="value">
    <label for="password">{{ form_label }}</label>
    <input
      type="text"
      id="password"
      :placeholder="placeholder"
      v-model="password"
      v-on:focus="onFocus"
      v-on:blur="onBlur"
    />
    <div class="err_msg">{{ errors.password }}</div>
  </div>
</template>

<script>
export default {
  props: {
    form_label: {
      type: String,
      default: "パスワード",
    },
    placeholder: {
      type: String,
      default: "パスワード",
    },
    value: {
      type: String,
    },
  },
  data() {
    return {
      password: "",
      formChange: "",
      errors: {},
    };
  },
  mounted() {
    this.password = this.value;
  },
  methods: {
    colorChange: function (color) {
      this.formChange = color;
    },
    onFocus: function () {
      if (this.errors.password === undefined) {
        this.colorChange("form_focus");
      }
      this.$emit("err", false);
    },
    onBlur: function () {
      var pattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/;
      var err = true;
      if (this.password.match(pattern)) {
        this.colorChange("");
        var err = false;
      } else if (this.errors.password) {
        this.colorChange("form_err");
      } else if (!this.password) {
        this.$set(this.errors, "password", "パスワードを入力してください。");
        this.colorChange("form_err");
      } else {
        this.$set(
          this.errors,
          "password",
          "パスワードは8字以上、20字以内で入力してください。"
        );
        this.colorChange("form_err");
      }
      this.$emit("err", err);
    },
  },
  watch: {
    password(password) {
      var pattern1 = /^[A-Za-z\d]*$/;
      var pattern2 = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{2,}$/;
      var err = true;
      if (!password) {
        this.$set(this.errors, "password", "パスワードを入力してください。");
      } else if (!password.match(pattern1)) {
        this.$set(
          this.errors,
          "password",
          "パスワードには半角英数字しか利用できません。"
        );
      } else if (!password.match(pattern2)) {
        this.$set(
          this.errors,
          "password",
          "パスワードは半角英字と、数字の両方を含めてください。"
        );
      } else {
        this.$delete(this.errors, "password");
        err = false;
      }

      if (err) {
        this.colorChange("form_err");
      } else {
        this.colorChange("form_focus");
      }
      this.$emit("err", err);
      this.$emit("input", password);
    },
  },
};
</script>
