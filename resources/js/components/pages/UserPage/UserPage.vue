<template>
  <div class="user-page-wrap">
    <div class="content-wrap">
      <!-- 縦に並ぶ -->
      <div class="title-block">
        <!-- tabsの選択に合わせて表示切替 -->
        <p v-if="screen == 0" class="title">ユーザー情報</p>
        <p v-else-if="screen == 1" class="title">パスワード</p>
        <p v-else-if="screen == 2" class="title">支払い情報</p>
        <p v-else class="title">予約履歴</p>
      </div>
      <div class="main-block">
        <!-- tabsとscreensは横並び -->
        <div class="tabs">
          <!-- tate -->
          <!-- 選択時にクラス追加 -->
          <p class="tab" :class="selected1" @click="changeScreen(0)">
            ユーザー情報
          </p>
          <p class="tab" :class="selected2" @click="changeScreen(1)">
            パスワード
          </p>
          <p class="tab" :class="selected3" @click="changeScreen(2)">
            支払い情報
          </p>
          <p class="tab" :class="selected4" @click="changeScreen(3)">
            予約履歴
          </p>
        </div>
        <div class="screen">
          <!-- pagecomponent切替 -->
          <UserInfo v-if="screen == 0" />
          <Password v-else-if="screen == 1" />
          <Payment v-else-if="screen == 2"/>
          <RHistory v-else />
        </div>
      </div>
    </div>

  </div>
</template>
<script>
import Header from "../../components/Header.vue";
import UserInfo from "./UserInfoPage.vue";
import Password from "./Password.vue";
import Payment from "./Payment.vue";
import RHistory from "./ReservationHistory.vue";
export default {
  data() {
    return {
      screen: 0,
      selected0: "selected",
      selected1: "",
      selected2: "",
      selected3: "",
    };
  },
  components: {
    Header,
    UserInfo,
    Password,
    Payment,
    RHistory,
  },
  methods: {
    changeScreen(num) {
      this.screen = num;
      this.selected0 = "";
      this.selected1 = "";
      this.selected2 = "";
      this.selected3 = "";
      if (num == 0) {
        this.selected0 = "selected";
      } else if (num == 1) {
        this.selected1 = "selected";
      } else if (num == 2) {
        this.selected2 = "selected";
      } else {
        this.selected3 = "selected";
      }
    },
  },
};
</script>
