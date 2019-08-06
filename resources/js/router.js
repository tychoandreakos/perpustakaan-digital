import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

// component

import Login from './components/login/Login';
import Daftar from './components/login/Signup';
import Index from './components/Index';
import Logout from './components/login/Logout';

const routes = [
    { path: '/', component: Login, name: "login" },
    { path: '/logout', component: Logout, name: "logout" },
    { path: '/daftar', component: Daftar, name: "daftar" },
    { path: '/perpustakaan', component: Index, name: "index" },
]




const router = new VueRouter({
    routes,
    mode: 'history'
})

export default router;