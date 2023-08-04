<script setup>
import { buildTagUrl } from '@/assets/utility';
import projects from '@/assets/constants/projects';
import TopWave from '@/components/wave-svgs/TopWave.vue';
import BottomWave from '@/components/wave-svgs/BottomWave.vue';
import ProjectCard from '@/components/ProjectCard.vue';
import StatCard from '@/components/StatCard.vue';
import tech from '@/assets/constants/tech';
import { useDark } from '@vueuse/core';
import ExperienceCards from '@/components/ExperienceCards.vue';

const isDark = useDark();
</script>
<template>
  <main>
    <section class="mb-16 pt-8 md:px-3 md:pt-20">
      <div
        class="container mx-auto flex max-w-4xl flex-col items-center justify-center gap-4 md:flex-row-reverse md:gap-2"
      >
        <img
          class="mx-auto max-w-[180px] self-center rounded-full border border-slate-700"
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
            <h4 class="mb-3 text-base font-bold">About</h4>
            <p class="mb-3">
              I'm an enthusiastic software engineer with a deep passion for Computer
              Science. My journey into this field started in 2020, but it wasn't until
              November 2021 that I could actively pursue it due to conflicting priorities.
              Once I began, I quickly fell in love with various Computer Science concepts.
              I focused on mastering C++ through online tutorials and built projects like
              the
              <a href="#" class="font-semibold hover:opacity-50 dark:text-white">
                Snake Game,
              </a>
              a
              <a href="#" class="font-semibold hover:opacity-50 dark:text-white">
                Pokemon Clone,
              </a>
              and a
              <a href="#" class="font-semibold hover:opacity-50 dark:text-white">
                POS System
              </a>
              using libraries like ncurses, RayLib, and mongocxx.
            </p>
            <p class="mb-3">
              Later, I enrolled in college and have been excelling, maintaining an
              impressive 3.9 GPA while pursuing Computer Science. My goal is to apply to
              UCI in the fall of 2023, a significant achievement as I'd be the first in my
              family to attend a university.
            </p>
            <p class="mb-3">
              In 2021, while working as a supervisor at Ethika, my passion for computers
              grew, and I started demonstrating my knowledge. This led to my first
              software development job, marking a pivotal moment in my career.
            </p>
            <p>
              I'm dedicated to learning in Computer Science and maintain a relentless
              pursuit of knowledge. Alongside my passion for the field, I enjoy fishing,
              playing soccer and basketball, and spending time with my family. My ultimate
              life goal is to create something that leaves a meaningful impact, regardless
              of its scale.
            </p>
          </div>
        </div>
        <div class="mx-auto max-w-2xl px-4">
          <h4 class="mb-8 font-bold">Experience</h4>
          <ExperienceCards />
        </div>
      </div>
    </section>
    <section class="relative mb-16 pt-6">
      <div class="mx-auto mt-8 max-w-4xl">
        <h4 class="mb-6 text-center text-lg font-semibold">Technologies</h4>
        <div class="mb-14 flex flex-wrap justify-center gap-3">
          <div v-for="tag in tech" :key="tag.text">
            <a
              :href="tag.url"
              target="_blank"
              class="inline-block transition-all hover:opacity-80"
            >
              <img
                :src="
                  buildTagUrl({
                    text: tag.text,
                    backgroundColor: isDark ? '333' : 'cbd5e1',
                    style: 'for-the-badge',
                    logo: tag.logo,
                  })
                "
                alt=""
              />
            </a>
          </div>
        </div>
        <div class="px-3">
          <StatCard perspective />
        </div>
      </div>
    </section>
  </main>
</template>
