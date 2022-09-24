<template>
  <div class="container text-white mt-5 pt-5">
    <div class="row d-flex justify-content-between p-0">
      <button
        class="btn btn-sm ms-1 p-0 col-2 col-lg-1 text-muted active"
        @click="$router.push('/')"
      >
        &#8592;
      </button>
      <div class="d-flex justify-content-end dropdown-center col-3 col-lg-2 me-1 pe-0">
        <button
          class="btn btn-sm text-muted active dropdown-toggle me-0"
          type="button"
          data-bs-toggle="dropdown"
        >
          MORE
        </button>
        <ul class="dropdown-menu bg-dark text-center">
          <li>
            <a :href="project.code_link" class="dropdown-item text-white" target="_blank">
              Code Repository
            </a>
          </li>
          <li v-if="projectHasLiveTest">
            <a
              :href="project.test_link"
              class="dropdown-item text-white"
              type="button"
              target="_blank"
              >Test Live</a
            >
          </li>
        </ul>
      </div>
    </div>
    <div class="row mt-4 pb-5">
      <h2 class="text-center col-12" v-text="project.name"></h2>
      <video :src="project.video_path" class="mt-4" autoplay muted loop></video>
    </div>
    <div class="row mt-5">
      <h5 class="text-center text-muted">About The Project</h5>
      <p class="text-center" v-text="project.description"></p>
    </div>
    <div class="row mt-5">
      <h5 class="text-center text-muted">Creation</h5>
      <p class="text-center" v-text="project.creation"></p>
    </div>
    <p v-if="project.name === 'Pokemon-Clone'" class="text-center">
      <small class="text-muted"
        >With
        <a
          href="https://github.com/connor-darling"
          class="btn btn-sm text-muted p-0"
          target="_blank"
        >
          Connor Darling
        </a>
      </small>
    </p>
    <div class="row mt-5 mb-5">
      <p class="text-center" v-text="project.date"></p>
    </div>
  </div>
</template>

<script>
import Project from '@/api/portfolio/Projects';

export default {
  name: 'Project-V',
  data() {
    return {
      project: {},
      projectHasLiveTest: false,
    };
  },
  async mounted() {
    const res = await Project.GetByName(this.$route.params.project);
    this.project = res[0];
    this.projectHasLiveTest = this.project?.test_link ? true : false;
  },
};
</script>

<style scoped>
.dropdown-menu > li > :hover {
  background-color: rgb(20, 20, 20);
  background-image: none;
}
</style>
