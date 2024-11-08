<script setup>
import { ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    branches: {
        type: Object,
        default: () => [],
    },

    salestransactions: {
        type: Array,
        default: () => [],
    },
});

// State to track the selected category for the table
const activeCategory = ref('');

// Example data for Premixes and Raw Materials (you will replace this with your actual data)
const premixes = [
    { id: 1, name: 'Premix 1', quantity: '100', price: '500.00' },
    { id: 2, name: 'Premix 2', quantity: '200', price: '300.00' }
];

const rawMaterials = [
    { id: 1, name: 'Material 1', quantity: '150', price: '50.00' },
    { id: 2, name: 'Material 2', quantity: '300', price: '25.00' }
];

// Method to change the active category
const showCategory = (category) => {
    activeCategory.value = category;
};
</script>

<template>
    <Head title="Branches" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <h3 class="font-bold">Branches</h3>
            </div>
            <div class="border-b border-gray-700 my-2 mb-5" />

            <!-- Bottom Table -->
            <div class="overflow-x-auto">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-5">
                        <div>
                            <Link :href="route('branches.index')" class="btn btn-primary">
                                <PrimaryButton>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
                                    </svg>
                                </PrimaryButton>
                            </Link>
                        </div>
                        <div v-if="branches">
                            <h3>{{ branches.branchName }}</h3>
                        </div>
                    </div>
                    <div class="space-x-5">
                        <PrimaryButton class="p-2" @click="showCategory('sale')">
                            Sale Transactions
                        </PrimaryButton>
                        <PrimaryButton class="p-2" @click="showCategory('premixes')">
                            Premixes
                        </PrimaryButton>
                        <PrimaryButton class="p-2" @click="showCategory('beverages')">
                            Beverages
                        </PrimaryButton>
                        <PrimaryButton class="p-2" @click="showCategory('rawMaterials')">
                            Raw Materials
                        </PrimaryButton>
                    </div>
                </div>

                <div class="border-b border-gray-700 my-5" />

                <!-- Conditional Rendering of Tables Based on Active Category -->
                <!-- Sale Transactions Table -->
                <div v-if="activeCategory === 'sale'">
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs uppercase">
                            <tr>
                                <th scope="col" class="px-6 py-3">#</th>
                                <th scope="col" class="px-6 py-3">Terminal</th>
                                <th scope="col" class="px-6 py-3">Username</th>
                                <th scope="col" class="px-6 py-3">Transaction Date</th>
                                <th scope="col" class="px-6 py-3">Transaction Number</th>
                                <th scope="col" class="px-6 py-3">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(transaction, index) in salestransactions" :key="transaction.id">
                                <td class="px-6 py-4">{{ index + 1 }}</td>
                                <td class="px-6 py-4">{{ transaction.Terminal }}</td>
                                <td class="px-6 py-4">{{ transaction.UserName }}</td>
                                <td class="px-6 py-4">{{ transaction.TranDate }}</td>
                                <td class="px-6 py-4">{{ transaction.TranNo }}</td>
                                <td class="px-6 py-4">{{ transaction.price }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div v-if="activeCategory === 'premixes'">
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs uppercase">
                            <tr>
                                <th scope="col" class="px-6 py-3">SL.</th>
                                <th scope="col" class="px-6 py-3">Name</th>
                                <th scope="col" class="px-6 py-3">Quantity</th>
                                <th scope="col" class="px-6 py-3">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(premix, index) in premixes" :key="premix.id">
                                <td class="px-6 py-4">{{ index + 1 }}</td>
                                <td class="px-6 py-4">{{ premix.name }}</td>
                                <td class="px-6 py-4">{{ premix.quantity }}</td>
                                <td class="px-6 py-4">{{ premix.price }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div v-if="activeCategory === 'rawMaterials'">
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs uppercase">
                            <tr>
                                <th scope="col" class="px-6 py-3">SL.</th>
                                <th scope="col" class="px-6 py-3">Name</th>
                                <th scope="col" class="px-6 py-3">Quantity</th>
                                <th scope="col" class="px-6 py-3">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(material, index) in rawMaterials" :key="material.id">
                                <td class="px-6 py-4">{{ index + 1 }}</td>
                                <td class="px-6 py-4">{{ material.name }}</td>
                                <td class="px-6 py-4">{{ material.quantity }}</td>
                                <td class="px-6 py-4">{{ material.price }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Add more conditional tables for other categories like Beverages, etc. -->
            </div>
        </article>
    </AuthenticatedLayout>
</template>
