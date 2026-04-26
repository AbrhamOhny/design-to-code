<script lang="ts" setup>
import ButtonComp from '../ButtonComp.vue'
import { ref, inject, type Component, type Ref } from 'vue'
const viewMode = inject<Ref<string>>('viewMode', ref('desktop'))
interface _steps {
  title: string
  description: string
}
const steps: _steps[] = [
  {
    title: 'Get Started',
    description: "With our intuitive setup, you're up and running in minutes.",
  },
  {
    title: 'Customize and Configure',
    description: 'Adapt Area to your specific requirements and preferences.',
  },
  {
    title: 'Grow Your Business',
    description: 'Make informed decisions to exceed your goals.',
  },
]
</script>
<template>
  <div id="guide" class="flex flex-col gap-20 pt-20 border-t border-accent5/20">
    <div
      class="flex justify-between"
      :class="viewMode !== 'mobile' ? 'flex-row items-center' : 'flex-col gap-5 items-start'"
    >
      <h1 class="text-heading1">Map Your Success</h1>
      <ButtonComp>Discover More</ButtonComp>
    </div>
    <div class="flex flex-row overflow-auto gap-5 md:gap-15 lg:gap-20">
      <div
        class="flex flex-col min-w-1/2 md:min-w-0 pb-5 gap-15"
        v-for="(steps, index) in steps"
        :key="index"
      >
        <span class="text-heading1-paragraph">{{ String(index + 1).padStart(2, '0') }}</span>
        <div class="flex flex-col gap-5">
          <span class="text-heading4">{{ steps.title }}</span>
          <p class="text-paragraph">{{ steps.description }}</p>
        </div>
      </div>
    </div>
    <div
      class="w-full h-fit rounded-4xl mt-5 mb-10 aspect-[4/3] md:aspect-square lg:aspect-[60/31] overflow-clip"
    >
      <img class="w-full h-full object-cover" src="/images/Hero2-1.png" />
    </div>
  </div>
</template>
