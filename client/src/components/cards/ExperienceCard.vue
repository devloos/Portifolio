<script setup>
import { buildTagUrl } from '@/assets/utility';
import SmartSvg from '@/components/smart/SmartSvg.vue';

defineProps({
  experience: {
    type: Object,
    required: true,
  },
});
</script>

<template>
  <a
    :href="experience.url"
    target="_blank"
    class="group/card mb-14 flex flex-col gap-1 rounded transition-all lg:mb-8 lg:cursor-pointer lg:p-6"
  >
    <div>
      <p class="text-xs font-semibold uppercase tracking-wide">{{ experience.date }}</p>
    </div>
    <div>
      <div class="mb-3 font-bold dark:text-slate-400">
        {{ experience.title }} - {{ experience.company }}
        <SmartSvg
          class="mb-1 ml-1 inline w-5 transition-all group-hover/card:-translate-y-1 group-hover/card:translate-x-1"
          name="SquareArrowSvg"
        />
      </div>
      <p class="mb-4 text-sm leading-relaxed tracking-wide">
        {{ experience.summary }}
      </p>
      <div class="flex flex-wrap gap-2">
        <div v-for="tag in experience.tags" :key="tag.text">
          <a
            href="/"
            target="_blank"
            :aria-label="tag.text"
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
