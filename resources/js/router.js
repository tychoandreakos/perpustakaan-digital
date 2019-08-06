import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

// component

import Login from './components/login/Login';

const routes = [
    { path: '/', component: Login },
]




const router = new VueRouter({
    routes,
    mode: 'history'
})

export default router;