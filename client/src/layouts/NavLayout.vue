<script setup>
import SmartNav from '@/components/smart/SmartNav.vue';
import SmartImg from '@/components/smart/SmartImg.vue';
</script>
<template>
  <div>
    <SmartImg
      class="absolute -top-28 left-0 right-0 -z-40 mx-auto sm:-top-48 md:-top-96"
      src="/tplos/portfolio/rays.png"
      width="927"
      height="807"
      alt="rays"
      is-transparent
    />
    <SmartNav />
    <slot />
  </div>
</template>
