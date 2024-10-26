<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { usePermission } from '@/composables/permission';

const { hasRole } = usePermission();

const props = defineProps({
    deliveries: {
        type: Array,
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
                <div class="flex gap-5">
                    <Link
                        v-if="hasRole('admin')"
                        :href="route('deliverytypes.index')"
                        class="btn btn-primary">
                        <PrimaryButton class="p-2">
                            Delivery Type
                        </PrimaryButton>
                    </Link>
                    <Link
                        v-if="hasRole('admin')"
                        :href="route('drivers.index')"
                        class="btn btn-primary">
                        <PrimaryButton class="p-2">
                            Driver
                        </PrimaryButton>
                    </Link>
                    <Link
                        v-if="hasRole('admin')"
                        :href="route('trucks.index')"
                        class="btn btn-primary">
                        <PrimaryButton class="p-2">
                            Trucks
                        </PrimaryButton>
                    </Link>
                    <Link
                        :href="route('deliveries.create')"
                        class="btn btn-primary">
                        <PrimaryButton>
                            <span> Load </span>
                        </PrimaryButton>
                    </Link>
                </div>
            </div>
            <div class="border-b border-gray-700 my-2 mb-5" />

            <!-- Bottom Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs uppercase">
                        <tr>
                            <th scope="col" class="px-6 py-3">Truck</th>
                            <th scope="col" class="px-6 py-3">Plate No.</th>
                            <th scope="col" class="px-6 py-3">Truck Driver</th>
                            <th scope="col" class="px-6 py-3">Truck Agent</th>
                            <th scope="col" class="px-6 py-3">Total Sold</th>
                            <th scope="col" class="px-6 py-3 flex justify-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="delivery in deliveries" :key="delivery.id" class="border-gray-700">
                            <td class="px-6 py-4"> {{ delivery.trucks.truckID }} </td>
                            <td class="px-6 py-4"> {{ delivery.trucks.plateNumber }}</td>
                            <td class="px-6 py-4"> {{ delivery.drivers.driverName }} </td>
                            <td class="px-6 py-4">
                            </td>
                            <td class="px-6 py-4">asd</td>
                            <td class="px-6 py-4 flex items-center space-x-3 justify-center">
                                <Link :href="route('deliveries.show', delivery.deliveryID)" class="text-blue-400 hover:text-blue-600">
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