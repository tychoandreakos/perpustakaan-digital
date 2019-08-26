require('./bootstrap');
require('./user/flikity');
// require('./user/flickity-fade');
// require('./user/aos');
require('./user/jarallax')
require('./user/jarallax-element');
require('./user/jarallax-video');
require('./user/count');
require('./user/highlight');
require('./user/fancy');
require('./user/theme.js')

window.Vue = require('vue');

// tamu
// Vue.component('app-tamu', require('./components/Tamu.vue').default);

// // user
// Vue.component('app-home', require('./components/HomeLogin.vue').default);
// Vue.component('app-berita', require('./components/Berita.vue').default);
// Vue.component('app-article', require('./components/user/Article.vue').default);
// Vue.component('app-buku-result', require('./components/user/BukuResult.vue').default);
// Vue.component('app-baca', require('./components/user/Baca.vue').default);
// Vue.component('app-result', require('./components/user/Result.vue').default);
// Vue.component('app-result-search', require('./components/user/ResultSearch.vue').default);


const app = new Vue({
    el: '#app',
});