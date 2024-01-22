<script setup>
import TopWave from '@/components/wave-svgs/TopWave.vue';
import SmartSvg from '@/components/smart/SmartSvg.vue';
import SmartImg from '@/components/smart/SmartImg.vue';
import { RouterLink } from 'vue-router';

const year = new Date().getFullYear();
</script>
<template>
  <div class="relative mt-24 pt-12">
    <TopWave class="fill-alternate-100 dark:fill-slate-700" />
    <div class="absolute -top-10 w-full px-3 text-white dark:text-slate-200">
      <div
        class="border-animated dark:dark-conic-border light-conic-border mx-auto w-fit rounded bg-slate-500 p-8 shadow-lg dark:bg-gray-600 md:px-10 md:py-12 lg:px-12 lg:py-14"
      >
        <div class="flex flex-col items-center justify-center gap-10 md:flex-row">
          <div class="text-nowrap">
            <h3 class="text-2xl font-bold">Contact me</h3>
          </div>
          <div class="max-w-96 text-lg md:max-w-64 lg:max-w-lg xl:max-w-xl">
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
              <div class="flex items-center gap-3 text-nowrap">
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
    <div class="bg-alternate-100 pt-72 dark:bg-slate-700 md:pt-40">
      <div class="flex flex-col items-center justify-center gap-10">
        <div>
          <SmartImg
            class="max-w-20 self-center rounded-full border border-slate-700"
            src="/tplos/portfolio/stud.jpg"
            width="1328"
            height="1274"
            alt="stud"
          />
        </div>
        <blockquote class="mb-5">
          <p class="max-w-sm text-center font-mono text-xl tracking-wide antialiased">
            Leave a meaningful impact, regardless of its scale.
          </p>
        </blockquote>
        <div class="flex items-center justify-around gap-6 md:gap-16">
          <a
            class="group rounded transition-all hover:bg-slate-700 dark:hover:bg-slate-200"
            href="https://www.linkedin.com/in/aguilerac"
            target="_blank"
          >
            <div class="rounded border border-slate-700 p-2 px-3 dark:border-slate-200">
              <SmartSvg
                class="h-7 w-7 fill-slate-700 transition-all group-hover:fill-alternate-100 dark:fill-slate-200 dark:group-hover:fill-slate-700"
                name="LinkedinSvg"
              />
            </div>
          </a>
          <a
            class="group rounded transition-all hover:bg-slate-700 dark:hover:bg-slate-200"
            href="https://www.instagram.com/devloos"
            target="_blank"
          >
            <div class="rounded border border-slate-700 p-2 px-3 dark:border-slate-200">
              <SmartSvg
                class="h-7 w-7 fill-slate-700 transition-all group-hover:fill-alternate-100 dark:fill-slate-200 dark:group-hover:fill-slate-700"
                name="InstagramSvg"
              />
            </div>
          </a>
          <a
            class="group rounded transition-all hover:bg-slate-700 dark:hover:bg-slate-200"
            href="https://github.com/devloos"
            target="_blank"
          >
            <div class="rounded border border-slate-700 p-2 px-3 dark:border-slate-200">
              <SmartSvg
                class="h-7 w-7 fill-slate-700 transition-all group-hover:fill-alternate-100 dark:fill-slate-200 dark:group-hover:fill-slate-700"
                name="GithubSvg"
              />
            </div>
          </a>
          <a
            class="group rounded transition-all hover:bg-slate-700 dark:hover:bg-slate-200"
            href="https://twitter.com/18aguilerac"
            target="_blank"
          >
            <div class="rounded border border-slate-700 p-2 px-3 dark:border-slate-200">
              <SmartSvg
                class="h-7 w-7 fill-slate-700 transition-all group-hover:fill-alternate-100 dark:fill-slate-200 dark:group-hover:fill-slate-700"
                name="TwitterSvg"
              />
            </div>
          </a>
          <a
            class="group rounded transition-all hover:bg-slate-700 dark:hover:bg-slate-200"
            href="https://leetcode.com/devlos/"
            target="_blank"
          >
            <div class="rounded border border-slate-700 p-2 px-3 dark:border-slate-200">
              <SmartSvg
                class="h-7 w-7 fill-slate-700 transition-all group-hover:fill-alternate-100 dark:fill-slate-200 dark:group-hover:fill-slate-700"
                name="LaptopSvg"
              />
            </div>
          </a>
        </div>
      </div>
      <p class="pb-10 pt-16 text-center text-gray-500 dark:text-gray-400">
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
