<script setup>
import { buildTagUrl, getImageKitUrl } from '@/assets/utility';
import { toRefs } from 'vue';
import SmartImg from '@/components/smart/SmartImg.vue';

const props = defineProps({
  project: {
    type: Object,
    required: true,
  },
});

const { project } = toRefs(props);
</script>

<template>
  <div class="group flex h-full max-w-xl flex-col rounded shadow-lg dark:shadow-2xl">
    <video
      v-if="project.file.type === 'video'"
      class="rounded-t"
      :src="getImageKitUrl(project.file.src)"
      muted
      autoplay
      loop
    />
    <SmartImg
      v-else
      class="rounded-t"
      :src="project.file.src"
      width="3454"
      height="1924"
      :alt="project.title"
    />
    <div class="flex grow flex-col justify-between px-4 py-2">
      <div>
        <h5 class="mb-1 font-semibold text-alternate dark:text-alternate-200">
          {{ project.title }}
        </h5>
        <p class="mb-2 text-sm">
          {{ project.description }}
        </p>
        <div class="mb-2 flex flex-wrap items-center justify-start gap-2">
          <img
            v-for="tag in project.tags"
            :key="tag.id"
            :src="
              buildTagUrl({
                text: tag.title,
                backgroundColor: '333',
                logo: tag.logoName,
              })
            "
            loading="lazy"
            :alt="tag.title"
          />
        </div>
      </div>
      <div>
        <a
          v-if="project?.site"
          class="mr-4 text-sm text-primary-400 underline underline-offset-2 transition-colors hover:text-primary-600 dark:text-slate-400 dark:hover:text-slate-500"
          :href="project.site"
          target="_blank"
        >
          Visit Site
        </a>
        <a
          v-if="project?.source"
          class="text-sm text-primary-400 underline underline-offset-2 transition-colors hover:text-primary-600 dark:text-slate-400 dark:hover:text-slate-500"
          :href="project.source"
          target="_blank"
        >
          View Source
        </a>
      </div>
    </div>
  </div>
</template>
