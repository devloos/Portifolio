<template>
  <div class="container text-white">
    <div class="row text-center">
      <h4 class="fst-italic mb-3">Technologies</h4>
      <hr class="border border-1" />
    </div>
    <div class="row ps-lg-4 pe-lg-4">
      <div v-for="Tech in Techs" class="col-1 m-2 m-lg-0 mb-lg-2" :key="Tech.name">
        <img :src="Tech.image_path" :alt="Tech.name" width="30" height="30" />
      </div>
    </div>
  </div>
</template>

<script>
import GetTechnologies from '../api/Tech';

export default {
  name: 'Tech-V',
  data() {
    return {
      Techs: [],
    };
  },
  async mounted() {
    this.Techs = await GetTechnologies();
  },
};
</script>

<style scoped>
.img-thumbnail {
  background-color: transparent;
}
</style>
