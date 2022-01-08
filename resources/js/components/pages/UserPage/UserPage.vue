<template>
    <div>
        <Header></Header>
        <v-container class="user-page-wrap">
            <v-row no-gutters class="user-page-title">
                <v-col>
                    <div v-if="screen == 0">ユーザー情報</div>
                    <div v-if="screen == 1">パスワード</div>
                    <div v-if="screen == 2">支払い情報</div>
                    <div v-if="screen == 3">予約履歴</div>
                </v-col>
            </v-row>
            <div class="border"></div>
            <v-row no-gutters>
                <v-col cols="auto" class="user-page-tabs">
                    <div :class="selected0" @click="changeScreen(0)">ユーザー情報</div>
                    <div :class="selected1" @click="changeScreen(1)">パスワード</div>
                    <div :class="selected2" @click="changeScreen(2)">支払い情報</div>
                    <div :class="selected3" @click="changeScreen(3)">予約履歴</div>
                </v-col>
                <v-col class="user-page-screens">
                    <UserInfo class="form-screen" v-if="screen == 0"></UserInfo>
                    <Password class="form-screen" v-if="screen == 1"></Password>
                    <Payment v-if="screen == 2"></Payment>
                    <RHistory class="list-screen" v-if="screen == 3"></RHistory>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>
<script>
    import Header from '../../components/Header.vue'
    import UserInfo from './UserInfoPage.vue'
    import Password from './Password.vue'
    import Payment from './Payment.vue'
    import RHistory from './ReservationHistory.vue'
    export default{
        data () {
            return {
            screen: 0,
            selected0: 'selected',
            selected1: '',
            selected2: '',
            selected3: '',
            }
        },
        components:{
            Header,
            UserInfo,
            Password,
            Payment,
            RHistory,
        },
        methods: {
            changeScreen(num){
                this.screen = num;
                this.selected0 = '';
                this.selected1 = '';
                this.selected2 = '';
                this.selected3 = '';
                if(num == 0){
                    this.selected0 = 'selected';
                }else if(num == 1){
                    this.selected1 = 'selected';
                }else if(num == 2){
                    this.selected2 = 'selected';
                }else{
                    this.selected3 = 'selected';
                }
            }
        },
    }
</script>
