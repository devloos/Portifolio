import { createRouter, createWebHashHistory } from 'vue-router';
import Home from '../views/Home.vue';
import Project from '../views/Project';

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
  },
  {
    path: '/project/:project',
    name: 'project',
    component: Project,
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;
