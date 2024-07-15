<script setup>
import { buildTagUrl } from '@/assets/utility';
import TopWave from '@/components/wave-svgs/TopWave.vue';
import BottomWave from '@/components/wave-svgs/BottomWave.vue';
import ProjectCard from '@/components/cards/ProjectCard.vue';
import StatCard from '@/components/cards/StatCard.vue';
import { useDark } from '@vueuse/core';
import ExperienceCard from '@/components/cards/ExperienceCard.vue';
import { useHead } from '@unhead/vue';
import StyledButton from '@/components/styled/StyledButton.vue';
import SmartImg from '@/components/smart/SmartImg.vue';
import { onMounted, ref } from 'vue';
import { joinQueryParams } from '@/assets/utility/url';
import { smartFetch } from '@/assets/utility/api';
import SmartTransition from '@/components/smart/SmartTransition.vue';

useHead({
  title: 'Devlos',
  meta: [
    {
      name: 'description',
      content: '[object, object]',
    },
  ],
});

const isDark = useDark();
const featuredProjects = ref([]);

async function fetchFeaturedProjects() {
  const params = ['featured=1', 'include[tags]=1'];
  const url = joinQueryParams('/api/project/list', params);

  const { data, failed } = await smartFetch(url, { method: 'GET' });

  if (failed) {
    return;
  }

  featuredProjects.value = data.projects;
}

const featuredTags = ref([]);

async function fetchFeaturedTags() {
  const params = ['featured=1'];
  const url = joinQueryParams('/api/tag/list', params);

  const { data, failed } = await smartFetch(url, { method: 'GET' });

  if (failed) {
    return;
  }

  featuredTags.value = data.tags;
}

const experiences = ref([]);

async function fetchExperiences() {
  const params = ['include[tags]=1'];
  const url = joinQueryParams('/api/experience/list', params);

  const { data, failed } = await smartFetch(url, { method: 'GET' });

  if (failed) {
    return;
  }

  experiences.value = data.experiences;
}

onMounted(() => {
  fetchFeaturedProjects();
  fetchFeaturedTags();
  fetchExperiences();
});

const hoveredIndex = ref(null);

function isHoveredIndex(i) {
  return i === hoveredIndex.value;
}
</script>
<template>
  <main>
    <section class="mb-16 pt-4 md:px-3 md:pt-20">
      <div
        class="container mx-auto flex flex-col items-center justify-center gap-4 md:max-w-[44rem] md:flex-row-reverse lg:max-w-4xl xl:max-w-[60rem]"
      >
        <div class="relative mb-14">
          <SmartImg
            class="animate-vertical max-w-48 md:max-w-44"
            src="/tplos/portfolio/avatar.png"
            width="450"
            height="450"
            alt="avatar"
            is-transparent
          />
          <SmartImg
            class="animate-vertical absolute -bottom-16 -right-10 min-w-56 md:-bottom-14 md:-right-8 md:min-w-48 lg:-bottom-16 lg:-right-10 lg:min-w-52"
            src="/tplos/portfolio/nimbus.png"
            width="683"
            height="365"
            alt="nimbus"
            is-transparent
          />
        </div>
        <div class="grow px-2 text-center md:text-start">
          <p class="mb-7 max-w-xl px-1 text-2xl font-semibold lg:text-3xl">
            <span>Hey! My name is&nbsp;</span>
            <span
              class="inline-block bg-gradient-to-r from-[#38AECC] to-[#022F40] bg-clip-text font-extrabold text-transparent dark:from-[#0846DA] dark:to-[#25F9F5]"
            >
              Carlos
            </span>
            <span>. I work as a Web Developer at Ethika Inc.</span>
          </p>
          <div class="px-2">
            <a class="mr-6 inline-block" href="/resume.pdf" download>
              <StyledButton
                class="bg-alternate-200 ring-1 ring-primary-400 dark:bg-primary-600 dark:ring-slate-400"
              >
                <div class="flex items-center justify-center gap-3">
                  <p>Resume</p>
                  <i class="fa-solid fa-download"></i>
                </div>
              </StyledButton>
            </a>
            <RouterLink to="/projects" class="group inline-block">
              <StyledButton
                class="bg-primary-100 ring-1 ring-primary-400 dark:bg-alternate-700 dark:ring-slate-400"
              >
                <div class="flex items-center justify-center gap-3">
                  <p>Projects</p>
                  <i
                    class="fa-solid fa-arrow-right transition-transform group-hover:translate-x-[2px]"
                  ></i>
                </div>
              </StyledButton>
            </RouterLink>
          </div>
        </div>
      </div>
    </section>
    <section class="relative py-12">
      <TopWave class="fill-alternate-100 dark:fill-primary-700" />
      <div class="min-h-36 bg-alternate-100 dark:bg-primary-700">
        <SmartTransition name="fade" mode="out-in">
          <div v-if="featuredProjects.length > 0">
            <h4 class="mb-6 text-center text-lg font-semibold">Featured Projects</h4>
            <div
              class="container grid max-w-6xl grid-cols-1 place-items-center gap-6 px-3 lg:grid-cols-2"
            >
              <ProjectCard
                v-for="project in featuredProjects"
                :key="project.id"
                :project="project"
              />
            </div>
          </div>
        </SmartTransition>
      </div>
      <BottomWave class="fill-alternate-100 dark:fill-primary-700" />
    </section>
    <section id="about" class="mt-16">
      <div class="container relative flex max-w-7xl flex-col lg:flex-row">
        <div class="mx-auto max-w-2xl self-start px-4 lg:sticky lg:top-[78px]">
          <div class="mb-10">
            <h1 class="mb-2 text-3xl font-bold">Carlos Aguilera</h1>
            <p class="font-light text-coal-400 dark:text-slate-400">
              Junior Web Developer at Ethika Inc.
            </p>
          </div>
          <div class="mb-10 text-sm leading-relaxed">
            <p class="mb-3 text-base font-bold">About</p>
            <p class="mb-3">
              I'm an enthusiastic software engineer with a deep passion for Computer
              Science. My journey into this field started in 2020, but it wasn't until
              November 2021 that I could actively pursue it due to conflicting priorities.
              Once I began, I quickly fell in love with various Computer Science concepts.
              I focused on understanding C++ through online tutorials and built projects
              like the
              <a
                href="https://github.com/devloos/Snake-Game"
                class="font-semibold hover:opacity-50 dark:text-white"
                target="_blank"
              >
                <span class="underline underline-offset-2">Snake Game</span>
                <span>,</span>
              </a>
              a
              <a
                href="https://github.com/devloos/Pokemon-Clone"
                class="font-semibold hover:opacity-50 dark:text-white"
                target="_blank"
              >
                <span class="underline underline-offset-2">Pokemon Clone</span>
                <span>,</span>
              </a>
              and a
              <a
                href="https://github.com/devloos/Sales-System"
                class="font-semibold hover:opacity-50 dark:text-white"
                target="_blank"
              >
                <span class="underline underline-offset-2">Sales System</span>
              </a>
              using libraries like ncurses, RayLib, and mongocxx.
            </p>
            <p class="mb-3">
              Later, I enrolled in college and have been excelling, maintaining an
              impressive 3.85 GPA while pursuing Computer Science. My goal is to get
              accepted into the University of California for fall semester of 2024, a
              significant achievement as I'd be the first in my family to attend a
              university.
            </p>
            <p class="mb-3">
              In 2021, while working as a supervisor at Ethika, my passion for computers
              grew, and I started demonstrating my knowledge. This led to my first
              software development job, marking a pivotal moment in my career.
            </p>
            <p>
              I'm dedicated to continuous learning and adoption of many new tools.
              Alongside my passion for the field, I enjoy fishing, playing soccer, and
              spending time with my family. A life goal of mine is to create something
              that leaves a meaningful impact, regardless of its scale.
            </p>
          </div>
        </div>

        <div class="mx-auto max-w-2xl px-4">
          <SmartTransition name="slide-from-right" mode="out-in">
            <div v-if="experiences.length > 0">
              <p class="mb-8 font-bold">Experience</p>
              <div>
                <ExperienceCard
                  v-for="(ex, i) in experiences"
                  :key="ex.id"
                  :class="{
                    'lg:bg-alternate-100 lg:opacity-100 lg:drop-shadow-lg lg:dark:bg-slate-700':
                      isHoveredIndex(i),
                    'lg:opacity-50': !isHoveredIndex(i) && hoveredIndex !== null,
                  }"
                  :experience="ex"
                  @mouseenter="hoveredIndex = i"
                  @mouseleave="hoveredIndex = null"
                />
              </div>
            </div>
          </SmartTransition>
        </div>
      </div>
    </section>
    <section class="relative mb-16 pt-6">
      <div class="mx-auto mt-8 max-w-4xl">
        <p class="mb-6 text-center text-lg font-semibold">Technologies</p>
        <SmartTransition name="fade" mode="out-in">
          <div
            v-if="featuredTags.length > 0"
            class="mb-14 flex flex-wrap justify-center gap-3"
          >
            <div v-for="tag in featuredTags" :key="tag.id">
              <a
                :href="tag.url"
                target="_blank"
                class="inline-block transition-all hover:opacity-80"
              >
                <img
                  :src="
                    buildTagUrl({
                      text: tag.title,
                      backgroundColor: isDark ? '333' : 'cbd5e1',
                      style: 'for-the-badge',
                      logo: tag.logoName,
                    })
                  "
                  loading="lazy"
                  :aria-label="tag.title"
                  :alt="tag.title"
                />
              </a>
            </div>
          </div>
        </SmartTransition>
        <div class="px-3">
          <StatCard perspective />
        </div>
      </div>
    </section>
  </main>
</template>

<style>
@keyframes vertical {
  from {
    transform: translateY(-0.3rem);
  }
  to {
    transform: translateY(0.7rem);
  }
}

.animate-vertical {
  animation-name: vertical;
  animation-duration: 2500ms;
  animation-direction: alternate;
  animation-timing-function: ease-in-out;
  animation-iteration-count: infinite;
}
</style>
