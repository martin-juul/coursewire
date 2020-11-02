import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from '../Pages/Home';
import CourseList from '../Pages/CourseList';

const routes = [
  {name: 'home', path: '/', component: Home},
  {name: 'courses', path: '/fag', component: CourseList},
];

export default new VueRouter({
  mode: 'history',
  routes,
});
