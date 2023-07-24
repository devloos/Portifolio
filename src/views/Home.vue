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
              I am an enthusiastic software engineer with a passion for Computer Science.
              My journey into this field started in 2020 when I first became interested in
              it through a counselor. However, due to conflicting priorities, I was not
              able to pursue it actively until November 2021. Once I started, I quickly
              became enamored with numerous concepts in Computer Science. To kickstart my
              learning, I took online tutorials and focused primarily on mastering C++
              since it was the language used in my local community college. Through these
              resources, I successfully built projects such as the
              <a href="#" class="font-semibold hover:opacity-50 dark:text-white">
                Snake Game,
              </a>
              a
              <a href="#" class="font-semibold hover:opacity-50 dark:text-white">
                Pokemon Clone,
              </a>
              and a
              <a href="#" class="font-semibold hover:opacity-50 dark:text-white">
                POS System.
              </a>
              I utilized libraries like ncurses, RayLib, and mongocxx to bring these
              projects to life.
            </p>
            <p class="mb-3">
              A few months later, I enrolled in college and have been excelling,
              maintaining an impressive 3.9 GPA while pursuing Computer Science. My goal
              is to apply to UCI in the fall of 2023, which would be a significant
              achievement for me since I would be the first in my family to attend a
              university.
            </p>
            <p class="mb-3">
              Back in 2020, I started working at a clothing company called Ethika, where I
              held a supervisor position in the warehouse. However, it was around 2021
              when my passion for computers took flight, and I began demonstrating my
              knowledge and skills in the field to the company. As a result, I was offered
              my first software development job, marking a pivotal moment in my career.
            </p>
            <p class="mb-3">
              I am relentless in my pursuit of Computer Science, and every day, I am
              excited to learn something new. The spark of curiosity that ignited me at
              the beginning of this journey has only grown stronger, and I believe it will
              continue to thrive indefinitely, given the trajectory I am on.
            </p>
            <p>
              While I am deeply passionate about Computer Science, I also find joy in
              various other activities, such as fishing, playing soccer and basketball,
              and spending quality time with my family. Despite my dedication to the
              field, my ultimate life goal is to create something that leaves a meaningful
              impact, regardless of its scale.
            </p>
          </div>
        </div>
        <div class="mx-auto max-w-2xl px-4">
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
