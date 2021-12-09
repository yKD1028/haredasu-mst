import Router from 'vue-router'
import Home from './components/pages/Home.vue'
import About from './components/pages/About.vue'
import MailAuth from './components/pages/MailAuth.vue'
import Regist from './components/pages/Regist.vue'
import Login from './components/pages/Login.vue'
import Form_sample from './components/form_sample.vue'
import test_page from './components/pages/test.vue'

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
    {
        path: '/mail_auth',
        name: 'mail_auth',
        component: MailAuth
    },
    {
        path: '/regist',
        name: '新規登録',
        component: Regist
    },
    {
        path: '/login',
        name: 'ログイン',
        component: Login
    },
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
  ]
});
