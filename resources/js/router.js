import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

// component

import Login from './components/login/Login';
import Daftar from './components/login/Signup';

const routes = [
    { path: '/', component: Login },
    { path: '/daftar', component: Daftar, name: "daftar" },
]




const router = new VueRouter({
    routes,
    mode: 'history'
})

export default router;