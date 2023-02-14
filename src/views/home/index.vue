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
import Header from './header/index';
import Tech from '@/views/tech/index';
import Backend from '@/views/projects/Backend';
import About from '@/views/projects/Web';
import Footer from '@/views/footer/index';

export default {
  name: 'home-i',
  components: {
    Header,
    Tech,
    Backend,
    About,
    Footer,
  },
};
</script>
