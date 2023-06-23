<script setup>
import { useWindowSize } from '@vueuse/core';
import { ref, watch } from 'vue';
import { RouterView, useRoute } from 'vue-router';
import SmartTransition from '@/components/smart/SmartTransition.vue';

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
      class="z-50 flex items-center justify-between border-b border-neutral-500 bg-primary/[.9] px-5 py-2 backdrop-blur-sm transition-all md:justify-center md:gap-32"
    >
      <RouterLink to="/">
        <img src="goat.png" alt="" class="max-w-[48px]" />
      </RouterLink>
      <div class="hidden gap-12 font-semibold md:flex">
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/projects">Projects</RouterLink>
        <RouterLink to="/about">About</RouterLink>
        <p>Contact</p>
      </div>
      <div class="hidden md:block">dljdkjjkl</div>
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
          class="fixed inset-0 top-[65px] z-30 bg-black/[.5] backdrop-blur-sm"
          @click.self="navOpened = false"
        />
      </SmartTransition>
      <SmartTransition name="slide-from-right">
        <div
          v-if="navOpened"
          class="fixed right-1 top-[65px] z-40 h-80 w-80 rounded-b bg-primary-dark"
        >
          <div class="grid gap-4 p-5 text-lg font-semibold">
            <RouterLink to="/">Home</RouterLink>
            <RouterLink to="/projects">Projects</RouterLink>
            <RouterLink to="/about">About</RouterLink>
            <p>Contact</p>
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
