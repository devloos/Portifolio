<script setup>
import TopWave from '@/components/wave-svgs/TopWave.vue';
import navLinks from '@/assets/constants/nav-links';
import { useRoute } from 'vue-router';

const route = useRoute();

const year = new Date().getFullYear();
</script>
<template>
  <div class="relative pt-12">
    <TopWave class="fill-alternate-100 dark:fill-slate-700" />
    <div class="absolute -top-10 w-full px-3 text-white">
      <div
        class="mx-auto w-fit rounded bg-slate-500 p-8 shadow-lg dark:bg-gray-600 md:p-10"
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
            <button
              class="group rounded bg-slate-700 px-5 py-3 transition-all hover:bg-slate-800"
            >
              <div class="flex items-center gap-3">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="h-6 w-6 motion-safe:group-hover:animate-spin"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z"
                  />
                </svg>
                <span>Let Me Know!</span>
              </div>
            </button>
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
