<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    sales: {
        type: Array,
        default: () => [],
    },
    saleitems: {
        type: Array,
        default: () => [],
    },
});

const sortedSales = computed(() => {
    return props.sales.slice().sort((a, b) => new Date(b.salesDate) - new Date(a.salesDate));
});

</script>

<template>
    <Head title="Sales" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <h3 class="font-bold">Sales</h3>
                <Link href="sales/create" class="btn btn-primary">
                    <PrimaryButton class="p-2">
                        Create
                    </PrimaryButton>
                </Link>
            </div>
            <div class="border-b border-gray-700 my-2 mb-5" />

            <!-- Bottom Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs uppercase">
                        <tr>
                            <th scope="col" class="px-6 py-3">Transaction No.</th>
                            <th scope="col" class="px-6 py-3">Sale Type</th>
                            <th scope="col" class="px-6 py-3">Date/Time</th>
                            <!-- <th scope="col" class="px-6 py-3">Invoice</th> -->
                            <th scope="col" class="px-6 py-3">Product Items</th>
                            <th scope="col" class="px-6 py-3">Quantity</th>
                            <th scope="col" class="px-6 py-3">Price</th>
                            <th scope="col" class="px-6 py-3">Amount</th>
                            <!-- <th scope="col" class="px-6 py-3">Action</th> -->
                            <th scope="col" class="px-6 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="sale in sortedSales" :key="sale.id">
                            <td class="px-6 py-4 align-top"> {{ sale.salesID }} </td>
                            <td class="px-6 py-4 align-top"> {{ sale.delivery.saletypes.saleTypeName }} </td>
                            <td class="px-6 py-4 align-top"> {{ sale.salesDate }} </td>
                            <td class="px-6 py-4">
                                <tr v-for="item in sale.saleitems">{{ item.truckloaditems.products.productName }}</tr>
                            </td>
                            <td class="px-6 py-4">
                                <tr v-for="item in sale.saleitems">{{ item.quantity }}</tr>
                            </td>
                            <td class="px-6 py-4">
                                <tr v-for="item in sale.saleitems">{{ item.truckloaditems.products.productprices[0].price }}</tr>
                            </td>
                            <td class="px-6 py-4">
                                <tr v-for="item in sale.saleitems">{{ item.quantity*item.truckloaditems.products.productprices[0].price }}</tr>
                            </td>
                            <!-- <td class="px-6 py-4 flex items-center space-x-3">
                                <Link class="text-blue-400 hover:text-blue-600">
                                    <PrimaryButton>
                                        View More
                                    </PrimaryButton>
                                </Link>
                            </td> -->
                            <td class="px-6 py-4 align-top">{{ sale.salesStatus }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </article>
    </AuthenticatedLayout>
</template>