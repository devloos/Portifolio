<template>
  <RouterLink
    to="/"
    active-class="text-alternate-500 dark:text-alternate-400 hover:text-alternate-500 hover:dark:text-alternate-400"
    class="hover:text-gray-500"
  >
    Home
  </RouterLink>
  <RouterLink
    to="/projects"
    active-class="text-alternate-500 dark:text-alternate-400 hover:text-alternate-500 hover:dark:text-alternate-400"
    class="hover:text-gray-500"
  >
    Projects
  </RouterLink>
  <RouterLink
    to="/about"
    active-class="text-alternate-500 dark:text-alternate-400 hover:text-alternate-500 hover:dark:text-alternate-400"
    class="hover:text-gray-500"
  >
    About
  </RouterLink>
  <RouterLink :to="{ name: 'home', hash: '#contact' }" class="hover:text-gray-500">
    Contact
  </RouterLink>
</template>
