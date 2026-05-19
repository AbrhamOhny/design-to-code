<script lang="ts" setup>
import { computed } from "vue";
import { useTheme, resolveCssColor, sum } from "../scripts";
import { PolarArea } from "vue-chartjs";
import { Chart as ChartJS, Title, Tooltip, Legend, ArcElement, RadialLinearScale } from "chart.js";
import ChartDataLabels from "chartjs-plugin-datalabels";

ChartJS.register(Title, Tooltip, Legend, ArcElement, RadialLinearScale, ChartDataLabels);
const { theme } = useTheme();
const { investment, entertainment, bill, other } = defineProps<{
    investment: number;
    entertainment: number;
    bill: number;
    other: number;
}>();
const chartLabels = ["Investment", "Entertainment", "Bill", "Other"];

const textColor = computed(() => {
    theme.value;
    return resolveCssColor(
        theme.value == "dark" ? "--color-primary2-lighter" : "--color-background-darker",
    );
});

const backgroundColor = computed(() => {
    theme.value;
    return resolveCssColor("--color-background-lighter");
});

const chartData = computed(() => {
    theme.value;
    return {
        labels: chartLabels,
        datasets: [
            {
                data: [investment, entertainment, bill, other],
                borderWidth: 10,
                borderColor: backgroundColor.value,
                hoverBorderColor: backgroundColor.value,
                backgroundColor: ["#FA00FF", "#1814F3", "#FC7900", "#343C6A"],
            },
        ],
    };
});
const chartOptions = computed(() => {
    theme.value;
    return {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            r: {
                ticks: {
                    display: false,
                },
                grid: {
                    display: false,
                },
            },
        },
        plugins: {
            legend: {
                display: true,
            },
            datalabels: {
                display: true,
                color: textColor.value,
                font: {
                    weight: "bold",
                    size: 12,
                },
                anchor: "center",
                align: "center",
                offset: 20,
                clamp: true,
                formatter: (value: number, context: any) => {
                    const _sum = sum(context.dataset.data);
                    return `${(value / _sum) * 100}%`;
                },
            },
            tooltip: {
                callbacks: {
                    labelColor: function (context: any) {
                        return {
                            borderColor: "transparent",
                            backgroundColor: context.dataset.backgroundColor[context.dataIndex],
                            borderWidth: 0,
                        };
                    },
                },
            },
        },
    };
});
</script>
<template>
    <div class="w-full aspect-square max-h-92">
        <PolarArea :data="chartData" :options="chartOptions" />
    </div>
</template>
