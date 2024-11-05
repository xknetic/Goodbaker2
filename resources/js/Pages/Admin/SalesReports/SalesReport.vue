<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
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

// Store selected categories
const selectedCategories = ref([]);
const selectedBranches = ref([]);

// Computed property to filter products based on selected categories
const filteredProducts = computed(() => {
    return props.products.filter(product =>
        selectedCategories.value.includes(product.productCategory)
    );
});

// Computed property to determine if "Loakan" branch is checked
const isLoakanChecked = computed(() => {
    return selectedBranches.value.includes('Loakan');
});

// Computed property to filter clients based on the selected branches
const filteredClients = computed(() => {
    return isLoakanChecked.value ? props.clients : [];
});
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
            <table class="w-full text-sm text-left">
                <tbody>
                    <tr>
                        <td class="align-top">
                            <h3>Branches</h3>
                            <div v-for="branch in branches" :key="branch.branchName" class="flex items-center mb-2">
                                <input
                                    :id="branch.branchName"
                                    class="size-4 rounded border-gray-300"
                                    type="checkbox"
                                    v-model="selectedBranches"
                                    :value="branch.branchName"
                                />
                                <label :for="branch.branchName" class="px-2">{{ branch.branchName }}</label>
                            </div>
                        </td>

                        <!-- Clients Column -->
                        <td class="align-top" v-if="isLoakanChecked">
                            <h3>Clients</h3>
                            <div v-for="client in filteredClients" :key="client.clientName" class="flex items-center mb-2">
                                <input
                                    :id="client.clientName"
                                    class="size-4 rounded border-gray-300"
                                    type="checkbox"
                                />
                                <label :for="client.clientName" class="px-2">{{ client.clientName }}</label>
                            </div>
                        </td>

                        <!-- Product Categories Column -->
                        <td class="align-top">
                            <h3>Product Categories</h3>
                            <div v-for="category in productcategories" :key="category.id" class="flex items-center mb-2">
                                <input
                                    :id="category.categoryName"
                                    v-model="selectedCategories"
                                    :value="category.categoryID"
                                    class="size-4 rounded border-gray-300"
                                    type="checkbox"
                                />
                                <label :for="category.categoryName" class="px-2">{{ category.categoryName }}</label>
                            </div>
                        </td>

                        <!-- Products Column - Display filtered products -->
                        <td class="align-top w-[25%]">
                            <h3>Products</h3>
                            <div v-for="product in filteredProducts" :key="product.id" class="flex items-center mb-2">
                                <input
                                    :id="product.productName"
                                    class="size-4 rounded border-gray-300"
                                    type="checkbox"
                                />
                                <label :for="product.productName" class="px-2">{{ product.productName }}</label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </article>
    </AuthenticatedLayout>
</template>

<style>
.align-top {
    vertical-align: top;
}
</style>
