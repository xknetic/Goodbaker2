<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

// const props = defineProps({
//     products: {
//         type: Object,
//         default: () => ({}),
//     },
// });
</script>

<template>
    <Head title="Branches" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <h3 class="font-bold"> Branch </h3>
            </div>
            <div class="border-b border-gray-700 my-2 mb-5" />

            <!-- Bottom Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs uppercase">
                        <tr>
                            <th scope="col" class="px-6 py-3">Branch</th>
                            <th scope="col" class="px-6 py-3">Available Products</th>
                            <th scope="col" class="px-6 py-3">Remaining</th>
                            <th scope="col" class="px-6 py-3">Today Sold</th>
                            <th scope="col" class="px-6 py-3">View Branch</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-gray-700">
                            <td class="px-6 py-4">Mabini</td>
                            <td class="px-6 py-4">10515 PCS</td>
                            <td class="px-6 py-4">26000.00</td>
                            <td class="px-6 py-4">26000.00</td>
                            <td class="px-6 py-4 flex items-center space-x-3">
                                <Link  class="text-[#0109F4] hover:text-blue-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>
                                </Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </article>
    </AuthenticatedLayout>
</template>