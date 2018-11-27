
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
///importsss
import VueRouter from 'vue-router'
import { Form, HasError, AlertError } from 'vform'
import VueProgressBar from 'vue-progressbar'
import Swal from 'sweetalert2'
import moment from 'moment'
Vue.use(VueRouter)

///end
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form;
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '2px'
})
const toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
  window.swal = Swal;
  window.toast = toast;
  window.Fire = new Vue();
  Vue.filter('capitalize',function(text){
    return text.charAt(0).toUpperCase() + text.slice(1)
});
Vue.filter('dateChange',function(date){
    return moment().format('MMM Do YYYY')
});
Vue.filter('stringConv',function(text){
    if(text==1){
        return 'Active';
    }else{
        return 'Inactive';
    }
});
Vue.filter('demandStatus',function(text){
    if(text==0){
        return 'Pending';
    }else if(text=1){
        return 'Accepted';
    }else{
        return 'Declined';
    }
});
Vue.filter('urgencyStatus',function(text){
    if(text==1){
        return 'High';
    }else if(text=2){
        return 'Medium';
    }else{
        return 'Low';
    }
});
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);
Vue.component('example-component', require('./components/ExampleComponent.vue'));
let routes = [
    { path: '/users', component: require('./components/Users.vue') },
    { path: '/events', component: require('./components/Events.vue') },
    { path: '/addevent', component: require('./components/Addevent.vue') },
    { path: '/notice', component: require('./components/Notice.vue') },
    { path: '/developer', component: require('./components/Developer.vue') },
    { path: '/gallery', component: require('./components/Gallery.vue') },
    { path: '/demands', component: require('./components/Demands.vue') },
    { path: '/bloods', component: require('./components/Bloods.vue') },
    { path: '/requests', component: require('./components/Request.vue') },
    { path: '/donate', component: require('./components/Donate.vue') },
  ]
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const router = new VueRouter({
    mode:'history',
    routes // short for `routes: routes`
})


const app = new Vue({
    el: '#app',
    router,
});
