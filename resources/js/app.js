import Vue from 'vue';
import vuetify from './plugins/vuetify';

Vue.config.devtools = true;
Vue.config.performance = true;

Vue.component('masthead', require('./components/masthead').default)
Vue.component('impressum', require('./components/impressum').default)

const app = new Vue({
  vuetify,
}).$mount('#app')
