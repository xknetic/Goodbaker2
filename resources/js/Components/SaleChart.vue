<script setup>
import { ref } from 'vue';
import VueApexCharts from 'vue3-apexcharts';



const chartOptions = ref({
    chart: {
        type: 'bar',
    },
    dataLabels: {
        enabled: false,
    },
    series: [{
        name: 'Sales',
        data: [10, 41, 35, 51, 49, 62, 148]
    }],
    xaxis: {
        categories: ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT']
    },
    colors: ['#0108EE'],
});

//Doughnut chart options
const doughnutChartOptions = ref({
    chart: {
        type: 'donut',
    },
    dataLabels: {
        enabled: false,
    },
    series: [44, 55],
    labels: ['Income', 'Outcome'],
    colors: ['#0108EE', '#F7C849'],
    legend: {
        position: 'bottom',
        horizontalAlign: 'center',
        offsetX: 0,
        offsetY: 0,
    },
});
</script>

<template>
    <div class="flex items-center justify-center">
        <div class="flex">
            <VueApexCharts
                :options="chartOptions"
                :series="chartOptions.series" 
                type="bar"
                height="auto"
            />
            <div class="border-l border-gray-700" />
            <VueApexCharts
                :options="doughnutChartOptions" 
                :series="doughnutChartOptions.series" 
                type="donut" 
                height="200"
            />
        </div>
    </div>
</template>
