<script setup>
defineEmits(['link-clicked']);
</script>

<template>
  <RouterLink
    v-slot="{ isActive }"
    to="/"
    active-class="text-alternate dark:text-alternate-400"
    @click="$emit('link-clicked')"
  >
    <span :class="{ 'transition-all hover:text-gray-500': !isActive }">Home</span>
  </RouterLink>
  <RouterLink
    v-slot="{ isActive }"
    to="/projects"
    active-class="text-alternate dark:text-alternate-400"
    @click="$emit('link-clicked')"
  >
    <span :class="{ 'transition-all hover:text-gray-500': !isActive }">Projects</span>
  </RouterLink>
  <RouterLink
    v-slot="{ isActive }"
    to="/about"
    active-class="text-alternate dark:text-alternate-400"
    @click="$emit('link-clicked')"
  >
    <span :class="{ 'transition-all hover:text-gray-500': !isActive }">About</span>
  </RouterLink>
  <RouterLink
    :to="{ name: 'home', hash: '#contact' }"
    class="transition-all hover:text-gray-500"
    @click="$emit('link-clicked')"
  >
    Contact
  </RouterLink>
</template>
