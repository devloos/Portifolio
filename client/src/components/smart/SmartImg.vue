<script setup>
import { computed } from 'vue';
import { getImageKitUrl } from '@/assets/utility';

const props = defineProps({
  src: {
    type: String,
    required: true,
  },
  alt: {
    type: String,
    required: true,
  },
  width: {
    type: [Number, String],
    required: true,
  },
  height: {
    type: [Number, String],
    required: true,
  },
  isTransparent: {
    type: Boolean,
    default: false,
  },
  loading: {
    type: String,
    default: 'lazy',
  },
});

// standard sizes taken from https://github.com/HCESrl/responsive-image-sizes/blob/master/src/index.js
const STANDARD_SCREEN_WIDTHS = [
  2880,
  2560, // 2K iMac
  2048, // iPad Landscape
  1920,
  1680,
  1536,
  1440,
  1366,
  1242, // iphone 13+ 414 * 3 dpr
  1024,
  828,
  720,
  640,
  400,
  200,
  100,
];

function calculateWidths(imgWidth) {
  const widths = STANDARD_SCREEN_WIDTHS.filter((width) => width < imgWidth);
  widths.push(imgWidth);
  return widths.sort((a, b) => (a > b ? -1 : 1));
}

const srcset = computed(() => {
  const widths = calculateWidths(props.width);

  const srcsetHolder = [];
  widths.forEach((width) => {
    const url = getImageKitUrl(props.src);
    const params = new URLSearchParams(url.search);
    params.set('tr', `w-${width}`);
    url.search = params.toString();
    srcsetHolder.push(`${url.toString()} ${width}w`);
  });

  return srcsetHolder.join(', ');
});

const lqipSrc = computed(() => {
  const url = getImageKitUrl(props.src);
  const params = new URLSearchParams(url.search);
  params.set('tr', 'q-10');
  url.search = params.toString();
  return url;
});
</script>

<template>
  <img
    :src="lqipSrc"
    :srcset="srcset"
    :width="width"
    :height="height"
    :loading="loading"
    :style="{ 'background-color': isTransparent ? 'transparent' : 'lightgray' }"
    alt=""
  />
</template>
