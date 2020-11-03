import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomePage from '../Pages/HomePage';
import CourseListPage from '../Pages/CourseListPage';
import CoursePage from '../Pages/CoursePage';
import EducationsPage from '../Pages/EducationsPage';
import EducationPage from '../Pages/EducationPage';

const routes = [
  {name: 'home', path: '/', component: HomePage},
  {name: 'courses', path: '/fag',  meta: { scrollToTop: true }, component: CourseListPage},
  {name: 'course', path: '/fag/:courseNo',  meta: { scrollToTop: true }, component: CoursePage},
  {name: 'educations', path: '/uddannelserne',  meta: { scrollToTop: true }, component: EducationsPage},
  {name: 'education', path: '/uddannelserne/:slug',  meta: { scrollToTop: true }, component: EducationPage},
];

export default new VueRouter({
  mode: 'history',
  routes,
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return new Promise((resolve) => {
        let position = {
          x: 0,
          y: 0,
        };

        if (!to.matched.some(m => m.meta.scrollToTop)) {
          Object.assign(position, savedPosition);
        }

        setTimeout(() => resolve(savedPosition), 1500);
      });
    } else {
      return {x: 0, y: 0};
    }
  },
});
