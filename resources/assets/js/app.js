require('./bootstrap');

window.Vue = require('vue')
import route from './router'
import axiox from 'axios'
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

Vue.use(axiox)
Vue.use(ElementUI);

const app = new Vue({
    el: '#app',
    router:route
});
