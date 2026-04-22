<script lang="ts" setup>
import UIBurger from '../icons/UIBurger.vue'
import UICross from '../icons/UICross.vue'
import ButtonComp from '../ButtonComp.vue'
import { ref, type Ref, inject } from 'vue'
const viewMode = inject<Ref<string>>('viewMode', ref('desktop'))
</script>
<template>
  <nav
    class="w-full"
    :class="
      viewMode !== 'mobile'
        ? 'px-[40px] pt-[20px] pb-[80px] relative'
        : 'px-[16px] pt-[16px] pb-[25px] top-0 fixed rounded-b-2xl bg-background drop-shadow-accent4/10 drop-shadow-md'
    "
  >
    <div class="flex flex-row items-center relative justify-between w-full">
      <span class="text-nav-header"> Area </span>
      <div
        class="fixed flex flex-row rounded-full backdrop-blur-[15px] bg-background/40 gap-[27px] z-50 inset-x-0 mx-auto w-fit text-link px-[24px] py-[20px]"
        v-if="viewMode !== 'mobile'"
      >
        <a href="#benefits">Benefits</a>
        <button>Specifications</button>
        <button>How-to</button>
        <button>Contact Us</button>
      </div>
      <ButtonComp link="#" v-if="viewMode !== 'mobile'">Learn More</ButtonComp>
      <button class="aspect-square" v-else><UIBurger /></button>
    </div>
  </nav>
</template>
