/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**LOcale */
import VueInternationalization from 'vue-i18n';
import Locale from '../assets/js/vue-i18n-locales.generated';


Vue.use(VueInternationalization);
const lang = document.documentElement.lang.substr(0, 2); 
// or however you determine your current app locale

const i18n = new VueInternationalization({
    locale: lang,
    messages: Locale
});



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('create-taberna', require('./components/Taberna/CreateTaberna.vue').default);
Vue.component('upload-card', require('./components/Taberna/UploadCard.vue').default);
Vue.component('update-taberna', require('./components/Taberna/UpdateTaberna.vue').default);
Vue.component('jangou-animation', require('./components/Taberna/JangouAnimation.vue').default);
Vue.component('change-pass', require('./components/User/ChangePass.vue').default);
Vue.component('lagun-chat', require('./components/Taberna/LagunChat.vue').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    i18n
});