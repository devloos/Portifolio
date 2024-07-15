<script setup>
import { computed, provide, ref } from 'vue';
import SmartTransition from '@/components/smart/SmartTransition.vue';
import LoadingOverlay from '@/components/LoadingOverlay.vue';
import { useRoute } from 'vue-router';
import { useDark } from '@vueuse/core';

const route = useRoute();

const layout = computed(() => route.meta.layout || 'DefaultLayout');
const isLoading = ref(false);

provide('start-overlay', () => (isLoading.value = true));
provide('stop-overlay', () => (isLoading.value = false));

useDark();
</script>

<template>
  <LoadingOverlay :loading="isLoading" />
  <SmartTransition name="fade" mode="out-in">
    <component :is="layout">
      <RouterView v-slot="{ Component }" class="router-view">
        <SmartTransition name="fade-up" mode="out-in" duration="500">
          <component :is="Component" />
        </SmartTransition>
      </RouterView>
    </component>
  </SmartTransition>
</template>

<style scoped lang="scss">
.router-view {
  min-height: calc(100vh - 460px);
}
</style>
