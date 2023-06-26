<template>
  <RouterLink
    v-slot="{ isActive }"
    to="/"
    active-class="text-alternate-500 dark:text-alternate-400"
  >
    <span :class="{ 'hover:text-gray-500': !isActive }">Home</span>
  </RouterLink>
  <RouterLink
    v-slot="{ isActive }"
    to="/projects"
    active-class="text-alternate-500 dark:text-alternate-400"
  >
    <span :class="{ 'hover:text-gray-500': !isActive }">Projects</span>
  </RouterLink>
  <RouterLink
    v-slot="{ isActive }"
    to="/about"
    active-class="text-alternate-500 dark:text-alternate-400"
  >
    <span :class="{ 'hover:text-gray-500': !isActive }">About</span>
  </RouterLink>
  <RouterLink :to="{ name: 'home', hash: '#contact' }" class="hover:text-gray-500">
    Contact
  </RouterLink>
</template>
