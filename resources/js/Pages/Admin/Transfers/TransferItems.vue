<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    transfers: {
        type: Array,
        default: () => [],
    },
});

</script>

<template>
    <Head title="Transfer Items" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <h3 class="font-bold">Transfer Items</h3>
                <Link :href="route('transfers.create')" class="btn btn-primary">
                    <PrimaryButton>
                        <span> Transfer </span>
                    </PrimaryButton>
                </Link>
            </div>
            <div class="border-b border-gray-700 my-2 mb-5" />

            <!-- Bottom Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs uppercase">
                        <tr>
<<<<<<< HEAD
                            <th scope="col" class="px-6 py-3">#</th>
=======
                            <th scope="col" class="px-6 py-3">SN</th>
>>>>>>> ccf9f6e (8/11)
                            <th scope="col" class="px-6 py-3">Date.</th>
                            <th scope="col" class="px-6 py-3">Transfer To: </th>
                            <th scope="col" class="px-6 py-3 flex justify-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-gray-700" v-for="transfer, index in transfers" :key="transfer.id">
                            <td class="px-6 py-4">{{ index + 1}}</td>
                            <td class="px-6 py-4"> {{ transfer.transferDate }}</td>
                            <td class="px-6 py-4">{{ transfer.branches.branchName }}</td>
                            <td class="px-6 py-4 flex items-center space-x-3 justify-center">
                                <Link :href="route('transfers.show', transfer.transferID)" class="text-blue-400 hover:text-blue-600">
                                    <PrimaryButton>
                                        View More
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