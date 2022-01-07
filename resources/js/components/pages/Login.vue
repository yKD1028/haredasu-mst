<template>
  <div style="height: 100%">
    <Header></Header>
    <div class="page-wrap">
      <div class="login-wrap">
        <div class="title-block">
          <!-- <div class="gray title">おかえりなさい！</div> -->
          <p class="gray title">おかえりなさい！</p>
          <p class="gray introduction">
            アカウントをお持ちですか？<br />
            ログインして晴れを予約しましょう！
          </p>
        </div>
        <div class="form-block">
          <Email
            :name="'email'"
            :value="email"
            @input="email = $event"
            @err="emailErr = $event"
          />
          <Pass :name="'password'" :value="password" @input="password = $event" @err="passErr = $event" />
          <div class="remember-block">
            <div>
              <input
                type="checkbox"
                id="remember"
                name="remember"
                v-model="remember"
              />
              <label class="black" for="remember">ログイン状態を保持する</label>
            </div>
            <a class="blue" href="/change_pass">パスワードを忘れた？</a>
          </div>
          <SubmitButton
            :isDisabled="isDisabled"
            @clickBtn="submit()"
            buttonName="ログイン"
          ></SubmitButton>
          <div class="others-block">
            <p class="black">または</p>
            <a class="blue" href="/user_regist1">アカウントを作成</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Header from "../components/Header.vue";
import Email from "../Forms/EmailInput.vue";
import Pass from "../Forms/PasswordInput.vue";
import SubmitButton from "../SubmitButton.vue";
export default {
  data() {
    return {
      //ここにvalueでセットする
      email: "",
      emailErr: true,
      password: "",
      passErr: true,
      isDisabled: true,
      remember: false,
    };
  },
  components: {
    Header,
    Email,
    Pass,
    SubmitButton,
  },
  methods: {
    submit() {
      console.log("submit success!");
      var url = "/login";
      var params = {
        email: this.email,
        password: this.password,
        remember: this.remember,
      };
      axios
        .post(url, params)
        .then(function (response) {
          //ログイン成功時
          console.log("seikou");
        })
        .catch(function (error) {
          //ログイン失敗時
          console.log("seikoujanai");
          var responseErrors = error.response.data.errors;
          var errors = {};

          for (var key in responseErrors) {
            errors[key] = responseErrors[key][0];
          }

          self.errors = errors;
          console.log(errors);
        });
    },
  },
  watch: {
    emailErr(emailErr) {
      if (!emailErr && !this.passErr) {
        this.isDisabled = false;
      } else {
        this.isDisabled = true;
      }
    },
    passErr(passErr) {
      if (!passErr && !this.emailErr) {
        this.isDisabled = false;
      } else {
        this.isDisabled = true;
      }
    },
  },
};
</script>
