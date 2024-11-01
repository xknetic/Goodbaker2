<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import IncrementButton from '@/Components/IncrementButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { ref } from 'vue'

const props = defineProps({
    products: {
        type: Object,
        default: () => ({}),
    },

    productcategories: {
        type: Object,
        default: () => ({}),
    },
});

const order = ref(0)

function increment(product) {
    document.getElementById(product).value++;
}

function decrement(product) {
    if(document.getElementById(product).value != 0 ) {
        document.getElementById(product).value--
    }
}
</script>


<template>
    <Head title="Order Form" />

    <GuestLayout>
        <div class="flex flex-col h-screen p-4 bg-[#D9D9D9]">
            <!-- search bar -->
            <nav class="flex justify-center">
                <div class="mb-4">
                    <div class="relative flex items-center">
                        <div class="absolute pointer-events-none ml-4 text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                            </svg>
                        </div>

                        <form action="#" method="GET">
                            <input type="search" name="search" placeholder="Search" class="p-2 pl-10 w-96 text-gray-600 rounded-full border-gray-100">
                        </form>
                    </div>
                </div>
            </nav>

            <main class="flex h-full overflow-auto">
                <!-- Content -->
                <article class="flex-1 w-full p-5 overflow-auto bg-white mx-5 rounded-lg">
                    <!-- Top -->
                    <div class="flex justify-between items-center">
                        <h3>Products</h3>
                    </div>
                    <div class="border-b border-gray-700 my-2" />

                    <!-- Category -->
                    <h3>Categories</h3>
                    <div class="bg-[#BFBFBF] rounded-lg">
                        <div class="p-5">
                            <div class="flex h-10 overflow-auto space-x-5">
                                <PrimaryButton>
                                    <h4>All</h4>
                                </PrimaryButton>
                                <PrimaryButton v-for="category in productcategories" :key="category.id">
                                    <h4>{{ category.categoryName }}</h4>
                                </PrimaryButton>
                            </div>
                        </div>
                    </div>

                    <!-- <div v-for="category in productcategory" :key="category.id">
                    <h3>{{ category.categoryName }}</h3>
                    <div class="flex overflow-x-scroll">
                        <div v-for="product in products" :key="product.id" class="bg-[#BFBFBF] rounded-lg">
                            <div v-if="product.productCategory === category.categoryID" class="p-3">
                                <h4>{{ product.productName }}</h4>
                                <h4>P {{ product.products[0]?.price }}</h4>
                                <div class="flex space-x-4 items-center">
                                    <IncrementButton @click="decrement(product.productName)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8"/>
                                        </svg>
                                    </IncrementButton>

                                    <h4 id="quantity">0</h4>

                                    <IncrementButton @click="increment(product.productName)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                                        </svg>
                                    </IncrementButton>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div> -->

                    <div v-for="category in productcategories" :key="category.id">
                        <h3>{{ category.categoryName }}</h3>
                        <div class="flex overflow-x-scroll">
                            <div v-for="product in products" :key="product.id">
                                <div v-if="product.productCategory === category.categoryID">
                                    <div class="mr-5 bg-[#BFBFBF] rounded-lg p-3">
                                        <div>
                                            <h4>{{ product.productName }}</h4>
                                            <h4>P {{ product.productprices[0]?.price }}</h4>
                                            <div class="flex space-x-4 items-center">
                                                <IncrementButton @click="decrement(product.productID)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8"/>
                                                    </svg>
                                                </IncrementButton>
                                                
                                                <TextInput :id="product.productID" class="w-10 text-center h-8 px-1 bg-[#bfbfbf] border-0" type="text" />

                                                <IncrementButton @click="increment(product.productID)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                                                    </svg>
                                                </IncrementButton>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- SideBar -->
                <aside class="w-[30%] h-screen flex flex-col">
                    <!-- Top -->
                    <div class="flex justify-between items-center">
                        <h3>Products</h3>
                    </div>
                    <div class="border-b border-gray-700 my-2"></div>

                    <div class="flex justify-end">
                        Date
                    </div>

                    <div class="flex flex-col grow justify-between">
                        <div>
                            asd
                        </div>
                        <div>
                            asda
                        </div>
                        <div>
                            asdaas
                        </div>
                    </div>
                </aside>
            </main>
        </div>
    </GuestLayout>
</template>
