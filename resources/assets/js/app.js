/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./../../../../../resources/assets/js/bootstrap');

window.Vue = require('vue');

import 'animate.css/animate.min.css';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import iView from 'iview';
import 'iview/dist/styles/iview.css'; // 使用 CSS
Vue.use(iView);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const Routers = [{
    path: '/',
    name: 'home',
    meta: {
        'menu': 'home'
    },
    component: (resolve) => require(['./components/pages/Index.vue'], resolve)
}];

// 路由配置
const RouterConfig = {
    routes: Routers
};
const router = new VueRouter(RouterConfig);

// 全局组件
Vue.component('left-menu', require('./components/public/LeftMenu.vue'));

const app = new Vue({
    el: "#app",
    router: router,
    render: h => h(require('./components/App.vue'))
});