import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from '../Pages/Home';

const routes = [
  {name: 'home', path: '/', component: Home},
];

export default new VueRouter({
  mode: 'history',
  routes,
});
