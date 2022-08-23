<template>
  <div class="container text-white mt-5 pt-5">
    <div class="row d-flex justify-content-between">
      <button
        class="btn btn-sm col-2 ms-3 col-lg-1 text-muted active"
        @click="$router.push('/')"
      >
        &#8592;
      </button>
      <div class="dropdown-center col-3 col-lg-2">
        <button
          class="btn btn-sm text-muted active dropdown-toggle"
          type="buttn"
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
          <li v-if="ProjectHasLiveTest">
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
import Project from '../api/Projects';

export default {
  name: 'Project-V',
  data() {
    return {
      project: {},
      ProjectHasLiveTest: false,
    };
  },
  async mounted() {
    const res = await Project.GetProjectByName(this.$route.params.project);
    this.project = {
      name: res[0].name,
      video_path: res[0].video_path,
      description: res[0].description,
      creation: res[0].creation,
      code_link: res[0].code_link,
      test_link: res[0].test_link,
      date: res[0].date,
    };

    if (this.project.test_link) {
      this.ProjectHasLiveTest = true;
    }
  },
};
</script>

<style scoped>
.dropdown-menu > li > :hover {
  background-color: rgb(20, 20, 20);
  background-image: none;
}
</style>
