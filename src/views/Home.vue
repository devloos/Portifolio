<script setup>
// Todo change to grabbing from backend
function downloadResume() {
  const anchor = document.createElement('a');
  anchor.setAttribute('href', '/Aguilera-CV.pdf');
  anchor.setAttribute('download', '');
  document.body.appendChild(anchor);
  anchor.click();
  anchor.parentNode.removeChild(anchor);
}
</script>
<template>
  <main class="container max-w-6xl">
    <div
      class="mx-auto mb-24 flex max-w-4xl flex-col items-center justify-center gap-4 pt-8 md:flex-row-reverse md:gap-2 md:px-3 md:pt-20"
    >
      <img
        class="mx-auto max-w-[150px] self-center rounded-full border border-slate-700"
        src="stud.jpg"
        alt="stud"
      />
      <div class="grow px-2 text-center md:text-start">
        <p class="mb-7 max-w-xl px-1 text-2xl font-semibold md:text-3xl">
          Hey! My name is Carlos. I work as a Web Developer at Ethika Inc.
        </p>
        <div class="px-2">
          <button
            class="mr-6 rounded bg-alternate-400 px-5 py-2 ring-2 ring-gray-500 transition-all hover:bg-alternate-500 dark:bg-alternate-600 dark:ring-slate-600 hover:dark:bg-alternate-500"
            @click.prevent="downloadResume"
          >
            <div class="flex items-center justify-center gap-3">
              <p>Resume</p>
              <i class="fa-solid fa-download"></i>
            </div>
          </button>
          <RouterLink
            to="/projects"
            class="inline-block rounded bg-slate-300 px-5 py-2 ring-2 ring-slate-500 hover:bg-slate-400 dark:bg-slate-700 dark:ring-slate-500 hover:dark:bg-slate-600"
          >
            <div class="flex items-center justify-center gap-3">
              <p>Projects</p>
              <i class="fa-solid fa-arrow-right"></i>
            </div>
          </RouterLink>
        </div>
      </div>
    </div>
    <h4 class="mb-6 text-center text-lg font-semibold">Featured Projects</h4>
    <div class="grid grid-cols-1 place-items-center gap-6 px-3 lg:grid-cols-2">
      <div
        v-for="(i, n) in 4"
        :key="n"
        class="max-w-xl rounded shadow-lg grayscale transition duration-300 ease-in hover:grayscale-0 dark:shadow-2xl"
      >
        <img class="rounded-t" src="test.jpg" alt="" />
        <div class="px-4 py-2">
          <h5 class="mb-1 font-semibold text-alternate-500 dark:text-alternate-300">
            El Andariego
          </h5>
          <p class="mb-3 text-sm">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore dolores, nisi
            quibusdam voluptates, minima perspiciatis aut porro, provident
          </p>
          <a
            class="mr-4 text-sm text-primary-400 underline underline-offset-2 transition-colors hover:text-primary-600 dark:text-slate-400 dark:hover:text-slate-500"
            href="https://www.elandariegotruck.com/"
            target="_blank"
          >
            Visit Site
          </a>
          <a
            class="text-sm text-primary-400 underline underline-offset-2 transition-colors hover:text-primary-600 dark:text-slate-400 dark:hover:text-slate-500"
            href="https://github.com/devloos/El-Andariego"
            target="_blank"
          >
            View Source
          </a>
        </div>
      </div>
    </div>
  </main>
</template>
