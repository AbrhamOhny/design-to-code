<script lang="ts" setup>
import { usePage, router } from "@inertiajs/vue3";
import { computed } from "vue";
const page = usePage();

const currentPath = computed(() => page.url);
const __routes = page.props.dashboardRoutes as Record<string, string>;
const routes: Array<Record<string, string>> = [
    {
        link: __routes.home!,
        name: "Dashboard",
        icon: "ic:baseline-home",
    },
    {
        link: __routes.transactions!,
        name: "Transactions",
        icon: "mdi:cash-sync",
    },
    {
        link: __routes.accounts!,
        name: "Accounts",
        icon: "ic:baseline-person",
    },
    {
        link: __routes.investments!,
        name: "Investments",
        icon: "mdi:chart-finance",
    },
    {
        link: __routes.cards!,
        name: "Credit Cards",
        icon: "mdi:card-bulleted",
    },
    {
        link: __routes.loans!,
        name: "Loans",
        icon: "mdi:hand-coin",
    },
    {
        link: __routes.services!,
        name: "Services",
        icon: "mdi:customer-service",
    },
    {
        link: __routes.privileges!,
        name: "My Privileges",
        icon: "mdi:checkers-outline",
    },
    {
        link: __routes.settings!,
        name: "Settings",
        icon: "mdi:gear",
    },
];
function getPath(url: string) {
    return new URL(url).pathname;
}
function handleVisit(url: string) {
    router.visit(url);
}
</script>
<template>
    <button
        class="no-decoration cursor-pointer relative pl-10 py-4 flex flex-row gap-5 items-center"
        v-for="route in routes"
        :class="
            currentPath === getPath(route.link!)
                ? 'text-primary font-semibold'
                : 'hover:bg-primary/20'
        "
        @click="handleVisit(route.link!)"
    >
        <div
            class="absolute left-0 w-1.25 bg-primary h-full rounded-tr-full rounded-br-full"
            v-if="currentPath === getPath(route.link!)"
        ></div>
        <Icon :icon="route.icon" width="24" height="24" />
        <span>
            {{ route.name }}
        </span>
    </button>
</template>
