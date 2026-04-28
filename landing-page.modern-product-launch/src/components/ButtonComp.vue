<script lang="ts" setup>
import LinkArrow from './icons/LinkArrow.vue'
const {
  link,
  centerText,
  isPrimary = true,
} = defineProps<{
  link?: string
  centerText?: boolean
  isPrimary?: boolean
}>()
</script>
<template>
  <button
    v-if="!link"
    class="rounded-full text-center px-[22px] py-[14px] text-link cursor-pointer"
    :class="
      isPrimary
        ? 'text-link-color bg-accent2 hover:text-on-accent1 hover:bg-accent3'
        : 'text-on-accent1 bg-accent3 hover:text-link-color hover:bg-accent2'
    "
  >
    <slot />
  </button>
  <a
    v-else
    :href="link"
    class="inline-flex rounded-full px-[22px] py-[14px] text-link group"
    :class="
      isPrimary
        ? 'text-on-accent1 bg-accent1 hover:text-on-accent1 hover:bg-accent3'
        : 'text-on-accent1 bg-accent3 hover:text-on-accent1 hover:bg-accent1'
    "
  >
    <div
      class="flex flex-row items-center gap-1 group"
      :class="centerText ? 'justify-center text-center w-full' : ''"
    >
      <span><slot /></span>
      <span class="group-hover:-translate-y-2">
        <LinkArrow />
      </span>
    </div>
  </a>
</template>
