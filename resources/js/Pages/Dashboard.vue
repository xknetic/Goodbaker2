<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import VueApexCharts from 'vue3-apexcharts';
import { ref } from 'vue';

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

// Doughnut chart options
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
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white rounded-lg p-6">
                    <!-- Top -->
                    <div class="flex justify-between items-center mb-2">
                        <h4 class="font-bold">Sales Reports </h4>
                    </div>
                    <div class="border-b border-gray-700 mb-2" />
                    <div class="flex">
                        <VueApexCharts :options="chartOptions" :series="chartOptions.series" type="bar" height="200" />
                        <div class="border-l border-gray-700" />
                        <VueApexCharts :options="doughnutChartOptions" :series="doughnutChartOptions.series" type="donut" height="200" />
                    </div>
                </div>

                <div class="bg-white rounded-lg p-6 mt-5">
                    <!-- Top -->
                    <div class="flex justify-between items-center mb-2">
                        <h4 class="font-bold"> Recent transaction </h4>
                    </div>
                    <div class="border-b border-gray-700 mb-2" />

                    <!-- Bottom Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs uppercase">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Client Name</th>
                                    <th scope="col" class="px-6 py-3">Address</th>
                                    <th scope="col" class="px-6 py-3">Time</th>
                                    <th scope="col" class="px-6 py-3">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="product in products" :key="product.id" class="border-gray-700">
                                    <td class="px-6 py-4">{{ product.category }}</td>
                                    <td class="px-6 py-4">{{ product.productName }}</td>
                                    <td class="px-6 py-4">{{ product.unit }}</td>
                                    <td class="px-6 py-4">{{ product.quantity }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>