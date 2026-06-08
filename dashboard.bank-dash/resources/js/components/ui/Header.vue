<script lang="ts" setup>
import { onMounted, inject, ref, type Ref, onUnmounted } from "vue";
import { usePage } from "@inertiajs/vue3";
import { useTheme } from "../../scripts";
const viewMode = inject<Ref<string | undefined>>("viewMode", ref(undefined));
const page = usePage();
const { theme } = useTheme();
const user = page.props.user as any;
const __routes = page.props.dashboardRoutes as Record<string, string>;
const emit = defineEmits(["toggleNav"]);
const profileActionOpen = ref(false);
const profileActionMenu = ref<HTMLElement | null>(null);
function handleProfileAction() {
    profileActionOpen.value = !profileActionOpen.value;
}
function handleClickOutside(event) {
    if (
        profileActionMenu.value &&
        !profileActionMenu.value.contains(event.target)
    ) {
        profileActionOpen.value = false;
    }
}
onMounted(() => {
    document.addEventListener("click", handleClickOutside);
    const header: HTMLElement | null = document.querySelector("header");
    document.documentElement.style.setProperty(
        "--header-height",
        `${header?.offsetHeight}px`,
    );
});
onUnmounted(() => {
    document.removeEventListener("click", handleClickOutside);
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
                <Icon
                    icon="ic:outline-search"
                    width="18"
                    height="18"
                    class="shrink-0"
                />
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
                    <Icon
                        icon="ic:baseline-notifications-none"
                        width="18"
                        height="18"
                    />
                </div>
                <div class="w-fit relative" ref="profileActionMenu">
                    <button
                        class="aspect-square overflow-clip rounded-full bg-background-darker"
                    >
                        <img
                            width="32"
                            height="32"
                            :src="user.information.image_url"
                            @click="handleProfileAction"
                        />
                    </button>
                    <div
                        id="profile-action-menu"
                        class="fixed -translate-x-42 translate-y-6 flex w-52 flex-col overflow-clip rounded-2xl bg-background-lighter drop-shadow-lg"
                        :class="
                            theme == 'dark'
                                ? 'drop-shadow-background-darker'
                                : 'drop-shadow-primary2-darker'
                        "
                        :style="{
                            maxHeight: profileActionOpen ? '100%' : '0%',
                        }"
                    >
                        <a
                            class="flex flex-row items-center gap-2 w-full px-5 py-3"
                        >
                            <Icon icon="mdi:gear" width="18" height="18" />
                            <span>Settings</span>
                        </a>
                        <a
                            class="flex flex-row items-center gap-2 w-full px-5 py-3 bg-error text-background-lighter"
                            :href="__routes.deauthenticate"
                        >
                            <Icon icon="mdi:logout" width="18" height="18" />
                            <span>Logout</span>
                        </a>
                    </div>
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
