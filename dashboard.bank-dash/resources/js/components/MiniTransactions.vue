<script lang="ts" setup>
import { computed } from "vue";
import { getCurrentInstance } from "vue";

const { appContext } = getCurrentInstance()!;
const capitalize = appContext.config.globalProperties.$capitalize;
const { amount, date, sender, receiver } = defineProps<{
    amount: number;
    date: Date;
    sender: string;
    receiver: string;
}>();

const getTransactionType = computed(() => {
    if (sender === "user" || receiver === "user") return "transfer";
    else if (sender === "self") return "withdraw";
    else if (receiver === "self") return "deposit";
    return "unknown";
});

const iconName = computed(() => {
    switch (getTransactionType.value) {
        case "withdraw":
            return "vaadin:money-withdraw";
        case "deposit":
            return "vaadin:money-deposit";
        case "transfer":
            return "mdi:instant-transfer";
        default:
            return "mdi:question-mark";
    }
});

const getDescription = computed(() => {
    return `${capitalize(getTransactionType.value)} from ${sender === "self" ? "my Card" : capitalize(sender)}`;
});

const isIncome = computed(() => {
    switch (getTransactionType.value) {
        case "deposit":
            return 1;
        case "withdraw":
            return 0;
        case "transfer":
            return sender === "self" ? 0 : 1;
        default:
            return -1;
    }
});

const iconColor = computed(() => {
    const incomingTrans = ["var(--color-lime-800)", "var(--color-lime-300)"];
    const outgoingTrans = ["var(--color-amber-800)", "var(--color-amber-300)"];
    switch (isIncome.value) {
        case 1:
            return incomingTrans;
        case 0:
            return outgoingTrans;
        default:
            return ["var(--color-rose-800)", "var(--color-rose-950)"];
    }
});
</script>
<template>
    <div class="flex flex-row items-center gap-5">
        <div
            class="flex items-center justify-center p-4 rounded-full overflow-clip text-background"
            :style="`background-color: ${iconColor[0]}; color: ${iconColor[1]}`"
        >
            <Icon :icon="iconName" width="24" height="24" />
        </div>
        <div class="flex flex-2 flex-col gap-2">
            <span>{{ getDescription }}</span>
            <span class="text-sm text-primary2-darker">{{
                date.toLocaleDateString("en-GB", {
                    day: "2-digit",
                    month: "long",
                    year: "numeric",
                })
            }}</span>
        </div>
        <div class="flex flex-1 justify-end">
            <span :class="`${isIncome === 1 ? 'text-income' : 'text-outcome'}`">{{
                `${isIncome === 1 ? "+" : "-"} $${amount}`
            }}</span>
        </div>
    </div>
</template>
