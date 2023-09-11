<script setup>
import { buildTagUrl } from '@/assets/utility';

defineProps({
  experience: {
    type: Object,
    required: true,
  },
});
</script>

<template>
  <a
    href="#"
    class="mb-14 flex flex-col gap-1 rounded transition-all lg:mb-8 lg:cursor-pointer lg:p-6 lg:hover:!bg-alternate-100 lg:hover:!opacity-100 lg:hover:!drop-shadow-lg lg:group-hover:opacity-50 lg:hover:dark:!bg-slate-700"
  >
    <div>
      <p class="text-xs font-semibold uppercase tracking-wide">{{ experience.date }}</p>
    </div>
    <div>
      <div class="mb-3 font-bold dark:text-slate-400">
        {{ experience.title }} - {{ experience.company }}
        <span class="ml-2">
          <i class="fa-solid fa-arrow-up-right-from-square fa-sm" />
        </span>
      </div>
      <p class="mb-4 text-sm leading-relaxed tracking-wide">
        {{ experience.summary }}
      </p>
      <div class="flex flex-wrap gap-2">
        <div v-for="tag in experience.tags" :key="tag.text">
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
