<script setup>
import { inject, ref } from 'vue';
import supabase from '@/lib/supabase-client.js';

const startOverlay = inject('start-overlay');
const endOverlay = inject('end-overlay');

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
    endOverlay();
  }
}
</script>

<template>
  <div class="container mt-10 px-2 md:mt-16">
    <div class="mb-12 text-center">
      <p class="mx-auto max-w-xl font-mono text-4xl tracking-wide">
        I’m excited to learn about your project. Ready to get started?
      </p>
    </div>
    <form
      ref="form"
      class="mx-auto grid max-w-lg grid-cols-2 gap-3"
      @submit.prevent="sendEmail"
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
</template>

<style></style>
