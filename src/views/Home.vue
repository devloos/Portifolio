<script setup>
import { buildTagUrl } from '@/assets/utility';
import projects from '@/assets/constants/projects';
import TopWave from '@/components/wave-svgs/TopWave.vue';
import BottomWave from '@/components/wave-svgs/BottomWave.vue';
import ProjectCard from '@/components/ProjectCard.vue';
import StatCard from '@/components/StatCard.vue';
import tech from '@/assets/constants/tech';
import { useDark } from '@vueuse/core';
import ExperienceCard from '@/components/ExperienceCard.vue';

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
    <section class="mt-16">
      <div class="container relative flex max-w-7xl flex-col lg:flex-row">
        <div class="self-start px-4 lg:sticky lg:top-[78px]">
          <div class="mb-10">
            <h1 class="mb-2 text-3xl font-bold">Carlos Aguilera</h1>
            <p class="font-light text-coal-400 dark:text-slate-400">
              Junior Web Developer at Ethika Inc.
            </p>
          </div>
          <div class="mb-10 leading-relaxed">
            <h4 class="mb-3 font-bold">About</h4>
            <p class="mb-3">
              Back in 2012, I decided to try my hand at creating custom Tumblr themes and
              tumbled head first into the rabbit hole of coding and web development.
              Fast-forward to today, and I’ve had the privilege of building software for
              an
              <a href="#" class="font-semibold hover:opacity-50 dark:text-slate-400">
                advertising agency,
              </a>
              a start-up, a student-led design studio, and a huge corporation.
            </p>
            <p class="mb-3">
              My main focus these days is building products and leading projects for our
              clients at
              <a href="#" class="font-semibold hover:opacity-50 dark:text-slate-400">
                Upstatement.
              </a>
              In my free time I've also released an online video course that covers
              everything you need to know to build a web app with the
              <a href="#" class="font-semibold hover:opacity-50 dark:text-slate-400">
                Spotify API.
              </a>
            </p>
            <p>
              When I’m not at the computer, I’m usually rock climbing, hanging out with my
              wife and two cats, or running around Hyrule searching for Korok seeds.
            </p>
          </div>
        </div>
        <div class="px-4">
          <h4 class="mb-8 font-bold">Experience</h4>
          <div class="group">
            <ExperienceCard v-for="i in 4" :key="i" />
          </div>
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
                    backgroundColor: isDark ? '333' : 'b4cdea',
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
