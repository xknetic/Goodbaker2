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
    truckloaditems: {
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

const newProduct = ref({quantity: '', truckLoadItems:''});
let truckLoadQuantity = 0;

const addProduct = () => {
    if (newProduct.value.quantity && newProduct.value.truckLoadItems) {
        const selectedItem = props.truckloaditems.find(item => 
            item.truckLoadItemID === parseInt(newProduct.value.truckLoadItems)
        );

        if (selectedItem && (selectedItem.quantity >= newProduct.value.quantity) && (newProduct.value.quantity > 0)) {
            form.products.push({ ...newProduct.value });
            newProduct.value.quantity = '';
            newProduct.value.truckLoadItems = '';
        } else {
            alert('Not enough quantity');
        }
    }
};

const removeProduct = (index) => {
    form.products.splice(index, 1);
};

const searchDeliveryType = ref('');
const filteredDeliveryTypes = ref(props.saletypes);

function filterDeliveryType() {
    filteredDeliveryTypes.value = props.saletypes.filter(type =>
        type.saleTypeName.toLowerCase().includes(searchDeliveryType.value.toLowerCase())
    );
}

function selectDeliveryType(type) {
    searchDeliveryType.value = type.saleTypeName;
    form.saleType = type.saleTypeId;
    filteredDeliveryTypes.value = [];
}

const searchTruck = ref('');
const filteredTrucks = ref(props.trucks);

function filterTrucks() {
    filteredTrucks.value = props.trucks.filter(truck =>
        truck.plateNumber.toLowerCase().includes(searchTruck.value.toLowerCase())
    );
}

function selectTruck(truck) {
    searchTruck.value = truck.plateNumber;
    form.truck = truck.truckID;
    filteredTrucks.value = [];
}

const submit = () => {
    form.post(route('sales.store'));
}
</script>

<style>
    #selectdri, #selectcli, #selectpro {
        visibility: hidden;
        position: absolute;
        z-index: 1;
    }
    #typedri:focus~#selectdri, #typecli:focus~#selectcli, #typepro:focus~#selectpro{
        visibility: visible;
    }
    #selectdri:hover, #selectcli:hover, #selectpro:hover{
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
                            <h3> Create Sales </h3>
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

                    <div class="relative">
                        <InputLabel for="deliveryType" class="mb-2">Delivery Type</InputLabel>
                        <TextInput id="typedri"
                            type="text" 
                            v-model="searchDeliveryType" 
                            @input="filterDeliveryType" 
                            class="mt-1 block w-[50%]" 
                            placeholder="Search for delivery type" 
                        />
                        <InputError :message="form.errors.saleType" />

                        <ul id="selectdri" v-if="filteredDeliveryTypes.length > 0" class="w-[50%] bg-white">
                            <li 
                                v-for="type in filteredDeliveryTypes" 
                                :key="type.saleTypeId" 
                                @click="selectDeliveryType(type)" 
                                class="cursor-pointer hover:text-white hover:bg-[#0108EE] w-[50%] pl-5 rounded-lg mt-1"
                            >
                                {{ type.saleTypeName }}
                            </li>
                        </ul>
                    </div>

                    <div class="mb-2">
                        <InputLabel for="deliveryID" class="mb-2">Delivery</InputLabel>
                        <TextInput class="mt-1 block w-[50%]" id="deliveryID" v-model="form.deliveryID" />
                        <InputError :message="form.errors.deliveryID" />
                    </div>
                    
                    <div class="relative">
                        <InputLabel for="truck" class="mb-2">Truck</InputLabel>
                        <TextInput id="typedri"
                            type="text" 
                            v-model="searchTruck" 
                            @input="filterTrucks" 
                            class="mt-1 block w-[50%]" 
                            placeholder="Search for truck" 
                        />
                        <InputError :message="form.errors.truck" />

                        <ul id="selectdri" v-if="filteredTrucks.length > 0" class="w-[50%] bg-white">
                            <li 
                                v-for="truck in filteredTrucks" 
                                :key="truck.truckID" 
                                @click="selectTruck(truck)" 
                                class="cursor-pointer hover:text-white hover:bg-[#0108EE] w-[50%] pl-5 rounded-lg mt-1"
                            >
                                Truck {{ truck.truckID }} ({{ truck.plateNumber }})
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
                <div>
                    <h4>Ingredients</h4>

                    <div class="flex gap-5 mb-3">
                        <TextInput v-model="newProduct.truckLoadItems" class="mt-1 block w-[20%]" type="text" placeholder="Truck Load Items" />
                        <TextInput v-model="newProduct.quantity" class="mt-1 block w-[20%]" type="text" placeholder="Quantity" />
                        <PrimaryButton @click.prevent="addProduct" class="px-5">
                            Add
                        </PrimaryButton>
                    </div>

                    <table class="w-[50%] text-sm text-left">
                        <thead class="text-xs uppercase">
                            <tr>
                                <th scope="col" class="px-6 py-3">#</th>
                                <th scope="col" class="px-6 py-3">Product Name</th>
                                <th scope="col" class="px-6 py-3">Quantity</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(product, index) in form.products" :key="index">
                                <td class="px-6 py-4">{{ index + 1 }}</td>
                                <td class="px-6 py-4">{{ product.truckLoadItems }}</td>
                                <td class="px-6 py-4">{{ product.quantity }}</td>
                                <td class="px-6 py-4 flex items-center space-x-3">
                                    <button @click.prevent="removeProduct(index)" class="text-red-700 hover:text-red-400">
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