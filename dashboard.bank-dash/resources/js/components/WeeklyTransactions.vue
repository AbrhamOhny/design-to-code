<script lang="ts" setup>
import { Bar } from "vue-chartjs";
import { getWeekdays, resolveCssColor } from "../scripts";
import { type FixedLengthArray } from "../types";
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    BarElement,
    Tooltip,
    Legend,
} from "chart.js";

ChartJS.register(CategoryScale, LinearScale, BarElement, Tooltip, Legend);
const chartLabels = getWeekdays();
const props = defineProps<{
    income: FixedLengthArray<number, 7>;
    expense: FixedLengthArray<number, 7>;
}>();

const chartData = {
    labels: chartLabels,
    datasets: [
        {
            label: "Income",
            data: props.income,
            backgroundColor: resolveCssColor("--color-income"),
            borderRadius: 100,
            borderSkipped: false,
        },
        {
            label: "Expense",
            data: props.expense,
            backgroundColor: resolveCssColor("--color-outcome"),
            borderRadius: 100,
            borderSkipped: false,
        },
    ],
};
</script>
<template>
    <Bar :data="chartData" />
</template>
