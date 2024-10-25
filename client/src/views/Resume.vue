<script setup>
import StyledButton from '@/components/styled/StyledButton.vue';
</script>

<template>
  <div>
    <h3 class="py-6 text-center font-sans text-3xl font-bold uppercase tracking-widest">
      Resume
    </h3>
    <div class="relative">
      <iframe
        src="https://docs.google.com/gview?url=https://www.caguilera.dev/resume.pdf&amp;embedded=true"
        class="peer mx-auto h-[480px] w-full py-1 md:h-svh md:w-9/12 md:rounded-xl"
        frameborder="0"
      />

      <a
        class="absolute bottom-16 left-1/2 inline-block -translate-x-1/2 transform opacity-0 transition-all hover:opacity-90 peer-hover:opacity-90 peer-focus:opacity-90"
        href="/resume.pdf"
        download
      >
        <StyledButton class="flex items-center gap-2 bg-coal text-white">
          <p>Download</p>
          <i class="fa-solid fa-download"></i>
        </StyledButton>
      </a>
    </div>
  </div>
</template>
