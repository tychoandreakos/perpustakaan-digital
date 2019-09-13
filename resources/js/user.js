require('./bootstrap');
require('./user/flikity');
// require('./user/flickity-fade');
// require('./user/aos');
require('./user/jarallax')
require('./user/jarallax-element');
require('./user/jarallax-video');
// require('./user/countUp');
// import 'countup';d
require('./user/highlight');
require('./user/fancy');
require('./user/theme.js');
require ('./admin/chart');
require('./user/chart');
require('./admin/chart/pengunjung');



import VueSweetalert2 from 'vue-sweetalert2';
window.Vue = require('vue');
Vue.use(VueSweetalert2);



// tamu
Vue.component('app-tamu', require('./components/Tamu.vue').default);

Vue.component('app-button-pinjam', require('./components/user/ButtonPinjam.vue').default);
Vue.component('app-lengkapi', require('./components/user/Lengkapi.vue').default);
Vue.component('app-batal', require('./components/user/Batal.vue').default);




const app = new Vue({
    el: '#app',
});