<template>
  <!-- TODO: nav -->
  <section class="mt-5">
    <Header />
  </section>
  <section>
    <Tech />
  </section>
  <section>
    <Backend />
  </section>
  <section class="mb-5">
    <About />
  </section>
  <section>
    <Footer />
  </section>
</template>

<script>
import Header from './Header.vue';
import Tech from '../tech/Tech.vue';
import Backend from '../projects/Backend.vue';
import About from '../projects/Web.vue';
import Footer from './Footer.vue';

export default {
  name: 'Home-V',
  components: {
    Header,
    Tech,
    Backend,
    About,
    Footer,
  },
};
</script>

<style>
/* @media (min-width: 990px) {
  .container {
    max-width: 720px;
  }
} */
</style>
