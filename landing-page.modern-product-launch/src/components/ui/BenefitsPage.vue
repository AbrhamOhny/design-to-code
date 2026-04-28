<script lang="ts" setup>
import CableIcon from '../icons/CableIcon.vue'
import EarthIcon from '../icons/EarthIcon.vue'
import AccountIcon from '../icons/AccountIcon.vue'
import ChartIcon from '../icons/ChartIcon.vue'
import Button from '../ButtonComp.vue'
import { ref, inject, type Component, type Ref } from 'vue'
interface _section {
  icon: Component
  title: string
  paragraph: string
}
const viewMode = inject<Ref<string>>('viewMode', ref('desktop'))
const sections: _section[] = [
  {
    icon: CableIcon,
    title: 'Amplify Insights',
    paragraph:
      'Unlock data-driven decisions with comprehensive analytics, revealing key opportunities for strategic regional growth.',
  },
  {
    icon: EarthIcon,
    title: 'Control Your Global Presence',
    paragraph:
      'Manage and trac satelite offices, ensuring consistent performance and streamlined operations everywhere',
  },
  {
    icon: AccountIcon,
    title: 'Remove Language Barriers',
    paragraph:
      'Adapt to diverse markets with built-in localization for clear communication and enhanced user experience',
  },
  {
    icon: ChartIcon,
    title: 'Visualize Growth',
    paragraph:
      'Generate precise, visually compelling reports that illustrate your growth trajectories across all regions',
  },
]
const highlights = [
  'Spot Trends in Seconds: No more diggin through numbers',
  'Get Everyone on the Same Page: Share easy-to-understand reports with your team.',
  'Make Presentations Pop: Interactive maps and dashboards keep your audiance engaged.',
  'Your Global Snapshots: Get a quick, clear overview of your entire operation.',
]
</script>
<template>
  <div id="benefits" class="flex flex-col gap-5">
    <div class="flex flex-col gap-12 my-15">
      <span class="text-captions">Benefits</span>
      <h2 class="text-heading1">We've cracked the code.</h2>
      <p class="text-paragraph">Area provides real insights, without the data overload.</p>
    </div>
    <div class="relative flex flex-wrap items-start gap-[20px]">
      <div
        class="relative flex flex-1 flex-col border-accent5/20 py-10 gap-5 border-t min-w-[265px] py-[40px] pr-[20px]"
        v-for="section in sections"
        :key="section.title"
      >
        <div class="w-[24px] h-[24px]">
          <component class="w-full h-full" :is="section.icon" />
        </div>
        <h3 class="text-heading3">{{ section.title }}</h3>
        <p class="text-paragraph">
          {{ section.paragraph }}
        </p>
      </div>
    </div>
    <div
      class="w-full h-fit mt-10 mb-25 aspect-[9/16] md:aspect-square lg:aspect-[60/31] rounded-4xl overflow-clip"
    >
      <img class="w-full h-full object-cover" src="/images/Hero Image-1.png" />
    </div>
    <div class="flex gap-10" :class="viewMode === 'desktop' ? 'flex-wrap' : 'flex-col'">
      <div class="flex flex-col flex-2 gap-10 border-t border-accent5/20 py-15">
        <h2 class="text-heading1">See the Big Picture</h2>
        <p class="text-paragraph">
          Area turns your data into clear, vibrant visuals that show you exactly what's happening in
          each region.
        </p>
        <div class="flex flex-col">
          <div
            class="grid grid-cols-[auto_1fr] gap-8 py-5 text-paragraph text-accent4! border-t border-accent5/20"
            v-for="(value, index) in highlights"
            :key="index"
          >
            <span class="font-semibold text-accent5!">{{
              String(index + 1).padStart(2, '0')
            }}</span>
            <p>{{ value }}</p>
          </div>
        </div>
        <div>
          <Button>Discover More</Button>
        </div>
      </div>
      <img class="flex flex-1 object-cover" src="/images/Features carousel v1.png" />
    </div>
  </div>
</template>
