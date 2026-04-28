<script lang="ts" setup>
import UIBurger from '../icons/UIBurger.vue'
import UICross from '../icons/UICross.vue'
import ButtonComp from '../ButtonComp.vue'
import { ref, type Ref, inject } from 'vue'

const isOpened = ref(false)
const viewMode = inject<Ref<string>>('viewMode', ref('desktop'))

function toggle_nav() {
  isOpened.value = !isOpened.value
}
</script>
<template>
  <nav
    class="w-full"
    :class="
      viewMode !== 'mobile'
        ? 'px-[40px] pt-[20px] pb-[80px] relative'
        : 'px-[16px] pt-[16px] pb-[25px] top-0 flex flex-col fixed rounded-b-2xl bg-background z-50 drop-shadow-accent4/10 drop-shadow-md'
    "
  >
    <div class="flex flex-row items-center relative justify-between w-full">
      <span class="text-nav-header"> Area </span>
      <div
        class="fixed flex flex-row rounded-full backdrop-blur-[15px] bg-background/40 gap-[27px] z-50 inset-x-0 mx-auto w-fit text-link px-[24px] py-[20px]"
        v-if="viewMode !== 'mobile'"
      >
        <a href="#benefits">Benefits</a>
        <a href="#spec">Specifications</a>
        <a href="#guide">How-to</a>
        <a href="#contact">Contact Us</a>
      </div>
      <ButtonComp link="#" v-if="viewMode !== 'mobile'">Learn More</ButtonComp>
      <button @click="toggle_nav()" class="aspect-square" v-else>
        <UIBurger v-if="!isOpened" />
        <UICross v-else />
      </button>
    </div>
    <div class="flex text-link flex-col overflow-clip" :class="isOpened ? 'min-h-0' : 'h-0'">
      <a class="mt-15 border-t border-accent5/20 py-7" href="#benefits">Benefits</a>
      <a class="border-t border-accent5/20 py-7" href="#spec">Specifications</a>
      <a class="border-t border-accent5/20 py-7" href="#guide">How-to</a>
      <a class="border-t border-accent5/20 py-7" href="#contact">Contact Us</a>
      <ButtonComp class="w-fit mt-7" link="#" v-if="viewMode === 'mobile'">Learn More</ButtonComp>
    </div>
  </nav>
</template>
