<template>
  <RouterLink
    to="/"
    active-class="text-alternate dark:text-alternate-light hover:text-alternate hover:dark:text-alternate-light"
    class="hover:text-gray-500"
  >
    Home
  </RouterLink>
  <RouterLink
    to="/projects"
    active-class="text-alternate dark:text-alternate-light hover:text-alternate hover:dark:text-alternate-light"
    class="hover:text-gray-500"
  >
    Projects
  </RouterLink>
  <RouterLink
    to="/about"
    active-class="text-alternate dark:text-alternate-light hover:text-alternate hover:dark:text-alternate-light"
    class="hover:text-gray-500"
  >
    About
  </RouterLink>
  <RouterLink :to="{ name: 'home', hash: '#contact' }" class="hover:text-gray-500">
    Contact
  </RouterLink>
</template>
