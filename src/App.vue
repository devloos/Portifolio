<script setup>
import { useWindowSize } from '@vueuse/core';
import { ref, watch } from 'vue';
import { RouterView, useRoute } from 'vue-router';
import SmartTransition from '@/components/smart/SmartTransition.vue';

const darkMode = ref(false);

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
</script>

<template>
  <nav class="sticky top-0">
    <div
      class="z-50 flex items-center justify-between border-b border-neutral-500 bg-primary/[.9] px-5 py-2 backdrop-blur-sm transition-all md:justify-center md:gap-32 xl:gap-36"
    >
      <RouterLink to="/">
        <img src="goat.png" alt="" class="max-w-[42px]" />
      </RouterLink>
      <div class="hidden gap-12 font-semibold md:flex lg:gap-16">
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/projects">Projects</RouterLink>
        <RouterLink to="/about">About</RouterLink>
        <p>Contact</p>
      </div>
      <button
        class="hidden h-8 w-16 cursor-pointer items-center rounded-full bg-black pl-1 hover:outline hover:outline-neutral-500 md:flex"
        type="button"
        @click="darkMode = !darkMode"
      >
        <div
          class="flex h-6 w-6 items-center justify-center rounded-full bg-slate-600 transition-all"
          :class="{ 'translate-x-8': darkMode }"
        >
          <i class="fa-solid" :class="darkMode ? 'fa-moon' : 'fa-sun'"></i>
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
          class="fixed inset-0 top-[60px] z-30 bg-black/[.5] backdrop-blur-sm"
          @click.self="navOpened = false"
        />
      </SmartTransition>
      <SmartTransition name="slide-from-right">
        <div
          v-if="navOpened"
          class="fixed right-1 top-[60px] z-40 h-80 w-80 rounded-b bg-primary-dark"
        >
          <div class="grid gap-4 p-5 text-lg font-semibold">
            <RouterLink to="/">Home</RouterLink>
            <RouterLink to="/projects">Projects</RouterLink>
            <RouterLink to="/about">About</RouterLink>
            <p>Contact</p>
            <div class="flex gap-8">
              <a href="#">
                <i class="fa-brands fa-linkedin fa-lg"></i>
              </a>
              <a href="#">
                <i class="fa-brands fa-instagram fa-lg"></i>
              </a>
              <a href="#">
                <i class="fa-brands fa-github fa-lg"></i>
              </a>
              <a href="#">
                <i class="fa-brands fa-twitter fa-lg"></i>
              </a>
            </div>
            <div>
              <hr class="mb-3" />
              <button
                class="flex w-full items-center justify-center gap-5 rounded bg-neutral-700 py-3"
              >
                <i class="fa-solid fa-sun"></i>
                <span>Switch to light theme</span>
              </button>
            </div>
          </div>
        </div>
      </SmartTransition>
    </Teleport>
  </nav>
  <RouterView v-slot="{ Component }" class="h-[4000px]">
    <SmartTransition name="fade-up" mode="out-in" duration="500">
      <component :is="Component" />
    </SmartTransition>
  </RouterView>
</template>

<style scoped>
hr {
  border: none;
  height: 1px;
  background-color: #333;
}
</style>
