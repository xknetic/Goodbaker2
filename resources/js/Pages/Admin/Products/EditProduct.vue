<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';

const props = defineProps({
    product: Object,
    areas: Array,
});

const form = useForm({
    productCategory: props.product.productCategory,
    productName: props.product.productName,
    unit: props.product.unit,
    quantity: String(props.product.quantity), // Ensure it's a string
    price: '', // Initialize this with the product's current price if needed
    criticalLevel: String(props.product.criticalLevel), // Ensure it's a string
    amount: String(props.product.amount), // Ensure it's a string
    area: props.product.area,
    product: props.product.product,
});

// Function to submit the form
const submit = () => {
    form.put(route('products.update', props.product.productID));
}
</script>

<template>
    <Head title="Edit Product" />
    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <div class="flex justify-between items-center">
                <h3 class="font-bold">Edit Product</h3>
                <Link :href="route('products.index')" class="btn btn-primary">
                    <PrimaryButton>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
                        </svg>
                    </PrimaryButton>
                </Link>
            </div>

            <form @submit.prevent="submit">
                <InputLabel for="productName" class="mb-2">Product Name</InputLabel>
                <TextInput class="mt-1 block w-[50%]" id="productName" type="text" v-model="form.productName" required />
                <InputError :message="form.errors.productName" />

                <InputLabel for="productCategory" class="mt-5">Category</InputLabel>
                <select class="mt-1 w-[50%]" id="productCategory" v-model="form.productCategory" required>
                    <option disabled value="">Select Category</option>
                    <option value="PASTRIES">Pastries</option>
                    <option value="HOTBAKES">Hotbakes</option>
                    <option value="LAOVES">Loaves</option>
                    <option value="ASSORTED BREAD">Assorted Bread</option>
                    <option value="PASALUBONG">Pasalubong</option>
                    <option value="CAKES">Cakes</option>
                </select>
                <InputError :message="form.errors.productCategory" />

                <InputLabel for="price" class="mb-2">Price</InputLabel>
                <TextInput class="mt-1 block w-[50%]" id="price" type="text" v-model="form.price" required />
                <InputError :message="form.errors.price" />

                <InputLabel for="area" class="mt-5">Area</InputLabel>
                <select class="mt-1 w-[50%]" id="area" v-model="form.area" required>
                    <option disabled value="">Select Area</option>
                    <option v-for="area in props.areas" :key="area.id" :value="area.areaID">{{ area.areaName }}</option>
                </select>
                <InputError :message="form.errors.area" />

                <InputLabel for="unit" class="mb-2">Unit</InputLabel>
                <TextInput class="mt-1 block w-[50%]" id="unit" type="text" v-model="form.unit" required />
                <InputError :message="form.errors.unit" />

                <InputLabel for="quantity" class="mb-2">Quantity</InputLabel>
                <TextInput class="mt-1 block w-[50%]" id="quantity" type="text" v-model="form.quantity" required />
                <InputError :message="form.errors.quantity" />

                <InputLabel for="amount" class="mb-2">Amount</InputLabel>
                <TextInput class="mt-1 block w-[50%]" id="amount" type="text" v-model="form.amount" required />
                <InputError :message="form.errors.amount" />

                <InputLabel for="criticalLevel" class="mb-2">Critical Level</InputLabel>
                <TextInput class="mt-1 block w-[50%]" id="criticalLevel" type="text" v-model="form.criticalLevel" required />
                <InputError :message="form.errors.criticalLevel" />

                <PrimaryButton :disabled="form.processing" class="p-2">
                    Update
                </PrimaryButton>
            </form>
        </article>
    </AuthenticatedLayout>
</template>
