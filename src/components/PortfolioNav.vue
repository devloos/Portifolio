<script setup>
import { useDark, useWindowSize } from '@vueuse/core';
import { onMounted, ref, watch } from 'vue';
import { useRoute } from 'vue-router';
import SmartTransition from '@/components/smart/SmartTransition.vue';
import SmartLinks from '@/components/smart/SmartLinks.vue';

const isDark = useDark();

const navOpened = ref(false);

watch(navOpened, (value) => {
  document.body.style.overflow = value ? 'hidden' : 'visible';
});

const route = useRoute();

watch(route, () => {
  navOpened.value = false;
});

const { width: windowWidth } = useWindowSize();

watch(windowWidth, () => {
  if (windowWidth.value >= 768) {
    navOpened.value = false;
  }
});

onMounted(() => {
  window.addEventListener('keydown', (e) => {
    if (e.key !== 'Escape') {
      return;
    }

    navOpened.value = false;
  });
});
</script>
<template>
  <nav class="sticky top-0 z-50">
    <div
      class="flex items-center justify-between border-b border-neutral-300 bg-slate-100/[.8] px-5 py-2 backdrop-blur-sm dark:border-neutral-500 dark:bg-primary/[.8] md:justify-center md:gap-32 xl:gap-36"
    >
      <RouterLink to="/">
        <img src="goat.png" alt="" class="max-w-[42px]" />
      </RouterLink>
      <div class="hidden gap-8 font-semibold md:flex md:text-xl lg:gap-16">
        <SmartLinks @link-clicked="navOpened = false" />
      </div>
      <button
        class="hidden h-[29px] w-[58px] items-center rounded-full bg-slate-300 pl-[2px] hover:ring-2 hover:ring-sky-800 dark:bg-primary-400 md:flex"
        type="button"
        @click="isDark = !isDark"
      >
        <div
          class="flex h-[26px] w-[26px] transform items-center justify-center rounded-full bg-slate-400 !transition-all dark:bg-primary"
          :class="{ 'translate-x-[28px]': isDark }"
        >
          <i class="fa-solid" :class="isDark ? 'fa-moon' : 'fa-sun'"></i>
        </div>
      </button>
      <button
        class="hamburger hamburger--elastic md:hidden"
        :class="{ 'is-active': navOpened }"
        type="button"
        @click="navOpened = !navOpened"
      >
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </button>
    </div>
    <Teleport to="body">
      <SmartTransition>
        <div
          v-if="navOpened"
          class="fixed inset-0 top-[59.2px] z-30 bg-black/[.5] backdrop-blur-sm"
          @click.self="navOpened = false"
        />
      </SmartTransition>
      <SmartTransition name="slide-from-right">
        <div
          v-if="navOpened"
          class="fixed right-1 top-[59.2px] z-40 h-80 w-80 rounded-b bg-slate-100 dark:bg-primary-600"
        >
          <div class="grid gap-4 p-5 text-lg font-semibold">
            <SmartLinks @link-clicked="navOpened = false" />
            <div class="flex gap-8">
              <a href="https://www.linkedin.com/in/aguilerac" target="_blank">
                <i class="fa-brands fa-linkedin fa-lg"></i>
              </a>
              <a href="https://www.instagram.com/devloos" target="_blank">
                <i class="fa-brands fa-instagram fa-lg"></i>
              </a>
              <a href="https://github.com/devloos" target="_blank">
                <i class="fa-brands fa-github fa-lg"></i>
              </a>
              <a href="https://twitter.com/18aguilerac" target="_blank">
                <i class="fa-brands fa-twitter fa-lg"></i>
              </a>
            </div>
            <div>
              <hr class="mb-3 bg-neutral-300 dark:bg-coal" />
              <button
                class="flex w-full items-center justify-center gap-5 rounded bg-alternate-400 py-3 transition-all dark:bg-alternate-600"
                @click="isDark = !isDark"
              >
                <i class="fa-solid" :class="isDark ? 'fa-sun' : 'fa-moon'"></i>
                <span>Switch to {{ isDark ? 'light' : 'dark' }} theme</span>
              </button>
            </div>
          </div>
        </div>
      </SmartTransition>
    </Teleport>
  </nav>
</template>

<style scoped>
hr {
  border: none;
  height: 1px;
}
</style>
