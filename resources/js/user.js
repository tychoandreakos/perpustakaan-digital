require('./bootstrap');
require('./user/flikity');
// require('./user/flickity-fade');
// require('./user/aos');
require('./user/jarallax')
require('./user/jarallax-element');
require('./user/jarallax-video');
// require('./user/countUp');
// import 'countup';
require('./user/highlight');
require('./user/fancy');
require('./user/theme.js')


import VueSweetalert2 from 'vue-sweetalert2';
window.Vue = require('vue');
Vue.use(VueSweetalert2);



// tamu
Vue.component('app-tamu', require('./components/Tamu.vue').default);

Vue.component('app-button-pinjam', require('./components/user/ButtonPinjam.vue').default);
Vue.component('app-lengkapi', require('./components/user/Lengkapi.vue').default);




const app = new Vue({
    el: '#app',
});