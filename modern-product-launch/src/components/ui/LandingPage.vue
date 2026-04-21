<script lang="ts" setup>
import IpadSVG from '../images/IpadSVG.vue'
import IphoneSVG from '../images/IphoneSVG.vue'
import { inject, ref, type Ref } from 'vue'
const viewMode = inject<Ref<string>>('viewMode', ref('desktop'))
</script>
<template>
  <div class="flex flex-col gap-[60px]">
    <h1 class="text-display text-center">Browse everything</h1>
    <div class="flex items-end justify-center relative">
      <IpadSVG class="z-20" v-if="viewMode === 'tablet'" />
      <IphoneSVG class="z-20" v-if="viewMode === 'mobile'" />
      <div class="absolute mx-[16px] bg-accent3 z-10 rounded-3xl w-full h-5/6"></div>
    </div>
  </div>
</template>
