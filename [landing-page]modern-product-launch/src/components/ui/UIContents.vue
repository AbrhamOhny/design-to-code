<script lang="ts" setup>
import { inject, ref, type Ref } from 'vue'
import LandingPage from './LandingPage.vue'
import BenefitsPage from './BenefitsPage.vue'
import SpecificationPage from './SpecificationPage.vue'
import GuidePage from './GuidePage.vue'
import ContactPage from './ContactPage.vue'
import UIFooter from './UIFooter.vue'
const viewMode = inject<Ref<string>>('viewMode', ref('desktop'))
</script>
<template>
  <article :class="viewMode !== 'mobile' ? 'px-[40px]' : 'px-[16px] mt-[120px]'">
    <LandingPage />
    <BenefitsPage />
    <SpecificationPage />
    <GuidePage />
    <ContactPage />
    <UIFooter />
  </article>
</template>
