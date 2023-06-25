import { createRouter, createWebHistory } from 'vue-router';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('@/views/Home.vue'),
    },
    {
      path: '/projects',
      name: 'projects',
      component: () => import('@/views/Projects.vue'),
    },
    {
      path: '/about',
      name: 'about',
      component: () => import('@/views/About.vue'),
    },
  ],
  scrollBehavior(to, from) {
    return new Promise((resolve) => {
      const position = {};
      if (to.hash) {
        position.el = to.hash;
        position.behavior = 'smooth';
      } else {
        position.top = 0;
      }

      if (to.path === from.path || !to.hash) {
        resolve(position);
      } else {
        setTimeout(() => {
          resolve(position);
        }, 1300);
      }
    });
  },
});

export default router;
