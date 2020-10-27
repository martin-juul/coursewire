import Vue from 'vue';
import vuetify from './plugins/vuetify';

Vue.config.devtools = true;
Vue.config.performance = true;

const app = new Vue({
  vuetify,
}).$mount('#app')
