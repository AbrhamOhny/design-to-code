<script lang="ts" setup>
import CableIcon from '../icons/CableIcon.vue'
import EarthIcon from '../icons/EarthIcon.vue'
import AccountIcon from '../icons/AccountIcon.vue'
import ChartIcon from '../icons/ChartIcon.vue'
import { type Component } from 'vue'
interface _section {
  icon: Component
  title: string
  paragraph: string
}
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
  </div>
</template>
