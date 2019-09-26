/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import User from './helpers/User';
import VueSweetalert2 from 'vue-sweetalert2';
import VModal from 'vue-js-modal'
import 'vue-instant/dist/vue-instant.css'
import VueInstant from 'vue-instant'
import CKEditor from '@ckeditor/ckeditor5-vue';
import infiniteScroll from 'vue-infinite-scroll'
import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/index.css';


window.User = User;
window.Vue = require('vue');

// vuescrollto
var Vue = require('vue');

window.EventBus = new Vue();
window.Fire = new Vue();


// vue use
Vue.use(VueSweetalert2);
Vue.use(VModal);
Vue.use(VueInstant)
Vue.use(CKEditor);
Vue.use(infiniteScroll);
Vue.use(VueToast);

require ('./component');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 // Register a global custom directive called `v-focus`
Vue.directive('focus', {
    // When the bound element is inserted into the DOM...
    inserted: function (el) {
      // Focus the element
      el.focus()
    }
  })

//  filter
Vue.filter('capitalize', function (value) {
    if (!value) return ''
    value = value.toString()
    return value.charAt(0).toUpperCase() + value.slice(1)
  })

const app = new Vue({
    el: '#app',
    scrollBehavior (to, from, savedPosition) {
      return { x: 0, y: 0 }
    },
    
    data: {
        search: ''
    },

    methods: {
        searchHit: _.debounce(() => {
            Fire.$emit('searching')
        }, 200)
    }
});
