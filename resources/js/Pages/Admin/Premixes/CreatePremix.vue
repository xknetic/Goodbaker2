<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';

const form = useForm({
    productCategory: '',
    productName: '',
    unit: '',
    quantity: '',
    price: '',
    criticalLevel: '',
    amount: '',
    area: '',
    product: '',
});

const submit = () => {
    form.post(route('products.store'));
}
</script>

<template>
    <Head title="Premixes" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <h3 class="font-bold">Premixes</h3>
            </div>
            <div class="border-b border-gray-700 my-2 mb-5" />

            <!-- Bottom Table -->
            <!-- Form -->
            <form @submit.prevent="submit">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-5">
                        <div>
                            <Link :href="route('premixes.index')" class="btn btn-primary">
                                <PrimaryButton> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
                                    </svg>
                                </PrimaryButton>
                            </Link>
                        </div>
                        <div>
                            <h3> Create Premixes </h3>
                        </div>
                    </div>
                    <div class="space-x-5">
                        <!-- <Link href="/products" class="btn btn-primary">
                            <PrimaryButton class="p-2">
                                Cancel
                            </PrimaryButton>
                        </Link> -->

                        <PrimaryButton class="p-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Create
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
                    <select class="mt-1 block w-[50%]" id="productCategory" v-model="form.productCategory" required>
                        <option disabled value="">Select Category</option>
                        <option value="PASTRIES">Pastries</option>
                        <option value="HOTBAKES">Hotbakes</option>
                        <option value="LAOVES">Loaves</option>
                        <option value="ASSORTED BREAD">Assorted Bread</option>
                        <option value="PASALUBONG">Pasalubong</option>
                        <option value="CAKES">Cakes</option>
                    </select>
                    <InputError :message="form.errors.productCategory"/>
                </div>

                <div>
                    <InputLabel for="price" class="mb-2"> Price </InputLabel>
                    <TextInput class="mt-1 block w-[50%]" id="price" type="text" v-model="form.price" required />
                    <InputError :message="form.errors.price" />
                </div>

                <div>
                    <InputLabel for="area" class="mb-2"> Area </InputLabel>
                    <TextInput class="mt-1 block w-[50%]" id="area" type="text" v-model="form.area" required />
                    <InputError :message="form.errors.area" />
                </div>

                <div>
                    <InputLabel for="product" class="mb-2"> Product </InputLabel>
                    <TextInput class="mt-1 block w-[50%]" id="product" type="text" v-model="form.product" required />
                    <InputError :message="form.errors.product" />
                </div>

                <!-- <div>
                    <InputLabel for="areaName" class="mb-2">Area</InputLabel>
                    <select class="mt-1 block w-[50%]" id="areaName" v-model="form.areaName">
                        <option disabled value="">Select Area</option>
                        <option v-for="area in areas" :value="area.areaID" :key="area.areaID">{{ area.areaName }}</option>
                        <option v-for="product_price in productPrices" :key="product_price.id">{{ product_price.areas.areaName }}</option>
                    </select>
                    <InputError :message="form.errors.areaName"/>
                </div> -->

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
            </form>
        </article>
    </AuthenticatedLayout>
</template>