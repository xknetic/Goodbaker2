<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import { ref } from 'vue';

const props = defineProps({
    productcategories: {
        type: Array,
        default: () => [],
    },
    rawmaterials: {
        type: Array,
        default: () => [],
    },
    areas: {
        type: Array,
        default: () => [],
    },
    area: Object,
    product: Object,
    productPrices: Object,
    productIngredients: Object,
});

const form = useForm({
    productCategory: props.product.productCategory,
    productName: props.product.productName,
    unit: props.product.unit,
    quantity: props.product.quantity,
    price: props.productPrices,
    criticalLevel: props.product.criticalLevel,
    amount: props.product.amount,
    area: props.area,
    product: props.product.product,
    productID: props.product.productID,
    ingredients: props.productIngredients ? props.productIngredients : [],
});

const newIngredient = ref({ quantity: '', rawMaterial: '' });
var rawMaterialQuantity = 0;

const addIngredients = () => {
    if (newIngredient.value.quantity && newIngredient.value.rawMaterial) {
        props.rawmaterials.find((rawmaterial, i) => {
            if (rawmaterial.rawMaterialID === parseInt(newIngredient.value.rawMaterial)) {
                rawMaterialQuantity = props.rawmaterials[i].quantity;
                return true; // stop searching
            }
        });
        if ((rawMaterialQuantity >= newIngredient.value.quantity) && (newIngredient.value.quantity >= 0)) {
            form.ingredients.push({ ...newIngredient.value });
            newIngredient.value.quantity = '';
            newIngredient.value.rawMaterial = '';
        }
    }
};

const removeIngredient = (index) => {
    form.ingredients.splice(index, 1);
};

const submit = () => {
    form.put(route('products.update', props.product.productID));
}
</script>

<template>
    <Head title="Product" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <h3 class="font-bold">Products</h3>
            </div>
            <div class="border-b border-gray-700 my-2 mb-5" />

            <!-- Bottom Table -->
            <!-- Form -->
            <form @submit.prevent="submit">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-5">
                        <div>
                            <Link :href="route('products.index')" class="btn btn-primary">
                                <PrimaryButton> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
                                    </svg>
                                </PrimaryButton>
                            </Link>
                        </div>
                        <div>
                            <h3> Edit Product </h3>
                        </div>
                    </div>
                    <div class="space-x-5">
                        <!-- <Link href="/products" class="btn btn-primary">
                            <PrimaryButton class="p-2">
                                Cancel
                            </PrimaryButton>
                        </Link> -->

                        <PrimaryButton class="p-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Update
                        </PrimaryButton>
                    </div>
                </div>

                <div class="border-b border-gray-700 my-5" />

                <!-- Form Fields -->
                <div>
                    <InputLabel for="productName" class="mb-2">Product Name</InputLabel>
                    <TextInput class="mt-1 block w-[50%]" id="productName" type="text" v-model="form.productName" required />
                    <InputError :message="form.errors.productName" />
                </div>

                <div>
                    <InputLabel for="productCategory" class="mt-5">Category</InputLabel>
                    <select class="mt-1 w-[50%] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="productCategory" v-model="form.productCategory" required>
                        <option disabled value="">Select Category</option>
                        <option v-for="category in productcategories" :key="category.id" :value="category.categoryID">{{ category.categoryName }}</option>
                    </select>
                    <InputError :message="form.errors.productCategory"/>
                </div>

                <div>
                    <InputLabel for="price" class="mb-2"> Price </InputLabel>
                    <TextInput class="mt-1 block w-[50%]" id="price" type="text" v-model="form.price" required />
                    <InputError :message="form.errors.price" />
                </div>

                <div>
                    <InputLabel for="area" class="mt-5">Area</InputLabel>
                    <select 
                        class="mt-1 w-[50%] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="area" v-model="form.area">

                        <option disabled value="">Select Area</option>
                        <option v-for="area in props.areas" :key="area.id" :value="area.areaID">{{ area.areaName }}</option>
                    </select>

                    <InputError :message="form.errors.area"/>
                </div>

                <div>
                    <InputLabel for="unit" class="mb-2">Unit</InputLabel>
                    <TextInput class="mt-1 block w-[50%]" id="unit" type="text" v-model="form.unit" required />
                    <InputError :message="form.errors.unit" />
                </div>

                <div>
                    <InputLabel for="quantity" class="mb-2">Quantity</InputLabel>
                    <TextInput class="mt-1 block w-[50%]" id="quantity" type="text" v-model="form.quantity" required />
                    <InputError :message="form.errors.quantity" />
                </div>

                <div>
                    <InputLabel for="amount" class="mb-2">Amount</InputLabel>
                    <TextInput class="mt-1 block w-[50%]" id="amount" type="text" v-model="form.amount" required />
                    <InputError :message="form.errors.amount" />
                </div>

                <div>
                    <InputLabel for="criticalLevel" class="mb-2">Critical Level</InputLabel>
                    <TextInput class="mt-1 block w-[50%]" id="criticalLevel" type="text" v-model="form.criticalLevel" required />
                    <InputError :message="form.errors.criticalLevel" />
                </div>

                <!-- Bottom Table for Ingredients -->
                <div>
                    <h4>Ingredients</h4>

                    <div class="flex gap-5 mb-3">
                        <TextInput v-model="newIngredient.rawMaterial" class="mt-1 block w-[20%]" type="text" placeholder="Raw Material" />
                        <TextInput v-model="newIngredient.quantity" class="mt-1 block w-[20%]" type="text" placeholder="Quantity" />
                        <PrimaryButton @click.prevent="addIngredients" class="px-5">
                            Add
                        </PrimaryButton>
                    </div>

                    <table class="w-[50%] text-sm text-left">
                        <thead class="text-xs uppercase">
                            <tr>
                                <th scope="col" class="px-6 py-3">{{ rawMaterialQuantity }}</th>
                                <th scope="col" class="px-6 py-3">Quantity</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(ingredient, index) in form.ingredients" :key="index" class="border-gray-700">
                                <td class="px-6 py-4">{{ ingredient.rawMaterial }}</td>
                                <td class="px-6 py-4">{{ ingredient.quantity }}</td>
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
            </form>
        </article>
    </AuthenticatedLayout>
</template>