<script setup>
import StyledButton from '@/components/styled/StyledButton.vue';
</script>
<template>
  <div class="flex flex-col justify-center gap-3 p-2 sm:items-center">
    <h1 class="text-6xl font-bold">Not Found</h1>
    <h2 class="mb-4 text-2xl">Sorry, there is nothing at this URL.</h2>
    <RouterLink to="/" class="group">
      <StyledButton
        class="bg-alternate-300 ring-1 ring-primary-400 dark:bg-slate-700 dark:ring-slate-400"
      >
        <i
          class="fa-solid fa-chevron-left me-2 transition-transform group-hover:translate-x-[-2px]"
        />
        <span>Go back home</span>
      </StyledButton>
    </RouterLink>
  </div>
</template>
