<script setup>
import { inject, ref } from 'vue';
import StyledButton from '@/components/styled/StyledButton.vue';
import { useSmartFetch } from '@/composables/smart-fetch';

const startOverlay = inject('start-overlay');
const stopOverlay = inject('stop-overlay');

const form = ref(null);

const name = ref('');
const email = ref('');
const subject = ref('');
const message = ref('');

async function sendEmail() {
  startOverlay();

  const body = {
    name: name.value,
    email: email.value,
    subject: subject.value,
    message: message.value,
  };

  const response = await useSmartFetch({
    url: '/api/email/create',
    method: 'POST',
    data: body,
  });

  if (response.success) {
    form.value.reset();
  }

  stopOverlay();
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
            type="email"
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
        <StyledButton
          class="mx-auto bg-slate-300 !px-14 tracking-wide ring-1 ring-primary-400 dark:bg-primary-600 dark:ring-slate-400"
        >
          Send Email
        </StyledButton>
      </div>
    </form>
  </div>
</template>
