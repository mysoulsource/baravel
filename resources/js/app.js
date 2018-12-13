
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
import { VueEditor, Quill } from "vue2-editor"
import Gate from './Gate' //importing Gate class
///end


//use vue router
Vue.use(VueRouter)
window.VueEditor = VueEditor;
//form error
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component('pagination', require('laravel-vue-pagination'));
//globally assigning form
window.Form = Form;
//vue progressbar
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '2px'
})
//vue sweetalert2
const toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
  window.swal = Swal;
  window.toast = toast;
  //to fire an event
  window.Fire = new Vue();


  //vue filter to capitalize the text
  Vue.filter('capitalize',function(text){
    return text.charAt(0).toUpperCase() + text.slice(1)
});

  //vue filter to change the date to human readable
Vue.filter('dateChange',function(date){
    return moment().format('MMM Do YYYY')
});
//vue filter to convert the status from 0 and 1 to string
Vue.filter('stringConv',function(text){
    if(text==1){
        return 'Active';
    }else{
        return 'Inactive';
    }
});
//vue filter to convert the demand status
Vue.filter('demandStatus',function(text){
    if(text==0){
        return 'Pending';
    }else if(text=1){
        return 'Accepted';
    }else{
        return 'Declined';
    }
});

//vue filter to convert the urgency status
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

//JWT
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
//JWT END
//routes
 Vue.prototype.$gate = new Gate(window.authuser);
let routes = [
    { path: '/users', component: require('./components/Users.vue') },
    { path: '/adminevents', component: require('./components/Events.vue') },
    { path: '/addevent', component: require('./components/Addevent.vue') },
    { path: '/adminnotice', component: require('./components/Notice.vue') },
    { path: '/admindeveloper', component: require('./components/Developer.vue') },
    { path: '/admingallery', component: require('./components/Gallery.vue') },
    { path: '/userdemands', component: require('./components/Demands.vue') },
    { path: '/adminbloods', component: require('./components/Bloods.vue') },
    { path: '/userrequests', component: require('./components/Request.vue') },
    { path: '/userdonate', component: require('./components/Donate.vue') },
    { path: '/userprofile', component: require('./components/Profile.vue') },
    { path: '/adminbanner', component: require('./components/Banner.vue') },
     { path: '/adminblog', component: require('./components/Blog.vue') },
     { path: '/admincategory', component: require('./components/Category.vue') },
    { path: '/adminaddpost', component: require('./components/Addpost.vue') },
     { path: '*',name:'empty', component: require('./components/Empty.vue') }
  ]

//end of routes
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//instance if vue router
const router = new VueRouter({
    mode:'history',
    routes // short for `routes: routes`
})


//instance of vue
const app = new Vue({
    el: '#app',
    router,
    data:{
       user:{}, //to store the user id for pusher notification
        hide:false,
        donate:{}, // to accept or decline the request
        search:'', // instant search feature
        demand:{} // to accept the demand
    },
    methods:{
        listen(){
            //pusher notification for request alert
            window.Echo.private('AlertRequest.' + this.user)
                .listen('.RequestStatus',(request)=>{
                    this.donate = request;
                    swal({
                        title: 'Blood Request Notification',
                        text: request.requested_by + ' Requested for Blood on ' + request.on ,
                        type: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Accept it.',
                        cancelButtonText:'Decline it.'

                    }).then((result) => {
                    //if accepted
                        if (result.value) {
                            this.acceptRequest();
                            swal(
                                'Accepted!',
                                'Your accepted the request.',
                                'success'
                            )
                        }else{
                            //if declined
                         this.declineRequest();
                        }
                    })
                });
        //pusher notification for the status of demand
            window.Echo.private('DemandAlert.' + this.user)
                .listen('.DemandStatus',(demand)=>{
                   let text =   demand.accepted + ' accepted your request on ' + demand.on ;
                    swal(
                        'Accepted!',
                            text,
                        'success'
                    )

                });
            //pusher notification for the request response
            window.Echo.private('RequestResponse.' + this.user)
                .listen('.RequestResponseEvent',(request)=>{
                    let text =   request.requested_to + ' accepted your request on ' + request.on ;
                    swal(
                        'Accepted!',
                        text,
                        'success'
                    )

                });
        },
        acceptRequest(){
            //if accpeted the request
            axios.post('api/donate/accept', { did : this.donate.id }, {
            })
                .then(()=>{
                    Fire.$emit('datauploaded');
                    swal(
                        'Accepted!',
                        'Request accepted Successfully.',
                        'success'
                    )
                })
                .catch(()=>{
                    swal('Oops!!','Something went wrong','warning');
                });

        },
        declineRequest(){
            //if declined the request
            axios.post('api/donate/decline', { did : this.donate.id }, {
            })
                .then(()=>{
                    Fire.$emit('datauploaded');
                    swal(
                        'Declined!',
                        'Request Declined Successfully.',
                        'success'
                    )
                })
                .catch(()=>{
                    swal('Oops!!','Something went wrong','warning');
                });
        },
        searchfun: _.debounce(()=>{
            //instant searh functionality on each vue templates
            Fire.$emit('searching');
        },1000),
        acceptDemand(id){
            //if demand is accepted
            axios.post('api/demand/accept', { did : id }, {
            })
                .then(()=>{
                    Fire.$emit('datauploaded');
                    swal(
                        'Accepted!',
                        'Demand accepted Successfully.',
                        'success'
                    )
                })
                .catch(()=>{
                    swal('Oops!!','Something went wrong','warning');
                });

        }
    },
    created(){
        //get user id
        this.user = document.querySelector('#token').getAttribute('value');
        //start the listen method to receive the pusher notification
        this.listen();


    }

});
