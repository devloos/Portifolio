<script setup>
import SmartTransition from '@/components/smart/SmartTransition.vue';
import SmartNav from '@/components/smart/SmartNav.vue';
import SmartFooter from '@/components/smart/SmartFooter.vue';
import SmartImg from '@/components/smart/SmartImg.vue';
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
  <SmartNav />
  <RouterView v-slot="{ Component }" class="router-view">
    <SmartTransition name="fade-up" mode="out-in" duration="500">
      <component :is="Component" />
    </SmartTransition>
  </RouterView>
  <SmartFooter />
</template>

<style scoped lang="scss">
.router-view {
  min-height: calc(100vh - 460px);
}
</style>
