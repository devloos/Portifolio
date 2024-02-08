import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import { createHead } from '@unhead/vue';
import DefaultLayout from '@/layouts/DefaultLayout.vue';
import BlankLayout from '@/layouts/BlankLayout.vue';
import NavLayout from '@/layouts/NavLayout.vue';
import MessageSvg from '@/components/svgs/MessageSvg.vue';
import LinkedinSvg from '@/components/svgs/LinkedinSvg.vue';
import InstagramSvg from '@/components/svgs/InstagramSvg.vue';
import GithubSvg from '@/components/svgs/GithubSvg.vue';
import TwitterSvg from '@/components/svgs/TwitterSvg.vue';
import LaptopSvg from '@/components/svgs/LaptopSvg.vue';

import '@/assets/hamburger.scss';
import '@/assets/index.css';

const app = createApp(App);
const head = createHead();

app.use(router);
app.use(head);

app
  .component('DefaultLayout', DefaultLayout)
  .component('BlankLayout', BlankLayout)
  .component('NavLayout', NavLayout)
  .component('MessageSvg', MessageSvg)
  .component('LinkedinSvg', LinkedinSvg)
  .component('InstagramSvg', InstagramSvg)
  .component('GithubSvg', GithubSvg)
  .component('TwitterSvg', TwitterSvg)
  .component('LaptopSvg', LaptopSvg);

router.isReady().then(() => {
  app.mount('#app');
});
