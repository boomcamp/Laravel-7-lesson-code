require('./bootstrap');
window.Vue = require('vue'); //set vuejs globally accessible

//call the main vue file then integrate to <div id="app"></div> inside /views/app.blade.php
import App from './components/mentor/App.vue'; 

//import routes.js
import {routes} from './routes';

//Vue libraries
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';

//we need to append the the libraries so vuejs can use it
Vue.use(VueRouter);  
Vue.use(VueAxios, axios);

//create router links from routes.js
const router = new VueRouter({
    mode: 'history',
    routes: routes
});

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    if (localStorage.getItem("my-app-token") === null) {
      next({
        path: '/login',
        query: { redirect: to.fullPath }
      })
    } else {
      next()
    }
  } else {
    next() // make sure to always call next()!
  }
})

//This is  the main function it will render the defined routes from routes.js 
//and vue components that we import inside /mentor/ folder
const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});