<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
</script>

<template>
    <Head title="TransferProducts" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <h3 class="font-bold">TransferProducts</h3>
                <Link :href="route('transferitems.create')" class="btn btn-primary">
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
                            <th scope="col" class="px-6 py-3">SN</th>
                            <th scope="col" class="px-6 py-3">Date.</th>
                            <th scope="col" class="px-6 py-3">Invoice</th>
                            <th scope="col" class="px-6 py-3">Transfer From: </th>
                            <th scope="col" class="px-6 py-3">Transfer To: </th>
                            <th scope="col" class="px-6 py-3">Items</th>
                            <th scope="col" class="px-6 py-3">Quantity</th>
                            <th scope="col" class="px-6 py-3">Price</th>
                            <th scope="col" class="px-6 py-3 flex justify-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-gray-700">
                            <td class="px-6 py-4"> lkjhg</td>
                            <td class="px-6 py-4"> kjhgf</td>
                            <td class="px-6 py-4"> lkjhgfd</td>
                            <td class="px-6 py-4">ajhgf</td>
                            <td class="px-6 py-4">asd</td>
                            <td class="px-6 py-4 flex items-center space-x-3 justify-center">
                                <!-- <Link :href="route('deliveries.show', delivery.deliveryID)" class="text-blue-400 hover:text-blue-600">
                                    <PrimaryButton>
                                        View More
                                    </PrimaryButton>
                                </Link> -->
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </article>
    </AuthenticatedLayout>
</template>