<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
</script>

<template>
    <Head title="Branches" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <h2 class="font-bold">Delivery</h2>
            </div>
            <div class="border-b border-gray-700 my-2 mb-5" />

            <!-- Bottom Table -->
            <div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-5">
                        <div>
                            <Link href="/deliveries" class="btn btn-primary">
                                <PrimaryButton> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
                                    </svg>
                                </PrimaryButton>
                            </Link>
                        </div>
                        <div>
                            <h3> Load </h3>
                        </div>
                    </div>
                    <div class="space-x-5">
                        <Link href="/sales" class="btn btn-primary">
                            <PrimaryButton class="p-2">
                                Cancel
                            </PrimaryButton>
                        </Link>

                        <PrimaryButton class="p-2">
                            Create
                        </PrimaryButton>
                    </div>
                </div>

                <div class="border-b border-gray-700 my-5" />

                <div class="mb-2">
                    <div>
                        <InputLabel for="category" class="mt-5">Truck</InputLabel>
                        <select class="mt-1 block w-[40%]" id="category" required>
                            <option disabled selected value="">Select Truck</option>
                            <option value="PASTRIES">Truck 1</option>
                            <option value="HOTBAKES">Truck 2</option>
                            <option value="LAOVES">Truck 3</option>
                        </select>
                    </div>

                    <div>
                        <InputLabel for="productName" class="mb-2">Product</InputLabel>
                        <TextInput class="mt-1 block w-[40%]" id="productName" type="text" required />
                        <InputError />
                    </div>

                    <div>
                        <InputLabel for="deliveryType" class="mb-2">Delivery Type</InputLabel>
                        <TextInput class="mt-1 block w-[40%]" id="deliveryType" type="text" required />
                        <InputError />
                    </div>

                    <div>
                        <InputLabel for="client" class="mb-2">Client</InputLabel>
                        <TextInput class="mt-1 block w-[40%]" id="client" type="text" required />
                        <InputError />
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full h-full text-sm text-left">
                        <thead class="text-xs uppercase">
                            <tr>
                                <th scope="col" class="px-6 py-3">SL.</th>
                                <th scope="col" class="px-6 py-3">Product Name</th>
                                <th scope="col" class="px-6 py-3">Quantity</th>
                                <th scope="col" class="px-6 py-3">Unit Price</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-gray-700">
                                <td class="px-6 py-4">1</td>
                                <td class="px-6 py-4">10515 PCS</td>
                                <td class="px-6 py-4">26000.00</td>
                                <td class="px-6 py-4">26000.00</td>
                                <td class="px-6 py-4"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </article>
    </AuthenticatedLayout>
</template>