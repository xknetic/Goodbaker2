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

const completeTransferForm = useForm({ transferID: null });

function completeTransfer(transfer) {
    // Set the transferID to the selected transfer
    completeTransferForm.transferID = transfer.transferID;
    
    // Send the request to complete the transfer
    completeTransferForm.post(route('transfers.complete'), {
        onSuccess: () => {
            alert('Transfer completed successfully, and items have been deducted from inventory');
        },
        onError: () => {
            alert('There was an error completing the transfer.');
        }
    });
}

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
                            <th scope="col" class="px-6 py-3">#</th>
                            <th scope="col" class="px-6 py-3">Date.</th>
                            <th scope="col" class="px-6 py-3">Transfer To: </th>
                            <th scope="col" class="px-6 py-3 pl-10">Actions</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-gray-700" v-for="transfer, index in transfers" :key="transfer.id">
                            <td class="px-6 py-4">{{ index + 1}}</td>
                            <td class="px-6 py-4"> {{ transfer.transferDate }}</td>
                            <td class="px-6 py-4">{{ transfer.branches.branchName }}</td>
                            <td class="px-6 py-4 flex items-center space-x-3">
                                <Link :href="route('transfers.show', transfer.transferID)" class="text-blue-400 hover:text-blue-600">
                                    <PrimaryButton>
                                        View More
                                    </PrimaryButton>
                                </Link>
                                <button v-show="transfer.status === 'Pending'" @click="completeTransfer(transfer)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                                    </svg>
                                </button>
                            </td>
                            <td class="px-6 py-4">{{ transfer.status }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </article>
    </AuthenticatedLayout>
</template>