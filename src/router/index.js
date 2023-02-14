import { createRouter, createWebHashHistory } from 'vue-router';
import Home from '@/views/home/index.vue';
import Project from '@/views/projects/Project';

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
