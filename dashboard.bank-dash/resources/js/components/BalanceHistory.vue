<script lang="ts" setup>
import { computed } from "vue";
import { getRecentMonths, resolveCssColor, useTheme } from "../scripts";
import type { FixedLengthArray } from "../types";
import { Line } from "vue-chartjs";
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    LineController,
    LineElement,
    PointElement,
    Filler,
} from "chart.js";
ChartJS.register(CategoryScale, LinearScale, LineController, LineElement, PointElement, Filler);

const { theme } = useTheme();

const textColor = computed(() => {
    theme.value;
    return resolveCssColor(
        theme.value === "dark" ? "--color-primary2-darker" : "--color-primary2-lighter",
    );
});
const gridBackgroundColor = computed(() => {
    theme.value;
    return resolveCssColor("--color-background");
});
const backgroundColor = computed(() => {
    theme.value;
    return resolveCssColor("--color-primary");
});
const borderColor = computed(() => {
    theme.value;
    return resolveCssColor("--color-primary");
});

const chartLabels = getRecentMonths();

const { data } = defineProps<{
    data: FixedLengthArray<number, 6>;
}>();
const chartData = computed(() => {
    theme.value;
    return {
        labels: chartLabels,
        datasets: [
            {
                data: data,
                backgroundColor: `rgb(from ${backgroundColor.value} r g b / 0.2)`,
                borderColor: borderColor.value,
                tension: 0.4,
                fill: true,
                pointRadius: 5,
                pointHoverRadius: 5,
            },
        ],
    };
});
const chartOptions = computed(() => {
    theme.value;
    return {
        responsive: true,
        scales: {
            x: {
                ticks: { color: textColor.value },
                grid: { display: false },
            },
            y: {
                ticks: { color: textColor.value },
                grid: { color: gridBackgroundColor.value },
            },
        },
        plugins: {
            legend: {
                display: false,
            },
            datalabels: {
                display: false,
            },
            tooltip: {
                displayColors: false,
            },
        },
    };
});
</script>

<template>
    <Line :data="chartData" :options="chartOptions" />
</template>
