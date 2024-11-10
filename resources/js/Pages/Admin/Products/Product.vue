<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { ref, computed } from 'vue';
import Modal from '@/Components/Modal.vue';
import TextInput from '@/Components/TextInput.vue';

const showModal = ref(false);

const props = defineProps({
    products: {
        type: Array,
        default: () => [],
    },
});

const form = useForm({
    product:'',
    quantity: '',
    productID:'',
});

const positiveQuantity = computed({
    get: () => form.quantity,
    set: (value) => {
        // Only set the value if it's a positive number or empty
        if (value === '' || Number(value) > 0) {
            form.quantity = value;
        }
    }
});

function replenish(product) {
    form.productID = product.productID;
    form.quantity = positiveQuantity;
    form.post(route('products.replenish'), {
        onSuccess: () => {
            alert('Replenish completed successfully, and items have been added to products.');
        },
        onError: () => {
            alert('There was an error completing the replenishment.');
        }
    });
}

function destroy(id) {
    if (confirm("Are you sure you want to delete this? This action cannot be undone.")) {
        form.delete(route('products.destroy', id));
    }
}

const searchProducts = ref('');
const filteredProducts = ref(props.products);

function filterProducts () {
    filteredProducts.value = props.products.filter(product =>
    product.productName.toString().toLowerCase().includes(searchProducts.value.toLowerCase())
    );
}

function selectProduct(product) {
    searchProducts.value = product.productName;
    form.product = product;
    filteredProducts.value = [];
}

</script>
<style>
    #selectpro {
        visibility: hidden;
        position: absolute;
        z-index: 1;
    }

    #typepro:focus~#selectpro {
        visibility: visible;
    }

    #selectpro:hover {
        visibility: visible;
    }

</style>

<template>
    <Head title="Products" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <h3 class="font-bold">Product</h3>
                <div class="flex gap-5">
                    <!-- <Link :href="route('categories.index')" class="btn btn-primary">
                        <PrimaryButton class="p-2">
                            Category
                        </PrimaryButton>
                    </Link>
                    <Link :href="route('areas.index')" class="btn btn-primary">
                        <PrimaryButton class="p-2">
                            Area
                        </PrimaryButton>
                    </Link> -->
                    <PrimaryButton @click.prevent="showModal = true" class="p-2">
                        Replenish
                    </PrimaryButton>

                    <Link :href="route('products.create')" class="btn btn-primary">
                        <PrimaryButton class="p-2">
                            Create
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
                            <th scope="col" class="px-6 py-3">category</th>
                            <th scope="col" class="px-6 py-3">Product Name</th>
                            <th scope="col" class="px-6 py-3">Unit</th>
                            <th scope="col" class="px-6 py-3">Quantity</th>
                            <th scope="col" class="px-6 py-3">Price</th>
                            <th scope="col" class="px-6 py-3">Amount</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--       Variable         Model                 Variable     relationship -->
                        <tr v-for="product in products" :key="product.id">
                            <td class="px-6 py-4">{{ product.productcategories.categoryName }}</td>
                            <td class="px-6 py-4">{{ product.productName }}</td>
                            <td class="px-6 py-4">{{ product.unit }}</td>
                            <td class="px-6 py-4">{{ product.quantity }}</td>
                            <td class="px-6 py-4">{{ product.productprices[0]?.price }}</td>
                            <td class="px-6 py-4">{{ product.quantity * product.productprices[0]?.price }}</td>
                            <td class="px-6 py-4 flex items-center space-x-3">
                                <Link :href="route('products.edit', product.productID)" class="text-[#0109F4] hover:text-blue-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>
                                </Link>
                                <button @click="destroy(product.productID)" class="text-red-700 hover:text-red-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <Modal
                :show="showModal" 
                @close="showModal = false" 
                :closeable="true"
                >
                <div class="overflow-auto max-h-svh p-8">
                    <div class="size-full p-8 flex items-start">

                        <div class="relative">
                            <InputLabel for="product" class="mb-2">Product</InputLabel>
                            <TextInput id="typepro"
                                type="text" 
                                v-model="searchProducts" 
                                @input="filterProducts" 
                                class="mt-1 block w-[100%]" 
                                placeholder="Search for product" 
                            />
                            <InputError :message="form.errors.supplierID" />

                            <ul id="selectpro" v-if="filteredProducts.length > 0" class="w-[100%] bg-white max-h-40 overflow-y-auto" >
                                <li 
                                    v-for="product in filteredProducts" 
                                    :key="product.productID" 
                                    @click="selectProduct(product)" 
                                    class="cursor-pointer hover:text-white hover:bg-[#0108EE] w-[100%] pl-5 rounded-lg mt-1"
                                >
                                    {{ product.productName }}
                                </li>
                            </ul>
                        </div>

                        <div class="flex items-center space-x-2">
                            <div class="w-[50%]">
                                <InputLabel for="quantity" class="mb-2">Quantity</InputLabel>
                                <TextInput class="mt-1 block w-[100%]" id="quantity" v-model="positiveQuantity" />
                                <InputError :message="form.errors.quantity" />
                            </div>
                            <PrimaryButton class="self-end" @click="replenish(form.product)">
                                Add
                            </PrimaryButton>
                        </div>

                    </div>
                    <table class="w-full">
                        <tr>
                            <td>Ingredient</td>
                            <td>Quantity Produced</td>
                        </tr>
                        <tr v-for="ingredient in form.product.productingredients">
                            <td>{{ ingredient.premix.premixName }}</td>
                            <td>{{ ingredient.quantity }}</td>
                        </tr>
                    </table>
                </div>

            </Modal>
        </article>
    </AuthenticatedLayout>
</template>