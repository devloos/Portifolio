<script setup>
import SmartNav from '@/components/smart/SmartNav.vue';
import SmartFooter from '@/components/smart/SmartFooter.vue';
import SmartImg from '@/components/smart/SmartImg.vue';
import { useAnimate } from '@vueuse/core';
import { ref, watchEffect } from 'vue';

const nimbus = ref(null);
const nimbusKeyframes = [
  { transform: 'translateX(-0.5rem)' },
  { transform: 'translateX(0.5rem)' },
];

const { playState: nimbusPlayState, play: nimbusPlay } = useAnimate(
  nimbus,
  nimbusKeyframes,
  {
    duration: 2500,
    direction: 'alternate',
    iterations: 2,
  },
);

watchEffect(() => {
  if (nimbusPlayState.value === 'finished') {
    nimbusPlay();
  }
});
</script>

<template>
  <SmartImg
    class="absolute -top-28 left-0 right-0 -z-40 mx-auto sm:-top-48 md:-top-96"
    src="/tplos/portfolio/rays.png"
    width="927"
    height="807"
    alt="rays"
    is-transparent
  />
  <div>
    <div class="hidden md:block">
      <img
        class="fixed z-50 md:bottom-16 md:left-4 md:w-28 lg:bottom-24 lg:left-7 lg:w-32"
        src="/avatar.png"
        alt="avatar"
      />
      <img
        ref="nimbus"
        class="z-50 md:fixed md:bottom-2 md:left-2 md:w-40 lg:w-52"
        src="/nimbus.png"
        alt="nimbus"
      />
    </div>
    <SmartNav />
    <div class="pb-12">
      <slot />
    </div>
    <SmartFooter />
  </div>
</template>
