import { createApp } from 'vue';
import App from './App.vue';
import router from './router';

import '@/assets/hamburger.scss';
import '@/assets/index.css';
import '@/assets/index.pcss';

const app = createApp(App);

app.use(router);

app.mount('#app');
