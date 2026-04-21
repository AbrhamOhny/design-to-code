<script lang="ts" setup>
import { inject, ref, type Ref } from 'vue'
import LandingPage from './LandingPage.vue'
const viewMode = inject<Ref<string>>('viewMode', ref('desktop'))
</script>
<template>
  <article :class="viewMode !== 'mobile' ? 'px-[40px]' : 'px-[16px] mt-[120px]'">
    <LandingPage />
  </article>
</template>
