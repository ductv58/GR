
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import {TinkerComponent} from 'botman-tinker';
import './bootstrap'
require ("./owl.carousel.min");
require ("./custom");
window.Vue = require('vue');

Vue.component('botman-tinker', TinkerComponent);

const app = new Vue({
  el: '#app'
});