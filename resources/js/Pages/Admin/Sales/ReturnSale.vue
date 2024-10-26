<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import { ref, computed } from 'vue';

const props = defineProps({
    sales: {
        type: Array,
        default: () => [],
    },
    saletypes: {
        type: Array,
        default: () => [],
    },
    trucks: {
        type: Array,
        default: () => [],
    },
});

const currentDate = () => {
    const current = new Date();
    return current.toISOString().split('T')[0];
};

const form = useForm({
    salesDate: currentDate(),
    salesStatus: '',
    truck: '',
    saleType: '',
    deliveryID: '',
    products: [],
});

const newProduct = ref({ product: '', quantity: '', truckLoadItems:''});

const addProduct = () => {
    form.products.push({ ...newProduct.value });
    newProduct.value.product = '';
    newProduct.value.quantity = '';
    newProduct.value.truckLoadItems = '';
};

const submit = () => {
    form.post(route('sales.store'));
}
</script>

<template>
    <Head title="Sales" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <h3 class="font-bold">Sales</h3>
            </div>
            <div class="border-b border-gray-700 my-2 mb-5" />

            <!-- Bottom Table -->
            <!-- Form -->
            <form @submit.prevent="submit">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-5">
                        <div>
                            <Link :href="route('sales.index')" class="btn btn-primary">
                                <PrimaryButton> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
                                    </svg>
                                </PrimaryButton>
                            </Link>
                        </div>
                        <div>
                            <h3> Delivery Load </h3>
                        </div>
                    </div>
                    <div class="space-x-5">
                        <PrimaryButton class="p-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Create
                        </PrimaryButton>
                    </div>
                </div>

                <div class="border-b border-gray-700 my-5" />

                <!-- Form Fields -->
                <div>
                    <div class="hidden">
                        <InputLabel for="salesDate" class="mb-2">Load Date</InputLabel>
                        <TextInput class="mt-1 block w-[50%]" id="salesDate" type="text" v-model="form.salesDate" disabled />
                    </div>

                    <div>
                        <InputLabel for="saleType" class="mb-2">Delivery Type</InputLabel>
                        <select class="mt-1 w-[50%] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="saleType" v-model="form.saleType" required>
                            <option disabled value="">Select Delivery Type</option>
                            <option v-for="type in saletypes" :key="type.id" :value="type.saleTypeId">{{ type.saleTypeName }}</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <InputLabel for="deliveryID" class="mb-2">Delivery</InputLabel>
                        <TextInput class="mt-1 block w-[50%]" id="deliveryID" v-model="form.deliveryID" />
                        <InputError :message="form.errors.deliveryID" />
                    </div>
                    
                    <div>
                        <InputLabel for="truckID" class="mb-2">Truck</InputLabel>
                        <select class="mt-1 w-[50%] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="truckID" v-model="form.truck" required>
                            <option disabled value="">Select Truck</option>
                            <option v-for="truck in trucks" :key="truck.id" :value="truck.truckID">Truck {{ truck.truckID }} ({{ truck.plateNumber }})</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <InputLabel for="salesStatus" class="mb-2">Sales Status</InputLabel>
                        <TextInput class="mt-1 block w-[50%]" id="salesStatus" v-model="form.salesStatus" />
                        <InputError :message="form.errors.salesStatus" />
                    </div>
                </div>

                <!-- Bottom Table for Ingredients -->
                <div>
                    <h4>Ingredients</h4>

                    <div class="flex gap-5 mb-3">
                        <TextInput v-model="newProduct.product" class="mt-1 block w-[20%]" type="text" placeholder="Product" />
                        <TextInput v-model="newProduct.truckLoadItems" class="mt-1 block w-[20%]" type="text" placeholder="Truck Load Items" />
                        <TextInput v-model="newProduct.quantity" class="mt-1 block w-[20%]" type="text" placeholder="Quantity" />
                        <PrimaryButton @click.prevent="addProduct" class="px-5">
                            Add
                        </PrimaryButton>
                    </div>

                    <table class="w-[50%] text-sm text-left">
                        <thead class="text-xs uppercase">
                            <tr>
                                <th scope="col" class="px-6 py-3">Product</th>
                                <th scope="col" class="px-6 py-3">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(product, index) in form.products" :key="index">
                                <td class="px-6 py-4"> {{ product.product }} {{ product.truckLoadItems }} </td>
                                <td class="px-6 py-4"> {{ product.quantity }} </td>
                                <td class="px-6 py-4 flex items-center space-x-3">
                                    <button @click.prevent="removeIngredient(index)" class="text-red-700 hover:text-red-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="flex mt-5 mr-5 justify-end">
                    <table class="text-sm text-left">
                        <thead class="text-xs uppercase">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-right">Total Sales (VAT inclusive)</th>
                                <td scope="col" class="px-6 py-3">database</td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-right">Less: VAT</th>
                                <td scope="col" class="px-6 py-3">database</td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-right">Amount: Net of VAT</th>
                                <td scope="col" class="px-6 py-3">database</td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-right">Less: SC/PWD Discount</th>
                                <td scope="col" class="px-6 py-3">database</td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-right">Amount Due</th>
                                <td scope="col" class="px-6 py-3">database</td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-right">Add: VAT</th>
                                <td scope="col" class="px-6 py-3">database</td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-right"><h4>Total Amount Due:</h4></th>
                                <td scope="col" class="px-6 py-3">database</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </form>
        </article>
    </AuthenticatedLayout>
</template>