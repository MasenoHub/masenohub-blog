window.postsPerPage = 3;
require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'

import App from './views/App';
import Home from './views/Home';
import About from './views/About';
import Message from './views/Message';
import Auth from './views/Auth';
import Read from './views/Read';

Vue.use(VueRouter);
Vue.component('post-component', require('./components/PostComponent.vue').default);
Vue.component('footer-component', require('./components/FooterComponent.vue').default);

const router = new VueRouter({
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
            path: '/message',
            name: 'message',
            component: Message
        },
        {
            path: '/auth',
            name: 'auth',
            component: Auth
        },
        {
            path: '/read/:slug',
            name: 'read',
            component: Read
        }
    ],
    scrollBehavior (to, from, savedPosition) {
        return savedPosition ? savedPosition :  { x: 0, y: 0 }
    }
});

const app = new Vue({
    el: '#app',
    components: {App},
    router
});