<script setup>
import { inject, ref } from 'vue';
import supabase from '@/lib/supabase-client.js';

const startOverlay = inject('start-overlay');
const stopOverlay = inject('stop-overlay');

const form = ref(null);

const name = ref('');
const email = ref('');
const subject = ref('');
const message = ref('');

async function sendEmail() {
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

    form.value.reset();
  } catch (e) {
    // need to add toast still
  } finally {
    stopOverlay();
  }
}
</script>

<template>
  <div class="container mb-28 mt-10 px-2 md:mt-16">
    <div class="mb-12 text-center">
      <p class="mx-auto max-w-xl font-mono text-4xl tracking-wide dark:text-slate-200">
        Let's discuss project ideas or share knowledge with each other.
      </p>
    </div>
    <form ref="form" @submit.prevent="sendEmail">
      <div class="mx-auto mb-8 grid max-w-2xl grid-cols-1 gap-5 sm:grid-cols-2">
        <div class="flex flex-col gap-2">
          <label class="text-sm font-semibold tracking-wide dark:text-alternate-100">
            Name
          </label>
          <input
            v-model.trim="name"
            type="text"
            class="rounded bg-inherit px-2 py-3 text-primary-600 shadow-sm ring-1 ring-primary-100 transition-all focus:outline-none focus:ring-2 focus:ring-primary-400 dark:text-slate-200 dark:ring-primary-200"
            required
          />
        </div>

        <div class="flex flex-col gap-2">
          <label class="text-sm font-semibold tracking-wide dark:text-alternate-100">
            Email
          </label>
          <input
            v-model.trim="email"
            type="text"
            class="rounded bg-inherit px-2 py-3 text-primary-600 shadow-sm ring-1 ring-primary-100 transition-all focus:outline-none focus:ring-2 focus:ring-primary-400 dark:text-slate-200 dark:ring-primary-200"
            required
          />
        </div>

        <div class="flex flex-col gap-2 sm:col-span-2">
          <label class="text-sm font-semibold tracking-wide dark:text-alternate-100">
            Subject
          </label>
          <input
            v-model.trim="subject"
            type="text"
            class="rounded bg-inherit px-2 py-3 text-primary-600 shadow-sm ring-1 ring-primary-100 transition-all focus:outline-none focus:ring-2 focus:ring-primary-400 dark:text-slate-200 dark:ring-primary-200"
            required
          />
        </div>

        <div class="flex flex-col gap-2 sm:col-span-2">
          <label class="text-sm font-semibold tracking-wide dark:text-alternate-100">
            Message
          </label>
          <textarea
            v-model.trim="message"
            rows="8"
            cols="70"
            class="rounded bg-inherit px-2 py-3 text-primary-600 shadow-sm ring-1 ring-primary-100 transition-all focus:outline-none focus:ring-2 focus:ring-primary-400 dark:text-slate-200 dark:ring-primary-200"
            required
          />
        </div>
      </div>

      <div class="flex justify-center">
        <button
          class="mx-auto rounded bg-slate-300 px-14 py-2.5 tracking-wide ring-1 ring-primary-200 transition-all hover:ring-2 hover:ring-primary dark:bg-slate-600 dark:ring-slate-400 dark:hover:ring-primary-200"
          type="submit"
        >
          Send Email
        </button>
      </div>
    </form>
  </div>
</template>