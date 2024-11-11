<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import { ref, computed } from 'vue';
import Modal from '@/Components/Modal.vue';

const showModal = ref(false);

const props = defineProps({
    deliveries: {
        type: Object,
        default: () => [],
    },
    truckloaditems: {
        type: Array,
        default: () => [],
    },
    products: {
        type: Object,
        default: () => [],
    },
});

const form = useForm({
    items: props.truckloaditems,
    products: [],
    itemDelete: [],
});

const submit = () => {
    form.put(route('deliveries.update', props.deliveries.deliveryID));
};

const newProduct = ref({ productID: '', product: '', quantity: '', price: '' });

const addProduct = () => {
    if (newProduct.value.quantity && newProduct.value.productID) {
        const existingProduct = props.products.find(p => p.productID === parseInt(newProduct.value.productID));
        if (existingProduct) {
            const availableQuantity = existingProduct.quantity;
            if (availableQuantity >= newProduct.value.quantity && newProduct.value.quantity > 0) {
                form.products.push({ ...newProduct.value });
                newProduct.value = { productID: '', product: '', quantity: '', price: '' };
                searchProducts.value = '';
                filteredProducts.value = [];
                filterProducts();
            } else {
                alert("Insufficient Products.");
            }
        }
    }
};

const searchProducts = ref('');
const filteredProducts = ref(props.products);

function filterProducts() {
    filteredProducts.value = props.products.filter(product =>
        product.productName.toString().toLowerCase().includes(searchProducts.value.toLowerCase())
    );
}

function selectProduct(products) {
    searchProducts.value = products.productName;
    newProduct.value.productID = products.productID;
    newProduct.value.product = products.productName;
    newProduct.value.price = products.productprices[0]?.price;
    filteredProducts.value = [];
}

var deleteIndex = -1;

function addDelete(item) {
    form.itemDelete.push(item.truckLoadItemID);
    deleteIndex = form.items.indexOf(item);
    if (deleteIndex > -1) {
        form.items.splice(deleteIndex, 1);
    }
}
const removeItem = (index) => {
    form.products.splice(index, 1);
};

const submitBadOrders = () => {
    const itemsToSubmit = form.items.map(item => ({
        truckLoadItemID: item.truckLoadItemID,
        badOrderQuantity: item.badOrderQuantity || 0,
        bOName: item.bOName || 0,
    }));

    console.log(itemsToSubmit);

    form.post(route('deliveries.loadIn', props.deliveries.deliveryID), {
        items: itemsToSubmit
    });
};

// New reactive variable to store bad orders data
const badOrders = ref(props.truckloaditems.map(item => ({
    truckLoadItemID: item.truckLoadItemID,
    badOrderQuantity: item.badOrderQuantity || '',
    bOName: item.bOName || ''
})));

const addAnotherBadOrder = (index) => {
    badOrders.value.push({
        truckLoadItemID: form.items[index].truckLoadItemID,
        badOrderQuantity: '',
        bOName: ''
    });
};
</script>

<style>
    #selectpro{
        visibility: hidden;
        position: absolute;
        z-index: 1;
    }

    #typepro:focus~#selectpro{
        visibility: visible;
    }

    #selectpro:hover{
        visibility: visible;
    }
</style>
<template>
    <Head title="Delivery" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <h3 class="font-bold">Delivery</h3>
            </div>
            <div class="border-b border-gray-700 my-2 mb-5" />

            <!-- Bottom Table -->
            <form @submit.prevent="submit">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-5">
                        <div>
                            <Link :href="route('deliveries.index')" class="btn btn-primary">
                                <PrimaryButton> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
                                    </svg>
                                </PrimaryButton>
                            </Link>
                            
                        </div>
                        <div v-if="deliveries">
                            <h3>Truck {{ deliveries.trucks.truckID }}</h3>
                            <p> {{ deliveries.trucks.plateNumber }} </p>
                        </div>
                    </div>
                    <div class="space-x-5">
                        <!-- <PrimaryButton @click.prevent="loadIn" class="p-2">
                            Load In
                        </PrimaryButton> -->

                        <PrimaryButton @click.prevent="showModal = true" class="p-2">
                            Load In
                        </PrimaryButton>

                        <PrimaryButton class="p-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Update
                        </PrimaryButton>
                    </div>
                </div>

                <div class="border-b border-gray-700 my-5" />

                <div class="overflow-x-auto">
                    <div class="relative">
                        <InputLabel for="product" class="mb-2">Product</InputLabel>
                        <TextInput id="typepro"
                            type="text" 
                            v-model="searchProducts" 
                            @input="filterProducts" 
                            class="mt-1 block w-[50%]" 
                            placeholder="Search for product" 
                        />
                        <InputError :message="form.errors.supplierID" />

                        <ul id="selectpro" v-if="filteredProducts.length > 0" class="w-[50%] max-h-0 bg-white" >
                            <li 
                                v-for="product in filteredProducts" 
                                :key="product.productID" 
                                @click="selectProduct(product)" 
                                class="cursor-pointer hover:text-white hover:bg-[#0108EE] w-[50%] pl-5 rounded-lg mt-1"
                            >
                                {{ product.productName }}
                            </li>
                        </ul>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="quantity" class="mb-2">Quantity</InputLabel>
                        <TextInput class="mt-1 block w-[50%]" id="quantity" v-model="newProduct.quantity" />
                        <InputError :message="form.errors.quantity" />
                    </div>

                    <PrimaryButton @click.prevent="addProduct" class="mt-2">
                        Add Product
                    </PrimaryButton>
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs uppercase">
                            <tr>
                                <th scope="col" class="px-6 py-3">Product Items</th>
                                <th scope="col" class="px-6 py-3">Quantity</th>
                                <th scope="col" class="px-6 py-3">Price</th>
                                <th scope="col" class="px-6 py-3">Amount</th>
                                <th scope="col" class="px-6 py-3">Actions</th>
                                <!-- <th scope="col" class="px-6 py-3">Actions</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in form.items">
                                <td class="px-6 py-4">{{ item.products.productName }}</td>
                                <td class="px-6 py-4">{{ item.quantity }}</td>
                                <td class="px-6 py-4">{{ item.products.productprices[0].price }}</td>
                                <td class="px-6 py-4">{{ item.products.productprices[0].price * item.quantity }}</td>
                                <td class="px-6 py-4">
                                    <button @click="addDelete(item)" class="text-red-700 hover:text-red-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                    </svg>
                                </button>
                                </td>
                            </tr>
                            <tr v-for="item, index in form.products">
                                <td class="px-6 py-4">{{ item.product }}</td>
                                <td class="px-6 py-4">{{ item.quantity }}</td>
                                <td class="px-6 py-4">{{ item.price }}</td>
                                <td class="px-6 py-4">{{ item.price * item.quantity }}</td>
                                <td class="px-6 py-4">
                                    <button @click="removeItem(index)" class="text-red-700 hover:text-red-400">
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
            </form>


            <Modal
                :show="showModal" 
                @close="showModal = false" 
                :closeable="true"
                >
                
                <div class="p-5">
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs uppercase">
                            <tr>
                                <th scope="col" class="px-6 py-3">Products</th>
                                <th scope="col" class="px-6 py-3">Good Orders</th>
                                <th scope="col" class="px-6 py-3">Bad Orders</th>
                                <th scope="col" class="px-6 py-3">Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in form.items">
                                <td class="px-6 py-4"> {{ item.products.productName }} </td>
                                <td class="px-6 py-4"> {{ item.quantity }} </td>
                                <td class="px-6 py-4">
                                    <!-- badorder quantity -->
                                    <div>
                                        <TextInput 
                                            class="mt-1 block w-[10vh]" 
                                            v-model="item.badOrderQuantity" 
                                            type="text" 
                                            min="0" 
                                        />
                                        <InputError :message="form.errors.badOrderQuantity" />
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <!-- BO Name -->
                                    <div>
                                        <TextInput 
                                            class="mt-1 block w-[20vh]"
                                            v-model="item.bOName" 
                                            type="text" 
                                            min="0" 
                                        />
                                        <InputError :message="form.errors.bOName" />
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <!-- BO Name -->
                                    <div>
                                        <PrimaryButton> Add Another </PrimaryButton>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="flex justify-end">
                        <PrimaryButton @click.prevent="submitBadOrders">Confirm</PrimaryButton>
                    </div>
                </div>
            </Modal>
        </article>
    </AuthenticatedLayout>
</template>