<script lang="ts" setup>
import { useTheme } from "../scripts";
const { theme } = useTheme();
const relativeIdentity = [
    {
        name: "Hitori Gotoh",
        title: "Guitarist",
        img: "/bocchi.png",
    },
    {
        name: "Yamada Ryo",
        title: "Bassist",
        img: "/ryo.jpg",
    },
    {
        name: "Ijichi Nijika",
        title: "Drumer",
        img: "/nijika.jpg",
    },
];
</script>
<template>
    <div class="flex flex-col gap-2">
        <div class="flex flex-row justify-between items-center">
            <div class="flex flex-row gap-2 justify-between items-center">
                <div class="profile-container" v-for="relative in relativeIdentity">
                    <img class="profile-image" :src="relative.img" />
                    <div class="flex flex-col items-center font-semibold">
                        <span
                            :class="
                                theme === 'dark' ? 'text-primary2-lighter' : 'text-primary2-darker'
                            "
                            >{{ relative.name }}</span
                        >
                        <span
                            :class="
                                theme === 'dark' ? 'text-primary2-darker' : 'text-primary2-lighter'
                            "
                            >{{ relative.title }}</span
                        >
                    </div>
                </div>
            </div>
            <div
                class="flex items-center rounded-full p-2 bg-background-lighter shadow-md shadow-primary2-darker/20"
            >
                <Icon icon="mdi:chevron-right" width="24" height="24" />
            </div>
        </div>
        <div class="flex flex-row items-center justify-between">
            <span>Write Amount</span>
            <div class="input-container">
                <input class="no-decoration" type="text" placeholder="525.50" />
                <button class="no-decoration" :class="{ 'text-background': theme === 'light' }">
                    <span>Send</span>
                    <Icon icon="system-uicons:paper-plane" width="24" height="24" />
                </button>
            </div>
        </div>
    </div>
</template>
<style lang="css" scoped>
@reference '../../css/app.css';
.profile-container {
    @apply flex flex-col gap-1 p-2 min-w-32 rounded-xl items-center;
}
.profile-container:hover {
    @apply bg-background-darker;
}
.profile-image {
    @apply object-top object-cover aspect-square rounded-full overflow-clip max-w-17.5;
}
.input-container {
    @apply bg-background-darker rounded-full overflow-clip flex flex-row;
}
input {
    @apply pl-5 pr-2 py-2 border-0 outline-0 max-w-24;
}
button {
    @apply flex flex-row gap-2 bg-primary rounded-full px-5 py-2;
}
</style>
