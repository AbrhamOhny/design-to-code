<script lang="ts" setup>
import Header from "./Header.vue";
import DashboardRoutes from "../DashboardRoutes.vue";
import { inject, computed, watch, onUnmounted, ref, type Ref } from "vue";
import { usePage } from "@inertiajs/vue3";

const viewMode = inject<Ref<string | undefined>>("viewMode", ref(undefined));
const isNavOpened = ref(false);
const page = usePage();

function toggleNav() {
    isNavOpened.value = !isNavOpened.value;
}

const navStyle = computed(() => {
    if (viewMode.value === "mobile") {
        return isNavOpened.value ? "left: 0" : "left: calc(-2/3 * 100dvw)";
    } else {
        return {};
    }
});

function handleOuterClick(e: Event) {
    const nav = document.getElementById("navbar");
    const toggle = document.getElementById("nav-toggle");

    const target = e.target as Node;

    const clickedInsideNav = nav?.contains(target) || toggle?.contains(target);

    if (isNavOpened.value && !clickedInsideNav) {
        toggleNav();
    }
}

watch(viewMode, (newVal) => {
    if (newVal == "mobile") {
        document.addEventListener("click", handleOuterClick);
    } else {
        document.removeEventListener("click", handleOuterClick);
    }
});

onUnmounted(() => {
    document.removeEventListener("click", handleOuterClick);
});
</script>
<template>
    <nav class="flex flex-row absolute w-full h-full overflow-y-auto">
        <div
            id="navbar"
            class="z-50 flex flex-col fixed overflow-clip h-dvh bg-background-lighter overflow-y-auto"
            :style="navStyle"
        >
            <div class="py-5 px-3 mb-3 w-full flex justify-center text-xl font-semibold">
                BankDash
            </div>
            <DashboardRoutes />
        </div>
        <div
            id="bg-nav"
            class="h-full w-full bg-background-lighter/20"
            :class="
                viewMode === 'mobile' && isNavOpened
                    ? 'opacity-100 backdrop-blur-sm z-40'
                    : 'backdrop-blur-none opacity-0 z-0'
            "
        ></div>
        <Header @toggleNav="toggleNav">{{ $capitalize(page.props.routeName) }}</Header>
    </nav>
</template>
