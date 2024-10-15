<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from "@inertiajs/vue3";
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    premixes: {
        type: Array,
        default: () => [],
    },
});

const form = useForm({});

function destroy(id) {
    if (confirm("Sure ka ba idedelete mo? Di na to mababalik tanginamo ahh")) {
        form.delete(route('premixes.destroy', id));
    }
}
</script>

<template>
    <Head title="Premixes" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <h3 class="font-bold">Premixes</h3>
                <Link :href="route('premixes.create')" class="btn btn-primary">
                    <PrimaryButton class="p-2">
                        Create
                    </PrimaryButton>
                </Link>
            </div>
            <div class="border-b border-gray-700 my-2 mb-5" />

            <!-- Bottom Table -->
            <div class="overflow-x-auto" v-for="premix in premixes" :key="premix.id">
                <h3 class="px-6 py-4">{{ premix.category }}</h3>
                <table class="w-full text-sm text-left">
                    <thead class="text-xs uppercase">
                        <tr>
                            <th scope="col" class="px-6 py-3">Product</th>
                            <th scope="col" class="px-6 py-3">Size</th>
                            <th scope="col" class="px-6 py-3">Loakan</th>
                            <th scope="col" class="px-6 py-3">Mabini</th>
                            <th scope="col" class="px-6 py-3">City Camp</th>
                            <th scope="col" class="px-6 py-3">Rosario</th>
                            <th scope="col" class="px-6 py-3">Total</th>
                            <th scope="col" class="px-6 py-3">Cost</th>
                            <th scope="col" class="px-6 py-3">Amount</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr >
                            <td class="px-6 py-4">{{ premix.premixName }}</td>
                            <td class="px-6 py-4">₱{{ premix.size }}</td>
                            <td class="px-6 py-4">Loakan</td>
                            <td class="px-6 py-4">Mabini</td>
                            <td class="px-6 py-4">City Camp</td>
                            <td class="px-6 py-4">Rosario</td>
                            <td class="px-6 py-4">Total</td>
                            <td class="px-6 py-4">₱{{ premix.cost }}</td>
                            <td class="px-6 py-4">Amount</td>
                            <td class="px-6 py-4 flex items-center space-x-3">
                                <Link :href="route('premixes.edit', premix.premixID)" class="text-blue-500 hover:text-blue-700 transition duration-300 p-2 rounded-md flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>
                                </Link>
                                <button @click="destroy(premix.premixID)" class="text-red-400 hover:text-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </article>
    </AuthenticatedLayout>
</template>