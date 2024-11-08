<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Multiselect from 'vue-multiselect';
import { ref } from 'vue';

const props = defineProps({
    branches: {
        type: Object,
        default: () => ({}),
    },
});

// Create a reactive property to hold the selected branches
const selectedBranches = ref([]);

// Create an options array from the branches prop for the multiselect
const options = props.branches.map(branch => ({
    id: branch.id,
    name: branch.branchName,
}));
</script>

<template>
    <Head title="Branches" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <h3 class="font-bold"> Branch </h3>
                <div class="flex gap-2">
                    <Link :href="route('branches.csvimports')" class="btn btn-primary">
                        <PrimaryButton>
                            Import CSV
                        </PrimaryButton>
                    </Link>
                    <Link :href="route('branches.create')" class="btn btn-primary">
                        <PrimaryButton>
                            Create
                        </PrimaryButton>
                    </Link>
                </div>
            </div>
            <div class="border-b border-gray-700 my-2 mb-5" />

            <!-- Multi-select for Branches -->
            <!-- <div class="mb-5">
                <label for="branch-select" class="block text-sm font-medium text-gray-700">Select Branches:</label>
                <Multiselect
                    v-model="selectedBranches"
                    :options="options"
                    label="name"
                    :close-on-select="true"
                    :searchable="true"
                />
            </div> -->

            <!-- Bottom Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs uppercase">
                        <tr>
                            <th scope="col" class="px-6 py-3">Branch</th>
                            <th scope="col" class="px-6 py-3">Available Products</th>
                            <th scope="col" class="px-6 py-3">Today Sold</th>
                            <th scope="col" class="px-6 py-3">Contact Person</th>
                            <th scope="col" class="px-6 py-3">View Branch</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="branch in branches" :key="branch.id">
                            <td class="px-6 py-4"> {{ branch.branchName }}</td>
                            <td class="px-6 py-4"></td>
                            <td class="px-6 py-4"></td>

                            <td class="px-6 py-4" v-if="branch.users">{{ branch.users.name }} ({{ branch.contact }})</td>
                            <td class="px-6 py-4" v-else> </td>
                            <td class="px-6 py-4 flex items-center space-x-3">
                                <Link :href="route('branches.show', branch.branchID)" class="text-[#0109F4] hover:text-blue-400">
                                    <PrimaryButton>
                                        View branch
                                    </PrimaryButton>
                                </Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </article>
    </AuthenticatedLayout>
</template>
