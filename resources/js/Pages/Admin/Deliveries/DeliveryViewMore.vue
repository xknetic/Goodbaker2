<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link,useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';

const props = defineProps({
    deliveries: {
        type: Object,
        default: () => [],
    },
});

</script>

<template>
    <Head title="Delivery" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <h3 class="font-bold">Delivery</h3>
            </div>
            <div class="border-b border-gray-700 my-2 mb-5" />

            <!-- Bottom Table -->
            <div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-5">
                        <div>
                            <Link :href="route('deliveries.index')" class="btn btn-primary">
                                <PrimaryButton> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
                                    </svg>
                                </PrimaryButton>
                            </Link>
                        </div>
                        <div v-if="deliveries">
                            <h3>Truck {{ deliveries.trucks.truckID }}</h3>
                            <p> {{ deliveries.trucks.plateNumber }} </p>
                        </div>
                    </div>
                    <div class="space-x-5">
                        <!-- <Link href="/sales" class="btn btn-primary">
                            <PrimaryButton class="p-2">
                                Branch
                            </PrimaryButton>
                        </Link> -->
                    </div>
                </div>

                <div class="border-b border-gray-700 my-5" />

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs uppercase">
                            <tr>
                                <th scope="col" class="px-6 py-3">Client/Branch Name</th>
                                <th scope="col" class="px-6 py-3">Product Items</th>
                                <th scope="col" class="px-6 py-3">Quantity</th>
                                <th scope="col" class="px-6 py-3">Price</th>
                                <th scope="col" class="px-6 py-3">Amount</th>
                                <th scope="col" class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-6 py-4" v-if="deliveries">{{ deliveries.clients.clientName }}</td>
                                <td class="px-6 py-4" v-if="deliveries">{{ deliveries.truckloaditems[0].quantity }}</td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="flex mt-5 mr-5 justify-end">
                    <h4> Total </h4>
                </div>

            </div>
        </article>
    </AuthenticatedLayout>
</template>