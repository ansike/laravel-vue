require('./bootstrap');

window.Vue = require('vue')
import route from './router'
import axiox from 'axios'

Vue.use(axiox)

const app = new Vue({
    el: '#app',
    router:route
});
