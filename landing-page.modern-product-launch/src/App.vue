<script setup lang="ts">
import NavBar from './components/ui/NavBar.vue'
import Contents from './components/ui/UIContents.vue'
import { provide, ref, onMounted } from 'vue'
const viewMode = ref<string>('desktop')
function onResize() {
  const screenWidth = window.innerWidth
  if (screenWidth < 800) {
    viewMode.value = 'mobile'
  } else if (screenWidth > 800 && screenWidth < 1280) {
    viewMode.value = 'tablet'
  } else {
    viewMode.value = 'desktop'
  }
}

onMounted(() => {
  onResize()
  window.addEventListener('resize', onResize)
})

provide('viewMode', viewMode)
</script>

<template>
  <main>
    <NavBar />
    <Contents />
  </main>
</template>
