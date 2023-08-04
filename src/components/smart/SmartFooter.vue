<script setup>
import TopWave from '@/components/wave-svgs/TopWave.vue';
import PageLinks from '@/components/PageLinks.vue';

const year = new Date().getFullYear();

function contactSubmit() {
  console.log('this');
}
</script>
<template>
  <div class="relative pt-12">
    <TopWave class="fill-alternate-100 dark:fill-slate-700" />
    <div class="bg-alternate-100 dark:bg-slate-700">
      <div
        class="mx-auto mt-1 flex max-w-5xl flex-col items-center justify-between gap-x-12 gap-y-8 px-4 lg:flex-row-reverse"
      >
        <div id="contact">
          <form
            class="mx-auto grid max-w-lg grid-cols-2 gap-3"
            @submit.prevent="contactSubmit"
          >
            <div class="flex flex-col">
              <label class="text-sm font-semibold dark:text-alternate-100">Name</label>
              <input
                type="text"
                class="rounded border border-primary-100 bg-slate-50 px-2 py-1.5 text-coal-800 dark:border-primary-400 dark:bg-slate-400"
                required
              />
            </div>

            <div class="flex flex-col">
              <label class="text-sm font-semibold dark:text-alternate-100">Email</label>
              <input
                type="email"
                class="rounded border border-primary-100 bg-slate-50 px-2 py-1.5 text-coal-800 dark:border-primary-400 dark:bg-slate-400"
                required
              />
            </div>

            <div class="col-span-2 flex flex-col">
              <label class="text-sm font-semibold dark:text-alternate-100">Message</label>
              <textarea
                rows="8"
                cols="70"
                class="rounded border border-primary-100 bg-slate-50 px-2 py-1.5 dark:border-primary-400 dark:bg-slate-400 dark:text-coal-800"
                required
              />
            </div>

            <button
              class="col-end-3 rounded bg-alternate-300 py-2 font-semibold transition-all hover:bg-alternate-400 hover:ring hover:ring-alternate-600 hover:ring-offset-1 hover:ring-offset-alternate-200 dark:bg-slate-800 dark:hover:bg-slate-600 dark:hover:ring-slate-400 dark:hover:ring-offset-slate-800"
              type="submit"
            >
              Submit
            </button>
          </form>
        </div>
        <div class="flex justify-around gap-28 text-xl lg:text-2xl">
          <div>
            <h4 class="mb-3 text-center font-bold underline">Navigation</h4>
            <div class="grid grid-cols-2 gap-y-2 lg:grid-cols-1">
              <PageLinks />
            </div>
          </div>
          <div>
            <h4 class="mb-3 text-center font-bold underline">Connect</h4>
            <div class="grid grid-cols-3 gap-3 text-lg">
              <a
                class="transition-all hover:text-gray-500"
                href="https://www.linkedin.com/in/aguilerac"
                target="_blank"
              >
                <i class="fa-brands fa-linkedin fa-lg"></i>
              </a>
              <a
                class="transition-all hover:text-gray-500"
                href="https://www.instagram.com/devloos"
                target="_blank"
              >
                <i class="fa-brands fa-instagram fa-lg"></i>
              </a>
              <a
                class="transition-all hover:text-gray-500"
                href="https://github.com/devloos"
                target="_blank"
              >
                <i class="fa-brands fa-github fa-lg"></i>
              </a>
              <a
                class="transition-all hover:text-gray-500"
                href="https://twitter.com/18aguilerac"
                target="_blank"
              >
                <i class="fa-brands fa-twitter fa-lg"></i>
              </a>
              <a
                class="transition-all hover:text-gray-500"
                href="https://leetcode.com/devlos/"
                target="_blank"
              >
                <i class="fa-solid fa-gear fa-lg"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <p class="py-5 text-center text-gray-500 dark:text-gray-400">
        &copy; {{ year }} Carlos Aguilera
      </p>
    </div>
  </div>
</template>
