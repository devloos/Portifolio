import { createRouter, createWebHistory } from 'vue-router';

const Home = () => import('@/views/Home.vue');
const Projects = () => import('@/views/Projects.vue');
const Contact = () => import('@/views/Contact.vue');
const PageNotFound = () => import('@/views/PageNotFound.vue');

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
  },
  {
    path: '/projects',
    name: 'Projects',
    component: Projects,
  },
  {
    path: '/contact',
    name: 'Contact',
    component: Contact,
    meta: {
      layout: 'NavLayout',
    },
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
        }, 500);
      }
    });
  },
});

export default router;
