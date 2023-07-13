<script setup>
import { computed, ref } from 'vue';
import { usePerspective } from '@/composables/perspective.js';

const props = defineProps({
  perspective: {
    type: Boolean,
    default: false,
  },
});

const statCard = ref(null);
const { transformClass } = usePerspective(statCard);

const statCardUrl = computed(() => {
  const url = new URL('https://github-readme-stats.vercel.app/api');
  url.searchParams.append('username', 'devloos');
  url.searchParams.append('count_private', 'true');
  url.searchParams.append('show_icons', 'true');
  url.searchParams.append('include_all_commits', 'true');
  url.searchParams.append('icon_color', '1e81b0');
  url.searchParams.append('bg_color', '333');
  url.searchParams.append('text_color', 'f1f5f9');
  url.searchParams.append('title_color', 'f1f5f9');
  url.searchParams.append('border_color', '699cd5');
  url.searchParams.append('disable_animations', 'true');
  return url;
});
</script>
<template>
  <img
    ref="statCard"
    class="mx-auto"
    :class="{ perspective: props.perspective }"
    :src="statCardUrl"
    alt=""
  />
</template>

<style scoped lang="scss">
.perspective {
  transform: v-bind(transformClass);
  transition: transform 0.25s ease-out;
}
</style>
