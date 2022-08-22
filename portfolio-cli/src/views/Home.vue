<template>
  <div class="container">
    <section>
      <Header />
    </section>
    <section>
      <Tech />
    </section>
    <section>
      <Backend />
    </section>
    <section>
      <About />
    </section>
    <section>
      <Footer />
    </section>
  </div>
</template>

<script>
import Header from './Header.vue';
import Tech from './Tech.vue';
import Backend from './Backend.vue';
import About from './About.vue';
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
