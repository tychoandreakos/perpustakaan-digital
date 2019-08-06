import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

// component

import Login from './components/login/Login';
import Daftar from './components/login/Signup';
import Index from './components/Index';

const routes = [
    { path: '/', component: Login, name: "login" },
    { path: '/daftar', component: Daftar, name: "daftar" },
    { path: '/perpustakaan', component: Index, name: "index" },
]




const router = new VueRouter({
    routes,
    mode: 'history'
})

export default router;