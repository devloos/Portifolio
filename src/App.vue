<script setup>
import SmartTransition from '@/components/smart/SmartTransition.vue';
import Navbar from '@/components/Navbar.vue';
</script>

<template>
  <img
    class="absolute -top-28 left-0 right-0 -z-50 mx-auto sm:-top-48 md:-top-64 lg:-top-72"
    src="rays.png"
    alt="rays"
  />
  <Navbar />
  <RouterView v-slot="{ Component }" class="h-[4000px]">
    <SmartTransition name="fade-up" mode="out-in" duration="500">
      <component :is="Component" />
    </SmartTransition>
  </RouterView>
</template>
