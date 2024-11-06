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
    deliveries: {
        type: Array,
        default: () => [],
    },
    truckloaditems: {
        type: Array,
        default: () => [],
    },
});

const currentDateTime = () => {
    const current = new Date();
    return current.toISOString().replace('T', ' ').split('.')[0];
};

const deliveryType = ref('');

const form = useForm({
    salesDate: currentDateTime(),
    salesStatus: '',
    deliveryID: '',
    products: [],
    deliveryType: computed(() => deliveryType.value)
});

const newProduct = ref({quantity: '', truckLoadItems:'', itemID:''});

const addProduct = () => {
    if (newProduct.value.quantity && newProduct.value.truckLoadItems) {
        form.products.push({ ...newProduct.value });
        newProduct.value.itemID = '';
        newProduct.value.quantity = '';
        newProduct.value.truckLoadItems = '';
        searchItems.value = '';
        filterItems()
    }
};

const submit = () => {
    form.post(route('sales.store'));
}

const searchDeliveries = ref('');
const filteredDeliveries = ref(props.deliveries);


function filterDeliveries() {
    filteredDeliveries.value = props.deliveries.filter(delivery =>
    delivery.deliveryID.toString().toLowerCase().includes(searchDeliveries.value.toLowerCase())
    );
}

function selectDelivery(delivery) {
    searchDeliveries.value = delivery.deliveryID + '-' + delivery.trucks.plateNumber + '-' + delivery.saletypes.saleTypeName + '(' + delivery.salesDate + ')';
    form.deliveryID = delivery.deliveryID;
    deliveryType.value = delivery.saletypes.saleTypeName;
    filteredDeliveries.value = [];
    filterItems()
}

const searchItems = ref('');
const filteredItems = ref(props.truckloaditems);

function filterItems() {
    filteredItems.value = props.truckloaditems.filter(item =>
    item.products.productName.toString().toLowerCase().includes(searchItems.value.toLowerCase()) && item.deliveryID == form.deliveryID
    );
}

function selectItem(item) {
    searchItems.value = item.products.productName;
    newProduct.value.truckLoadItems = item.products.productName
    newProduct.value.itemID = item.truckLoadItemID;
    filteredItems.value = [];
}

function clearItems() {
    form.products = [];
}

</script>
<style>
    #selectdel, #selectite {
        visibility: hidden;
        position: absolute;
        z-index: 1;
    }

    #typedel:focus~#selectdel, #typeite:focus~#selectite{
        visibility: visible;
    }

    #selectdel:hover, #selectite:hover{
        visibility: visible;
    }
</style>
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
                            <h3> Create Sale </h3>
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
                        <InputLabel for="salesDate" class="mb-2">Sale Date</InputLabel>
                        <TextInput class="mt-1 block w-[50%]" id="salesDate" type="text" v-model="form.salesDate" disabled />
                    </div>

                    <div class="relative">
                        <InputLabel for="Delivery" class="mb-2">Delivery</InputLabel>
                        <TextInput id="typedel"
                            type="text"
                            v-model="searchDeliveries" 
                            @input="filterDeliveries"
                            @change="clearItems"
                            class="mt-1 block w-[50%]" 
                            placeholder="Search for delivery" 
                        />
                        <InputError :message="form.errors.supplierID" />

                        <ul id="selectdel" v-if="filteredDeliveries.length > 0" class="w-[50%] bg-white" >
                            <li 
                                v-for="delivery in filteredDeliveries" 
                                :key="delivery.deliveryID" 
                                @click="selectDelivery(delivery)" 
                                class="cursor-pointer hover:text-white hover:bg-[#0108EE] w-[50%] pl-5 rounded-lg mt-1"
                            >
                                {{ delivery.deliveryID }}-{{ delivery.trucks.plateNumber }}-{{ delivery.saletypes.saleTypeName }} ({{ delivery.salesDate }}) 
                            </li>
                        </ul>
                    </div>

                    <div class="mb-2">
                        <InputLabel for="salesStatus" class="mb-2">Sales Status</InputLabel>
                        <TextInput class="mt-1 block w-[50%]" id="salesStatus" v-model="form.salesStatus" />
                        <InputError :message="form.errors.salesStatus" />
                    </div>
                </div>

                <!-- Bottom Table for Ingredients -->
                <div v-if="deliveryType=='Extract'">
                    <h4>Items</h4>

                    <div class="flex gap-5 mb-3">
                        <!-- <TextInput v-model="newProduct.product" class="mt-1 block w-[20%]" type="text" placeholder="Product" /> -->
                        <div class="relative">
                            <TextInput id="typeite"
                                type="text"
                                v-model="searchItems" 
                                @input="filterItems" 
                                class="mt-1 block" 
                                placeholder="Search for truck item" 
                            />
                            <InputError :message="form.errors.supplierID" />

                            <ul id="selectite" v-if="filteredItems.length > 0" class="w-[150%] bg-white" >
                                <li 
                                    v-for="item in filteredItems" 
                                    :key="item.id" 
                                    @click="selectItem(item)" 
                                    class="cursor-pointer hover:text-white hover:bg-[#0108EE] w-[50%] pl-5 rounded-lg mt-1"
                                >
                                    {{ item.products.productName }}
                                </li>
                            </ul>
                        </div>
                        <TextInput v-model="newProduct.quantity" class="mt-1 block w-[20%]" type="text" placeholder="Quantity" />
                        <PrimaryButton @click.prevent="addProduct" class="px-5">
                            Add
                        </PrimaryButton>
                    </div>

                    <table class="w-[50%] text-sm text-left">
                        <thead class="text-xs uppercase">
                            <tr>
                                <th scope="col" class="px-6 py-3">Product</th>
                                <!-- <th scope="col" class="px-6 py-3">Raw Materials</th> -->
                                <th scope="col" class="px-6 py-3">Quantity</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(product, index) in form.products" :key="index">
                                <td class="px-6 py-4">{{ product.truckLoadItems }}</td>
                                <td class="px-6 py-4">{{ product.quantity }}</td>
                                <td class="px-6 py-4 flex items-center space-x-3">
                                    <button @click="removeIngredient(index)" class="text-red-700 hover:text-red-400">
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

                <div v-if="deliveryType=='Wholesale'">
                    <table class="w-[50%] text-sm text-left">
                        <thead class="text-xs uppercase">
                            <tr>
                                <th scope="col" class="px-6 py-3">Product</th>
                                <th scope="col" class="px-6 py-3">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in truckloaditems" :key="index">
                                <td class="px-6 py-4" v-show="item.delivery.deliveryID==form.deliveryID">{{ item.products.productName }}</td>
                                <td class="px-6 py-4" v-show="item.delivery.deliveryID==form.deliveryID">{{ item.quantity }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- <div class="flex mt-5 mr-5 justify-end">
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
                </div> -->
            </form>
        </article>
    </AuthenticatedLayout>
</template>