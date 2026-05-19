<script lang="ts" setup>
import { computed } from "vue";

const {
    balance,
    name,
    valid,
    uniqueID,
    currency = "$",
    isMain = true,
} = defineProps<{
    balance: number;
    name: string;
    valid: Date;
    uniqueID: number;
    currency?: string;
    isMain?: boolean;
}>();

const slicedUID = computed(() => {
    return uniqueID
        .toString()
        .match(/.{1,4}/g)
        ?.map((group, index) => {
            if (index === 1 || index === 2) return "*".repeat(group.length);
            return group;
        });
});
</script>
<template>
    <div
        class="flex flex-col rounded-2xl overflow-clip min-w-[350px] min-h-[235px] flex-1"
        :class="!isMain ? 'border-2' : ''"
    >
        <div
            class="flex flex-col gap-5 p-7 flex-1"
            :class="isMain ? 'custom-gradient text-onGradient' : 'bg-background-lighter'"
        >
            <div class="flex flex-row justify-between items-end">
                <div class="flex flex-col gap-1">
                    <span class="text-xs font-light">Balance</span>
                    <span class="text-md font-semibold">{{ `${currency}${balance}` }}</span>
                </div>
                <Icon icon="mdi:integrated-circuit-chip" width="32" height="32" />
            </div>
            <div class="flex flex-row flex-1 items-center">
                <div class="flex flex-col flex-1 gap-1">
                    <span class="text-xs font-light">CARD HOLDER</span>
                    <span class="text-md font-semibold">{{ name }}</span>
                </div>

                <div class="flex flex-col flex-1">
                    <span class="text-xs font-light">VALID THRU</span>
                    <span class="text-md font-semibold">{{
                        valid.toLocaleDateString("en-US", {
                            month: "2-digit",
                            year: "2-digit",
                        })
                    }}</span>
                </div>
            </div>
        </div>

        <div
            class="flex flex-col gap-5 px-7 py-5"
            :class="isMain ? 'custom-gradient text-onGradient' : 'bg-background-lighter border-t'"
        >
            <div class="flex flex-row justify-between">
                <span class="text-lg font-semibold">{{ slicedUID!.join(" ") }}</span>
                <Icon icon="grommet-icons:mastercard" width="32" />
            </div>
        </div>
    </div>
</template>
