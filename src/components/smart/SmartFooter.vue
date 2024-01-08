<script setup>
import TopWave from '@/components/wave-svgs/TopWave.vue';
import navLinks from '@/assets/constants/nav-links';
import SmartSvg from '@/components/smart/SmartSvg.vue';
import { RouterLink, useRoute } from 'vue-router';

const route = useRoute();

const year = new Date().getFullYear();
</script>
<template>
  <div class="relative pt-12">
    <TopWave class="fill-alternate-100 dark:fill-slate-700" />
    <div class="absolute -top-10 w-full px-3 text-white">
      <div
        class="border-animated dark:dark-conic-border light-conic-border mx-auto w-fit rounded bg-slate-500 p-8 shadow-lg dark:bg-gray-600 md:p-10"
      >
        <div class="flex flex-col items-center justify-center gap-8 md:flex-row">
          <div>
            <h3 class="text-2xl font-bold">Contact me</h3>
          </div>
          <div class="max-w-96 md:max-w-64 lg:max-w-96">
            <p>
              Interested in working together or need help with anything? We should queue
              up a time to chat. I’ll buy the coffee.
            </p>
          </div>
          <div>
            <RouterLink
              class="group inline-block rounded bg-slate-700 px-5 py-3 transition-all hover:bg-slate-800"
              to="/contact"
            >
              <div class="flex items-center gap-3">
                <SmartSvg
                  name="MessageSvg"
                  class="h-6 w-6 transition-all group-hover:-translate-y-1"
                />
                <span>Let Me Know!</span>
              </div>
            </RouterLink>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-alternate-100 pt-60 dark:bg-slate-700 md:pt-32">
      <div
        class="mx-auto mt-1 flex max-w-5xl flex-col items-center justify-between gap-x-12 gap-y-8 px-4 lg:flex-row-reverse"
      >
        <div class="flex justify-around gap-28 text-xl lg:text-2xl">
          <div>
            <h4 class="mb-3 text-center font-bold underline">Navigation</h4>
            <div class="grid grid-cols-2 gap-y-2 lg:grid-cols-1">
              <RouterLink
                v-for="(link, i) in navLinks"
                :key="i"
                :to="link"
                lass="transition-all hover:text-gray-500"
                @click="navOpened = false"
              >
                <span
                  :class="{
                    'text-alternate dark:text-alternate-400':
                      route.fullPath === link.fullPath,
                  }"
                >
                  {{ link.displayName }}
                </span>
              </RouterLink>
            </div>
          </div>
          <div>
            <h4 class="mb-3 text-center font-bold underline">Connect</h4>
            <div class="grid grid-cols-3 gap-3 text-lg">
              <a
                class="transition-all hover:text-gray-500"
                href="https://www.linkedin.com/in/aguilerac"
                target="_blank"
              >
                <i class="fa-brands fa-linkedin fa-lg"></i>
              </a>
              <a
                class="transition-all hover:text-gray-500"
                href="https://www.instagram.com/devloos"
                target="_blank"
              >
                <i class="fa-brands fa-instagram fa-lg"></i>
              </a>
              <a
                class="transition-all hover:text-gray-500"
                href="https://github.com/devloos"
                target="_blank"
              >
                <i class="fa-brands fa-github fa-lg"></i>
              </a>
              <a
                class="transition-all hover:text-gray-500"
                href="https://twitter.com/18aguilerac"
                target="_blank"
              >
                <i class="fa-brands fa-twitter fa-lg"></i>
              </a>
              <a
                class="transition-all hover:text-gray-500"
                href="https://leetcode.com/devlos/"
                target="_blank"
              >
                <i class="fa-solid fa-gear fa-lg"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <p class="py-5 text-center text-gray-500 dark:text-gray-400">
        &copy; {{ year }} Carlos Aguilera
      </p>
    </div>
  </div>
</template>

<style scoped lang="scss">
.border-animated {
  --border-size: 3px;
  --border-angle: 0turn;

  background-size:
    calc(100% - (var(--border-size) * 2)) calc(100% - (var(--border-size) * 2)),
    cover;
  background-position: center center;
  background-repeat: no-repeat;

  animation: bg-spin 3s linear infinite;
  @keyframes bg-spin {
    to {
      --border-angle: 1turn;
    }
  }
}

@property --border-angle {
  syntax: '<angle>';
  inherits: true;
  initial-value: 0turn;
}
</style>
