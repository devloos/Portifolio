<template>
  <RouterLink to="/" active-class="text-alternate dark:text-alternate-light">
    Home
  </RouterLink>
  <RouterLink to="/projects" active-class="text-alternate dark:text-alternate-light">
    Projects
  </RouterLink>
  <RouterLink to="/about" active-class="text-alternate dark:text-alternate-light">
    About
  </RouterLink>
  <RouterLink :to="{ name: 'home', hash: '#contact' }">Contact</RouterLink>
</template>
