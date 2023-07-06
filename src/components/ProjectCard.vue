<script setup>
import { buildTagUrl } from '@/assets/utility';
import { ref, toRefs } from 'vue';

const props = defineProps({
  project: {
    type: Object,
    required: true,
  },
});

const { project } = toRefs(props);

const vid = ref(null);

function playVideo() {
  vid.value.play();
}

function resetVideo() {
  vid.value.pause();
  vid.value.currentTime = 0;
}
</script>

<template>
  <div
    class="group flex h-full max-w-xl flex-col rounded shadow-lg dark:shadow-2xl"
    @mouseover="playVideo()"
    @mouseleave="resetVideo()"
  >
    <video
      v-if="project.file.type === 'video'"
      ref="vid"
      :src="project.file.src"
      class="rounded-t grayscale transition duration-300 ease-in group-hover:grayscale-0"
      muted
    />
    <img
      v-else
      :src="project.file.src"
      alt=""
      class="rounded-t grayscale transition duration-300 ease-in group-hover:grayscale-0"
    />
    <div class="flex grow flex-col justify-between px-4 py-2">
      <div>
        <h5 class="mb-1 font-semibold text-alternate dark:text-alternate-300">
          {{ project.title }}
        </h5>
        <p class="mb-2 text-sm">
          {{ project.desc }}
        </p>
        <div class="mb-2 flex flex-wrap items-center justify-start gap-2">
          <img
            v-for="tag in project.tags"
            :key="tag.text"
            :src="
              buildTagUrl({
                text: tag.text,
                backgroundColor: '333',
                logo: tag.logo,
              })
            "
            alt=""
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
