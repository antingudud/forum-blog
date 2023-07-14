import { createApp } from 'vue';
import ArticleListComponent from './components/ArticleListComponent.vue';
import App from './App.vue';
import axios from 'axios';
import router from './router';

axios.defaults.withCredentials = true;

const app = createApp(App);
app.component('ArticleListComponent', ArticleListComponent);
app.use(router);
app.mount('#app');

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

//window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Vue.component('article-component', require('./components/ArticleComponent.vue').default);
//Vue.component('article-list-component', require('./components/ArticleListComponent.vue').default);
//Vue.component('login-page', require('./components/LoginPage.vue').default);
//Vue.component('post-page', require('./components/PostPage.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//const app = new Vue({
//    el: '#app',
//});
