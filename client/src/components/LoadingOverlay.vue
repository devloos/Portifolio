<script setup>
import SmartTransition from '@/components/smart/SmartTransition.vue';
import { watch } from 'vue';
import LoadingIndicator from '@/components/LoadingIndicator.vue';

const props = defineProps({
  loading: {
    type: Boolean,
    default: false,
  },
});

watch(
  () => props.loading,
  (newValue) => {
    document.body.style.overflow = newValue ? 'hidden' : 'visible';
  },
);
</script>

<template>
  <Teleport to="body">
    <SmartTransition name="fade">
      <div
        v-if="loading"
        class="fixed inset-0 z-50 bg-gray-700/[.5] text-center backdrop:blur"
      >
        <LoadingIndicator />
      </div>
    </SmartTransition>
  </Teleport>
</template>
