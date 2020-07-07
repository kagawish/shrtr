import Vue from 'vue';
import Form from './components/Form.vue';
import Shortlink from './components/Shortlink.vue';

Vue.component('my-form', Form);
Vue.component('shortlink', Shortlink);

let app = new Vue({
	el: '#app',
	template: '<my-form></my-form>'
});
