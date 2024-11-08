<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    saletypes: {
        type: Array,
        default: () => [],
    },
    clients: {
        type: Array,
        default: () => [],
    },
    productcategories: {
        type: Array,
        default: () => [],
    },
    products: {
        type: Array,
        default: () => [],
    },
    branches: {
        type: Array,
        default: () => [],
    },

});

const form = useForm({
    branches: [],
    categories: [],
});

// Store selected categories
const selectedCategories = ref([]);
const selectedBranches = ref([]);
const selectedSaleTypes = ref([]);

// Computed property to filter products based on selected categories
const filteredProducts = computed(() => {
    return props.products.filter(product =>
        selectedCategories.value.includes(product.productCategory)
    );
});

// Computed property to determine if "Loakan" branch is checked
const isLoakanChecked = computed(() => {
    return form.branches.includes('Loakan');
});

const isWholesaleChecked = computed(() => {
    return selectedSaleTypes.value.includes('Wholesale')
});

// Computed property to filter clients based on the selected branches
const filteredClients = computed(() => {
    return isLoakanChecked.value ? props.clients : [];
});

function toggle(isChecked, name) {
    if (name === 'category') {
        if (isChecked) {
        // If checked, add all category IDs to selectedCategories
        selectedCategories.value = props.productcategories.map(category => category.categoryID);
        } else {
        // If unchecked, clear the selectedCategories
        selectedCategories.value = [];
        }
    }
    const checkboxes = document.getElementsByName(name);
    for (let checkbox of checkboxes) {
        if (checkbox instanceof HTMLInputElement) {
        checkbox.checked = isChecked;
        }
    }
}
</script>

<template>
    <Head title="Sales Reports" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <h3 class="font-bold">Sales Reports</h3>
                <Link href="" class="btn btn-primary">
                    <PrimaryButton class="p-2">
                        Generate   
                    </PrimaryButton>
                </Link>
            </div>
            <div class="border-b border-gray-700 my-2 mb-5" />

            <!-- Bottom Table -->
            <table class="w-full text-sm text-left h-72">
                <tbody>
                    <tr>
                        <td class="align-top">
                            <h3>Branches</h3>
                            <div v-for="branch in branches" :key="branch.branchName" class="flex items-center mb-2">
                                <input
                                    :id="branch.branchName"
                                    class="size-4 rounded border-gray-300"
                                    type="checkbox"
                                    v-model="form.branches"
                                    :value="branch.branchName"
                                    name="branch"
                                />
                                <label :for="branch.branchName" class="px-2">{{ branch.branchName }}</label>
                            </div>
                        </td>

                        <!-- sale Type -->
                        <td class="align-top">
                            <h3>Sale Type</h3>
                            <div  class="flex items-center mb-2">
                                <input
                                    class="size-4 rounded border-gray-300"
                                    type="checkbox"
                                    v-model="selectedBranches"
                                />
                                <label class="px-2">Whole sale</label>
                            </div>
                        </td>

                        <!-- Clients Column -->
                        <td class="align-top" v-if="isLoakanChecked">
                            <h3 class="inline pr-4">Sale Type</h3>
                            <div v-for="type in saletypes" :key="type.id" class="flex items-center mb-2">
                                <input
                                    :id="type.saleTypeName"
                                    class="size-4 rounded border-gray-300"
                                    type="checkbox"
                                    v-model="selectedSaleTypes"
                                    :value="type.saleTypeName"
                                    name="saleType"
                                />
                                <label :for="type.saleTypeName" class="px-2">{{ type.saleTypeName }}</label>
                            </div>
                        </td>

                        <!-- Clients Column -->
                        <td class="align-top" v-if="isWholesaleChecked">
                            <h3 class="inline pr-4">Clients</h3>
                            <div v-for="client in filteredClients" :key="client.clientName" class="flex items-center mb-2">
                                <input
                                    :id="client.clientName"
                                    class="size-4 rounded border-gray-300"
                                    type="checkbox"
                                    name="client"
                                />
                                <label :for="client.clientName" class="px-2">{{ client.clientName }}</label>
                            </div>
                        </td>

                        <!-- Product Categories Column -->
                        <td class="align-top">
                            <h3 class="inline pr-4">Product Categories</h3><input
                                        class="size-4 rounded border-gray-300"
                                        name="selectProduct"
                                        type="checkbox"
                                        @click="toggle($event.target.checked, 'category')"
                                    /><label for="selectProduct" class="px-2">Select All</label>
                            <div v-for="category in productcategories" :key="category.id" class="flex items-center mb-2">
                                <input
                                    :id="category.categoryName"
                                    v-model="selectedCategories"
                                    :value="category.categoryID"
                                    class="size-4 rounded border-gray-300"
                                    type="checkbox"
                                    name="category"
                                />
                                <label :for="category.categoryName" class="px-2">{{ category.categoryName }}</label>
                            </div>
                        </td>
                        <!-- Products Column - Display filtered products -->
                        <td class="align-top w-[25%]">
                            <h3 class="inline pr-4">Products</h3><input
                                        class="size-4 rounded border-gray-300"
                                        name="selectProduct"
                                        type="checkbox"
                                        @click="toggle($event.target.checked, 'product')"
                                    /><label for="selectProduct" class="px-2">Select All</label>
                            <div class="max-h-60 overflow-auto">
                                <div v-for="product in filteredProducts" :key="product.id" class="flex items-center mb-2">
                                    <input
                                        :id="product.productName"
                                        class="size-4 rounded border-gray-300"
                                        type="checkbox"
                                        name="product"
                                    />
                                <label :for="product.productName" class="px-2">{{ product.productName }}</label>
                            </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div>
                <h3>Filter Date</h3>
                <div class="flex">
                    <div>
                        <h4>From:</h4>
                        <input class="w-[99%] border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full focus:border-blue-500 focus:ring-2 focus:ring-blue-500"
                        type="date" />
                    </div>
                    <div>
                        <h4>To:</h4>
                        <input class="w-[99%] border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full focus:border-blue-500 focus:ring-2 focus:ring-blue-500"
                        type="date" />
                    </div>
                </div>
            </div>

        </article>
    </AuthenticatedLayout>
</template>

<style>
.align-top {
    vertical-align: top;
}
</style>
