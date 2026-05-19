<script lang="ts" setup>
import { onMounted, inject, ref, type Ref } from "vue";
const viewMode = inject<Ref<string | undefined>>("viewMode", ref(undefined));
const emit = defineEmits(["toggleNav"]);
onMounted(() => {
    const header: HTMLElement | null = document.querySelector("header");
    document.documentElement.style.setProperty("--header-height", `${header?.offsetHeight}px`);
});
</script>
<template>
    <header
        class="fixed z-30 top-0 px-5 gap-5 py-3 flex flex-row items-center justify-between bg-background-lighter"
    >
        <button
            id="nav-toggle"
            @click="emit('toggleNav')"
            class="no-decoration aspect-square p-2 z-50 rounded-full hover:bg-background-darker"
            v-if="viewMode === 'mobile'"
        >
            <Icon icon="ic:round-menu" width="24" height="24" />
        </button>
        <div class="text-xl font-semibold"><slot /></div>
        <div
            class="flex flex-row items-center gap-5 justify-end"
            :class="{ 'flex-1 min-w-0': viewMode === 'desktop' }"
        >
            <div
                class="min-w-0 flex flex-row rounded-full py-2 px-4 items-center gap-3 bg-background-darker"
                v-if="viewMode === 'desktop'"
            >
                <Icon icon="ic:outline-search" width="18" height="18" class="shrink-0" />
                <input
                    type="text"
                    class="border-0 outline-0 no-decoration"
                    placeholder="Search for something"
                />
            </div>

            <div class="flex flex-row items-center gap-5 shrink-0">
                <div
                    class="aspect-square p-2 rounded-full bg-background-darker"
                    v-if="viewMode === 'desktop'"
                >
                    <Icon icon="ic:round-settings" width="18" height="18" />
                </div>
                <div
                    class="aspect-square p-2 rounded-full bg-background-darker"
                    v-if="viewMode === 'desktop'"
                >
                    <Icon icon="ic:baseline-notifications-none" width="18" height="18" />
                </div>
                <div class="aspect-square overflow-clip rounded-full bg-background-darker">
                    <img width="32" height="32" src="/public/m7th-1-1.png" />
                </div>
                <!-- No profile picture default
                <div class="aspect-square p-2 rounded-full bg-background-darker">
                    <Icon icon="ic:baseline-person" width="24" height="24" />
                </div>
                -->
            </div>
        </div>
    </header>
</template>
