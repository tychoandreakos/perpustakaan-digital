/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import User from './helpers/User';
import router from './router';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import VModal from 'vue-js-modal'

window.User = User;
window.Vue = require('vue');

window.EventBus = new Vue();
window.Fire = new Vue();


// vue use
Vue.use(VueSweetalert2);
Vue.use(VModal)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('user-component', require('./components/Home.vue').default);

// admin
Vue.component('table-bilio-component', require('./components/admin/bibliobigrafi/Table.vue').default);

// gmd
Vue.component('table-gmd-component', require('./components/admin/gmd/TableGmd.vue').default);
Vue.component('form-gmd-component', require('./components/admin/gmd/FormGmd.vue').default);

// penerbit
Vue.component('table-penerbit-component', require('./components/admin/penerbit/Table.vue').default);
Vue.component('form-penerbit-component', require('./components/admin/penerbit/Form.vue').default);

// penerbit
Vue.component('table-buku-component', require('./components/admin/buku/Table.vue').default);
Vue.component('form-buku-component', require('./components/admin/buku/Form.vue').default);

// pengarang
Vue.component('table-pengarang-component', require('./components/admin/pengarang/Table.vue').default);
Vue.component('form-pengarang-component', require('./components/admin/pengarang/Form.vue').default);

// package
Vue.component('pagination', require('laravel-vue-pagination'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//  filter
Vue.filter('capitalize', function (value) {
    if (!value) return ''
    value = value.toString()
    return value.charAt(0).toUpperCase() + value.slice(1)
  })

const app = new Vue({
    el: '#app',
    router,
    data: {
        search: ''
    },

    methods: {
        searchHit: _.debounce(() => {
            Fire.$emit('searching')
        }, 200)
    }
});
