<template>
  <div class="flex flex-col justify-center gap-3 p-2 sm:items-center">
    <h1 class="text-6xl font-bold">Not Found</h1>
    <h2 class="mb-4 text-2xl">Sorry, there is nothing at this URL.</h2>
    <RouterLink to="/" class="hover:text-primary-300">
      <div>
        <i class="fa-solid fa-chevron-left me-2"></i>
        <span>Go back home</span>
      </div>
    </RouterLink>
  </div>
</template>
