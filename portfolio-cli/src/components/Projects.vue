<template>
  <div class="row d-flex text-center justify-content-center">
    <p
      v-for="project in projects"
      :key="project.name"
      class="btn btn-sm text-light"
      v-text="project.name"
      type="button"
      @click="this.$router.push(`project/${project.name}`)"
    ></p>
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
