<script setup>
import { buildTagUrl } from '@/assets/utility';
import projects from '@/assets/constants/projects';
import TopWave from '@/components/wave-svgs/TopWave.vue';
import BottomWave from '@/components/wave-svgs/BottomWave.vue';
import ProjectCard from '@/components/ProjectCard.vue';
import StatCard from '@/components/StatCard.vue';
import tech from '@/assets/constants/tech';
</script>
<template>
  <main>
    <section class="mb-16 pt-8 md:px-3 md:pt-20">
      <div
        class="container mx-auto flex max-w-4xl flex-col items-center justify-center gap-4 md:flex-row-reverse md:gap-2"
      >
        <img
          class="mx-auto max-w-[150px] self-center rounded-full border border-slate-700"
          src="stud.jpg"
          alt="stud"
        />
        <div class="grow px-2 text-center md:text-start">
          <p class="mb-7 max-w-xl px-1 text-2xl font-semibold md:text-3xl">
            Hey! My name is Carlos. I work as a Web Developer at Ethika Inc.
          </p>
          <div class="px-2">
            <a
              class="mr-6 inline-block rounded bg-alternate-400 px-5 py-2 ring-2 ring-gray-500 transition-all hover:bg-alternate dark:bg-alternate-600 dark:ring-slate-600 hover:dark:bg-alternate"
              href="/resume.pdf"
              download
            >
              <div class="flex items-center justify-center gap-3">
                <p>Resume</p>
                <i class="fa-solid fa-download"></i>
              </div>
            </a>
            <RouterLink
              to="/projects"
              class="inline-block rounded bg-slate-300 px-5 py-2 ring-2 ring-slate-500 transition-all hover:bg-slate-400 dark:bg-slate-700 dark:ring-slate-500 hover:dark:bg-slate-600"
            >
              <div class="flex items-center justify-center gap-3">
                <p>Projects</p>
                <i class="fa-solid fa-arrow-right"></i>
              </div>
            </RouterLink>
          </div>
        </div>
      </div>
    </section>
    <section class="relative py-12">
      <TopWave class="fill-alternate-100 dark:fill-slate-700" />
      <div class="bg-alternate-100 dark:bg-slate-700">
        <h4 class="mb-6 text-center text-lg font-semibold">Featured Projects</h4>
        <div
          class="container grid max-w-6xl grid-cols-1 place-items-center gap-6 px-3 lg:grid-cols-2"
        >
          <ProjectCard
            v-for="project in projects"
            :key="project.title"
            :project="project"
          />
        </div>
      </div>
      <BottomWave class="fill-alternate-100 dark:fill-slate-700" />
    </section>
    <section class="relative mb-16 pt-14">
      <div class="mx-auto mt-8 max-w-4xl">
        <h4 class="mb-6 text-center text-lg font-semibold">Technologies</h4>
        <div class="mb-14 flex flex-wrap justify-center gap-3">
          <img
            v-for="tag in tech"
            :key="tag.text"
            :src="
              buildTagUrl({
                text: tag.text,
                backgroundColor: '333',
                style: 'for-the-badge',
                logo: tag.logo,
              })
            "
            alt=""
          />
        </div>
        <div class="px-3">
          <StatCard perspective />
        </div>
      </div>
    </section>
  </main>
</template>
