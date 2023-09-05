<script setup>
import { buildTagUrl } from '@/assets/utility';
import tech from '@/assets/constants/tech';

defineProps({
  experience: {
    type: Object,
    default: () => {},
  },
});
</script>

<template>
  <a
    href="#"
    class="mb-14 flex flex-col gap-1 rounded transition-all lg:mb-8 lg:cursor-pointer lg:p-6 lg:hover:!bg-alternate-100 lg:hover:!opacity-100 lg:hover:!drop-shadow-lg lg:group-hover:opacity-50 lg:hover:dark:!bg-slate-700"
  >
    <div>
      <p class="text-xs font-semibold uppercase tracking-wide">2018 - PRESENT</p>
    </div>
    <div>
      <a href="#" class="mb-3 font-bold dark:text-slate-400">
        Lead Engineer - Ethika
        <span class="ml-2">
          <i class="fa-solid fa-arrow-up-right-from-square fa-sm" />
        </span>
      </a>
      <p class="mb-4 text-sm leading-relaxed tracking-wide">
        Deliver high-quality, robust production code for a diverse array of projects for
        clients including Harvard Business School, Everytown for Gun Safety, Pratt
        Institute, Koala Health, Vanderbilt University, The 19th News, and more. Provide
        leadership within engineering department through close collaboration, knowledge
        shares, and mentorship.
      </p>
      <div class="flex flex-wrap gap-2">
        <div v-for="tag in tech.slice(6)" :key="tag.text">
          <a
            :href="tag.url"
            target="_blank"
            class="inline-block transition-all hover:opacity-80"
          >
            <img
              :src="
                buildTagUrl({
                  text: tag.text,
                  backgroundColor: '333',
                  logo: tag.logo,
                })
              "
              alt=""
            />
          </a>
        </div>
      </div>
    </div>
  </a>
</template>
