<script lang="ts" setup>
import ButtonComp from '../ButtonComp.vue'
</script>
<template>
  <div
    id="contact"
    class="flex flex-col pt-25 pb-20 items-center justify-center border-t border-accent5/20"
  >
    <div class="flex flex-col w-full md:w-4/7 gap-5 text-center">
      <h1 class="text-heading1 pb-5">Connect with us</h1>
      <p class="text-paragraph px-2">
        Schedule a quick call to learn how Area can turn your regional data into a powerful
        advantage
      </p>
      <ButtonComp :centerText="true" link="#contact">Learn More</ButtonComp>
    </div>
  </div>
</template>
