<template>
  <div class="container text-white mt-5 pt-5">
    <div class="row border d-flex justify-content-between">
      <button class="btn btn-sm col-1 text-muted active" @click="$router.push('/')">
        &#8592;
      </button>
      <div class="dropdown-center col-2">
        <button
          class="btn btn-sm text-muted active dropdown-toggle"
          type="buttn"
          data-bs-toggle="dropdown"
        >
          MORE
        </button>
        <ul class="dropdown-menu bg-dark text-center">
          <li>
            <a :href="ProjectCodeLink" class="dropdown-item text-white" target="_blank">
              Code Repository
            </a>
          </li>
          <li v-if="ProjectHasLiveTest">
            <a
              :href="ProjectTestLink"
              class="dropdown-item text-white"
              type="button"
              target="_blank"
              >Test Live</a
            >
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import Project from '../api/Projects';

export default {
  name: 'Project-V',
  data() {
    return {
      project: [],
      ProjectHasLiveTest: false,
      ProjectCodeLink: '',
      ProjectTestLink: '',
    };
  },
  async mounted() {
    this.project = await Project.GetProjectByName(this.$route.params.project);

    this.ProjectTestLink = this.project[0].test_link;
    if (this.ProjectTestLink) {
      this.ProjectHasLiveTest = true;
    }

    this.ProjectCodeLink = this.project[0].code_link;
  },
};
</script>

<style scoped>
.dropdown-menu > li > :hover {
  background-color: rgb(20, 20, 20);
  background-image: none;
}
</style>
