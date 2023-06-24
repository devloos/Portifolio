<script setup>
import SmartTransition from '@/components/smart/SmartTransition.vue';
import Navbar from '@/components/Navbar.vue';
</script>

<template>
  <Navbar />
  <RouterView v-slot="{ Component }" class="h-[4000px]">
    <SmartTransition name="fade-up" mode="out-in" duration="500">
      <component :is="Component" />
    </SmartTransition>
  </RouterView>
</template>
