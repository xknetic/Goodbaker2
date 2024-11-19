<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import { ref, computed } from 'vue';

const props = defineProps({
    branches: {
        type: Array,
        default: () => [],
    },

    products: {
        type: Array,
        default: () => [],
    },

    premixes: {
        type: Array,
        default: () => [],
    },

    rawmaterials: {
        type: Array,
        default: () => [],
    },
})

const currentDate = () => {
    const current = new Date();
    return current.toISOString().split('T')[0];
};

const form = useForm({
    transferDate: currentDate(),
    branch: '',
    transferType: 'Product',
    items: [],
    status: 'Pending',
});

const submit = () => {
    form.post(route('transfers.store'));
}

const searchBranches = ref('');
const filteredBranches = ref(props.branches);

function filterBranches() {
    filteredBranches.value = props.branches.filter(branch =>
        branch.branchName.toString().toLowerCase().includes(searchBranches.value.toLowerCase()) && branch.branchName != 'Loakan'
    );
}

function selectBranch(branch) {
    searchBranches.value = branch.branchName;
    form.branch = branch.branchID;
    filteredBranches.value = [];
}

const searchItems = ref('');
var filteredItems = ref(props.products);
let select = ''
let searchHolder = 'product'

function changeSelect() {
    filteredItems.value = [];
    if (form.transferType == 'Product'){
        select = 'productName'
        searchHolder = 'product'
        filteredItems = ref(props.products);
        filteredItems.value = props.products.filter(product =>
        product.productName.toString().toLowerCase().includes(searchItems.value.toLowerCase()))
    } else if (form.transferType == 'Premix') {
        select = 'premixName'
        searchHolder = 'premix'
        filteredItems = ref(props.premixes);
        filteredItems.value = props.premixes.filter(premix =>
        premix.premixName.toString().toLowerCase().includes(searchItems.value.toLowerCase()))
    } else  {
        select = 'rawMaterialName'
        searchHolder = 'raw material'
        filteredItems = ref(props.rawmaterials);
        filteredItems.value = props.rawmaterials.filter(rawmaterial =>
        rawmaterial.rawMaterialName.toString().toLowerCase().includes(searchItems.value.toLowerCase()))
    }
}
  
function filterItems () {
    if (form.transferType == 'Product'){
        filteredItems.value = props.products.filter(product =>
        product.productName.toString().toLowerCase().includes(searchItems.value.toLowerCase()))
    } else if (form.transferType == 'Premix') {
        filteredItems.value = props.premixes.filter(premix =>
        premix.premixName.toString().toLowerCase().includes(searchItems.value.toLowerCase()))
    } else {
        filteredItems.value = props.rawmaterials.filter(rawmaterial =>
        rawmaterial.rawMaterialName.toString().toLowerCase().includes(searchItems.value.toLowerCase()))
    }
}

const newItem = ref({ quantity: '', item: '', itemName:'', itemType:'' });

function selectItem(item) {
    if (form.transferType === 'Product') {
        searchItems.value = item.productName;
        newItem.value.item = item.productID;
        newItem.value.itemName = item.productName;
        newItem.value.itemType = 'product';
        filteredItems.value = [];
    } else if (form.transferType === 'Premix') {
        searchItems.value = item.premixName;
        newItem.value.item = item.premixID;
        newItem.value.itemName = item.premixName;
        newItem.value.itemType = 'premix';
        filteredItems.value = [];
    } else {
        searchItems.value = item.rawMaterialName;
        newItem.value.item = item.rawMaterialID;
        newItem.value.itemName = item.rawMaterialName;
        newItem.value.itemType = 'rawMaterial';
        filteredItems.value = [];
    }
}

var itemQuantity = 0;

const addItem = () => {
    if (newItem.value.quantity && newItem.value.item) {
        if (form.transferType == 'Product') {
            props.products.find((product, index) => {
                if (product.productID === parseInt(newItem.value.item)) {
                    itemQuantity = props.products[index].quantity;
                    return true; // stop searching
                }
            });
        } else if (form.transferType == 'Premix') {
            props.premixes.find((premix, index) => {
                if (premix.premixID === parseInt(newItem.value.item)) {
                    itemQuantity = props.premixes[index].quantity;
                    return true; // stop searching
                }
            });
        } else {
            props.rawmaterials.find((rawMaterial, index) => {
                if (rawMaterial.rawMaterialID === parseInt(newItem.value.item)) {
                    itemQuantity = props.rawmaterials[index].rawmaterialunits[0].stock;
                    return true; // stop searching
                }
            });
        }
        if ((itemQuantity >= newItem.value.quantity) && (newItem.value.quantity >= 0)) {
            form.items.push({ ...newItem.value });
            newItem.value.quantity = '';
            newItem.value.item = '';
            newItem.value.name = '';
            newItem.value.itemType = '';
        }
    }
};
const removeItem = (index) => {
    form.items.splice(index, 1);
};

</script>
<style>
    #selectem, #selectbra{
        visibility: hidden;
        position: absolute;
        z-index: 1;
    }
    #typeem:focus~#selectem, #typebra:focus~#selectbra{
        visibility: visible;
    }
    #selectem:hover, #selectbra:hover{
        visibility: visible;
    }
</style>

<template>
    <Head title="TransferProducts" />   

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <h3 class="font-bold">Transfer Items</h3>
            </div>
            <div class="border-b border-gray-700 my-2 mb-5" />

            <!-- Bottom Table -->
            <!-- Form -->
            <form @submit.prevent="submit">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-5">
                        <div>
                            <Link :href="route('transfers.index')" class="btn btn-primary">
                                <PrimaryButton> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
                                    </svg>
                                </PrimaryButton>
                            </Link>
                        </div>
                        <div>
                            <h3> Transfer Items </h3>
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
                    <InputLabel for="transferDate" class="mb-2">Transfer Date</InputLabel>
                    <TextInput class="mt-1 block w-[50%]" id="transferDate" type="text" v-model="form.transferDate" />
                </div>

                <div class="relative">
                    <InputLabel for="branch" class="mb-2">Branch</InputLabel>
                    <TextInput id="typebra"
                        type="text" 
                        v-model="searchBranches"
                        @click="filterBranches"
                        @input="filterBranches"
                        class="mt-1 block w-[50%]" 
                        placeholder="Search for branch" 
                        
                    />
                    <InputError :message="form.errors.supplierID" />

                    <ul id="selectbra" v-if="filteredBranches.length > 0" class="w-[50%] bg-white" >
                        <li 
                            v-for="branch in filteredBranches" 
                            :key="branch.branchID" 
                            @click="selectBranch(branch)" 
                            class="cursor-pointer hover:text-white hover:bg-[#0108EE] w-[50%] pl-5 rounded-lg mt-1"
                            >
                            {{ branch.branchName }}
                        </li>
                    </ul>
                </div>
                    
                <div>
                    <InputLabel for="productCategory" class="mt-5">Transfer Item Type</InputLabel>
                    <select @click="changeSelect" class="mt-1 w-[50%] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="selectTransfer" required v-model="form.transferType">
                        <option disabled value="">Select Transfer</option>
                        <option value="Product">Product</option>
                        <option value="Premix">Premix</option>
                        <option value="Raw Material">Raw Material</option>
                    </select>
                    <InputError :message="form.errors.productCategory"/>
                </div>

                <div class="relative">
                    <InputLabel for="product" class="mb-2">{{ form.transferType }}</InputLabel>
                    <TextInput id="typeem"
                        type="text" 
                        v-model="searchItems" 
                        @input="filterItems"
                        @click="changeSelect"
                        class="mt-1 block w-[50%]" 
                        :placeholder="'Search for ' + searchHolder" 
                    />
                    <InputError :message="form.errors.supplierID" />

                    <ul id="selectem" v-if="filteredItems.length > 0" class="w-[50%] bg-white" >
                        <li 
                            v-for="item in filteredItems" 
                            :key="item.id" 
                            @click="selectItem(item)" 
                            class="cursor-pointer hover:text-white hover:bg-[#0108EE] w-[50%] pl-5 rounded-lg mt-1"
                        >
                        {{ item[select] }}
                        </li>
                    </ul>
                </div>

                <div class="mt-4">
                    <InputLabel for="quantity" class="mb-2">Quantity</InputLabel>
                    <TextInput v-model="newItem.quantity" class="mt-1 block w-[50%]" id="quantity" />
                    <InputError :message="form.errors.quantity" />
                </div>
                <PrimaryButton @click.prevent="addItem" class="mt-2">
                    Add Item
                </PrimaryButton>

            </form>
            <table class="w-[50%] text-sm text-left">
                <thead class="text-xs uppercase">
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3">Quantity</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in form.items" :key="index" class="border-gray-700">
                        <td class="px-6 py-4">{{ item.itemName }}</td>
                        <td class="px-6 py-4">{{ item.quantity }}</td>
                        <td class="px-6 py-4 flex items-center space-x-3">
                            <button @click="removeItem (index)" class="text-red-700 hover:text-red-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </article>
    </AuthenticatedLayout>
</template>