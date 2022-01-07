import Router from 'vue-router'
import Home from './components/pages/Home.vue'
import About from './components/pages/About.vue'
// import MailAuth from './components/pages/MailAuth.vue'
import UserResist from './components/pages/UserResistPage.vue'
import UserResist2 from './components/pages/UserResistPage2.vue'
// import Regist from './components/pages/Regist.vue'
// import Login from './components/pages/Login.vue'
// import ChangePass from './components/pages/ChangePassword.vue'
import UserPage from './components/pages/UserPage/UserPage.vue'
import Form_sample from './components/form_sample.vue'
import test_page from './components/pages/test.vue'
import Reserve from './components/ReservePage.vue'
import Confirmation from "./components/ConfirmationPage.vue"
import CompletePage from "./components/CompletePage.vue"

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
        path: '/about',
        name: 'about',
        component: About
    },
    // {
    //     path: '/mail_auth',
    //     name: 'mail_auth',
    //     component: MailAuth
    // },
    {
        path: '/user_resist1',
        name: '新規登録(サンプル1)',
        component: UserResist,
    },
    {
      path: '/user_resist2',
      name: '新規登録(サンプル2)',
      component: UserResist2,
    },
    {
        path: '/user_page',
        name: 'ユーザーページ',
        component: UserPage,
    },

    // {
    //     path: '/regist',
    //     name: '新規登録',
    //     component: Regist
    // },
    // {
    //     path: '/login',
    //     name: 'ログイン',
    //     component: Login
    // },
    // {
    //     path: '/change_pass',
    //     name: 'パスワード変更',
    //     component: ChangePass
    // },

    {
        path: '/form_sample',
        name: 'form_sample',
        component: Form_sample
    },
    {
        path: '/test',
        name: 'test',
        component: test_page
    },
    {
        path: '/reserve',
        name: 'reserve',
        component: Reserve
    },
    {
        path: '/confirmation',
        name: 'confirmation',
        component: Confirmation
    },
    {
        path: "/complete",
        name: "complete",
        component: CompletePage
    }
  ]
});
