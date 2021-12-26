<template>
<div>
    <v-container class="user-page">
        <v-row no-gutters class="userPage-title">
            <v-col>
                <div  v-if="screen == 0">ユーザー情報</div>
                <div v-if="screen == 1">パスワード</div>
                <div v-if="screen == 2">支払い情報</div>
                <div v-if="screen == 3">予約履歴</div>
            </v-col>
        </v-row>
        <hr>
        <v-row no-gutters>
            <v-col class="userPage-changes">
                <div :class="active" @click="changeScreen(0)">ユーザー情報</div>
                <div :class="active" @click="changeScreen(1)">パスワード</div>
                <div :class="active" @click="changeScreen(2)">支払い情報</div>
                <div :class="active" @click="changeScreen(3)">予約履歴</div>
            </v-col>
            <v-col>
                <UserInfo v-if="screen == 0"></UserInfo>
                <Password v-if="screen == 1"></Password>
                <Payment v-if="screen == 2"></Payment>
                <RHistory v-if="screen == 3"></RHistory>
            </v-col>
        </v-row>
    </v-container>
    </div>
</template>
<script>
    import UserInfo from './UserInfoPage.vue'
    import Password from './Password.vue'
    import Payment from './Payment.vue'
    import RHistory from './ReservationHistory.vue'
    export default{
        data () {
            return {
            screen: 0,
            }
        },
        components:{
            UserInfo,
            Password,
            Payment,
            RHistory,
        },
        methods: {
            changeScreen(num){
                this.screen = num;
            }
        },
    }
</script>
