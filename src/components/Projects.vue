<template>
  <div class="row d-flex text-center justify-content-center">
    <button
      v-for="project in projects"
      :key="project.name"
      class="btn btn-sm text-light mb-2"
      v-text="project.name"
      type="button"
      @click="this.$router.push(`project/${project.name}`)"
    ></button>
  </div>
</template>

<script>
export default {
  name: 'Projects-C',
  props: {
    projects: {
      type: Array,
      required: true,
    },
  },
};
</script>

<style scoped>
.btn {
  --bs-btn-bg: #1f1f1f;
  --bs-btn-hover-bg: #313131;
}
</style>
