<script setup>
import TopWave from '@/components/wave-svgs/TopWave.vue';
import { inject, ref } from 'vue';
import supabase from '@/lib/supabase-client.js';
import navLinks from '@/assets/constants/nav-links';

const year = new Date().getFullYear();

const startOverlay = inject('start-overlay');
const endOverlay = inject('end-overlay');

const name = ref('');
const email = ref('');
const subject = ref('');
const message = ref('');

function resetFormFields() {
  name.value = '';
  email.value = '';
  subject.value = '';
  message.value = '';
}

async function submitEmail() {
  try {
    startOverlay();

    const emailRow = {
      name: name.value,
      email: email.value,
      subject: subject.value,
      message: message.value,
    };

    const { error } = await supabase.from('emails').insert(emailRow);

    if (error) {
      throw error;
    }

    resetFormFields();
  } catch (e) {
    // not handling just yet
  } finally {
    endOverlay();
  }
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
            @submit.prevent="submitEmail"
          >
            <div class="flex flex-col">
              <label class="text-sm font-semibold dark:text-alternate-100">Name</label>
              <input
                v-model.trim="name"
                type="text"
                class="rounded border border-primary-100 bg-slate-50 px-2 py-1.5 text-coal-800 dark:border-primary-400 dark:bg-slate-400"
                required
              />
            </div>

            <div class="flex flex-col">
              <label class="text-sm font-semibold dark:text-alternate-100">Email</label>
              <input
                v-model.trim="email"
                type="email"
                class="rounded border border-primary-100 bg-slate-50 px-2 py-1.5 text-coal-800 dark:border-primary-400 dark:bg-slate-400"
                required
              />
            </div>

            <div class="col-span-2 flex flex-col">
              <label class="text-sm font-semibold dark:text-alternate-100">Subject</label>
              <input
                v-model.trim="subject"
                type="text"
                class="rounded border border-primary-100 bg-slate-50 px-2 py-1.5 dark:border-primary-400 dark:bg-slate-400 dark:text-coal-800"
                required
              />
            </div>
            <div class="col-span-2 flex flex-col">
              <label class="text-sm font-semibold dark:text-alternate-100">Message</label>
              <textarea
                v-model.trim="message"
                rows="8"
                cols="70"
                class="rounded border border-primary-100 bg-slate-50 px-2 py-1.5 dark:border-primary-400 dark:bg-slate-400 dark:text-coal-800"
                required
              />
            </div>

            <button
              class="col-end-3 rounded bg-slate-400 py-2 font-semibold transition-all hover:bg-slate-500 hover:ring hover:ring-alternate-600 hover:ring-offset-1 hover:ring-offset-alternate-200 dark:bg-slate-800 dark:hover:bg-slate-600 dark:hover:ring-slate-400 dark:hover:ring-offset-slate-800"
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
              <RouterLink
                v-for="(link, i) in navLinks"
                :key="i"
                v-slot="{ isActive }"
                :to="link"
                active-class="text-alternate dark:text-alternate-400"
                @click="navOpened = false"
              >
                <span :class="{ 'transition-all hover:text-gray-500': !isActive }">
                  {{ link.displayName }}
                </span>
              </RouterLink>
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
