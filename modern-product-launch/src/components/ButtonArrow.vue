<script lang="ts" setup>
import ArrowRight from './icons/ArrowRight.vue'
const { isReversed = false, isPrimary = true } = defineProps<{
  isReversed?: boolean
  isPrimary?: boolean
}>()
</script>
<template>
  <button
    v-if="!isReversed"
    class="aspect-square rounded-[10px] px-[22px] py-[14px] text-link text-link-color cursor-pointer"
    :class="isPrimary ? 'bg-accent7' : 'bg-accent2'"
  >
    <div>
      <ArrowRight />
    </div>
  </button>
  <button
    v-else
    class="aspect-square rounded-[10px] px-[22px] py-[14px] text-link text-link-color cursor-pointer"
    :class="isPrimary ? 'bg-accent7' : 'bg-accent2'"
  >
    <div class="scale-x-[-1]">
      <ArrowRight />
    </div>
  </button>
</template>
