<script setup>
import TheWelcome from '../components/TheWelcome.vue';
</script>

<template>
  <main>
    <TheWelcome />
    <div v-for="i in 4" :key="i">{{ i }}</div>
  </main>
</template>
