import { createRouter, createWebHistory } from 'vue-router';

const Homepage = () => import('@/views/Homepage.vue');
const Projects = () => import('@/views/Projects.vue');
const PageNotFound = () => import('@/views/PageNotFound.vue');

const routes = [
  {
    path: '/',
    name: 'Homepage',
    component: Homepage,
  },
  {
    path: '/projects',
    name: 'Projects',
    component: Projects,
  },
  {
    path: '/:pathMatch(.*)*',
    name: 'PageNotFound',
    meta: {
      layout: 'BlankLayout',
    },
    component: PageNotFound,
  },
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
  scrollBehavior(to, from, savedPosition) {
    return new Promise((resolve) => {
      if (savedPosition) {
        resolve(savedPosition);
      } else if (to.hash) {
        // if in the same page go right away
        const waitTimeMs = to.path === from.path ? 100 : 1300;

        setTimeout(() => {
          resolve({
            el: to.hash,
            behavior: 'smooth',
            top: 76,
          });
        }, waitTimeMs);
      } else {
        setTimeout(() => {
          resolve({
            top: 0,
            left: 0,
          });
        }, 1300);
      }
    });
  },
});

export default router;
