<template>
  <div class="container-fluid mt-5 pt-5 mb-3 pb-5 text-white">
    <div class="row text-center mt-5 mb-4">
      <a href="#" class="link-light mb-3">los@caguilera.dev</a>
      <div>
        <a
          v-for="social in socials"
          :key="social.name"
          :href="social.url"
          target="_blank"
          class="m-2"
        >
          <img :src="social.image_path" :alt="social.name" width="30" height="30" />
        </a>
      </div>
    </div>
    <p class="fs-6 text-muted text-center">
      <small> © 2022 Carlos Aguilera </small>
    </p>
  </div>
</template>

<script>
export default {
  name: 'Footer-V',
  data() {
    return {
      socials: [
        {
          name: 'Linkedin',
          url: 'https://www.linkedin.com/in/aguilerac/',
          image_path: './Linkedin.svg',
        },
        {
          name: 'Github',
          url: 'https://github.com/Puwya',
          image_path: './Github.svg',
        },
        {
          name: 'MonkeyType',
          url: 'https://monkeytype.com/profile/m79cIZ2I3ATVjygkeIK8kbVFByI2',
          image_path: './Github.svg',
        },
      ],
    };
  },
};
</script>
