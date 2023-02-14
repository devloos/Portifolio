<template>
  <div class="container-fluid mt-5 pt-5 mb-3 pb-5 text-white">
    <div class="row text-center justify-content-center mt-5 mb-4">
      <button
        class="btn btn-sm col-6 col-md-4 col-lg-4 col-xl-4 p-0 text-muted mb-3"
        @click="copy"
      >
        los@caguilera.dev
      </button>
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
  name: 'footer-i',
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
          url: 'https://monkeytype.com/profile/Puwya',
          image_path: './MonkeyType.png',
        },
      ],
    };
  },
  methods: {
    copy() {
      try {
        navigator.clipboard.writeText('los@caguilera.dev');
        alert('Copied');
      } catch (err) {
        console.log(err);
      }
    },
  },
};
</script>
