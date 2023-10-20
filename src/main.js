import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import { createHead } from '@unhead/vue';
import DefaultLayout from '@/layouts/DefaultLayout.vue';
import BlankLayout from '@/layouts/BlankLayout.vue';

import '@/assets/hamburger.scss';
import '@/assets/index.css';

const app = createApp(App);
const head = createHead();

app.use(router);
app.use(head);

app.component('DefaultLayout', DefaultLayout);
app.component('BlankLayout', BlankLayout);

router.isReady().then(() => {
  app.mount('#app');
});
