import Router from 'vue-router'
import Home from './components/pages/Home.vue'
import About from './components/pages/About.vue'
import Regist from './components/pages/Regist.vue'

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
        path: '/regist',
        name: '新規登録',
        component: Regist
    },
  ]
});
