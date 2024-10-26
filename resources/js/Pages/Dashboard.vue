<script setup>
import SaleChart from '@/Components/SaleChart.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    sales: {
        type: Object,
        default: () => ({}),
    },
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <article class="min-h-full rounded-lg flex flex-col">
            <!-- left -->
            <div class="flex gap-5">
                <main class="flex-1 overflow-auto">
                    <div class="mb-5">
                        <div class="bg-white p-5 mb-5 rounded-lg">
                            <h4 class="font-bold">Sales Report</h4>

                            <div class="border-b border-gray-700 my-2 mb-5" />

                            <SaleChart />
                        </div>
                        <div class="bg-white p-5 rounded-lg overflow-auto">
                            <h4 class="font-bold">Recent Transaction</h4>

                            <div class="border-b border-gray-700 my-2 mb-5" />

                            <table class="w-full text-sm text-left">
                                <thead class="text-xs uppercase">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Client Name</th>
                                        <th scope="col" class="px-6 py-3">Address</th>
                                        <th scope="col" class="px-6 py-3">Time</th>
                                        <th scope="col" class="px-6 py-3">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="text-xs uppercase">
                                    <tr>
                                        <td scope="col" class="px-6 py-3">Client Name</td>
                                        <td scope="col" class="px-6 py-3">Address</td>
                                        <td scope="col" class="px-6 py-3">Time</td>
                                        <td scope="col" class="px-6 py-3">Status</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </main>
                <aside class="bg-white rounded-lg p-5 w-[30%]">

                    <div class="border-b border-gray-700 my-2 mb-5" />

                </aside>
            </div>
        </article>
    </AuthenticatedLayout>
</template>