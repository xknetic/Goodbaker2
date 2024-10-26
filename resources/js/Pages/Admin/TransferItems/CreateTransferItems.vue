<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import { ref, computed } from 'vue';
import RawMaterial from '../RawMaterials/RawMaterial.vue';

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

const form = useForm({
    transferType: 'Product',
    product: '',
    premix: '',
    rawMaterial: ''
});

const submit = () => {
    form.post(route('transferitems.store'));
}

const searchBranches = ref('');
const filteredBranches = ref(props.branches);

function filterBranches() {
    filteredBranches.value = props.branches.filter(branch =>
        branch.branchName.toString().toLowerCase().includes(searchBranches.value.toLowerCase())
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

function selectItem(item) {
    if (form.transferType === 'Product') {
        searchItems.value = item.productName;
        form.product = item.productID;
        filteredItems.value = [];
    } else if (form.transferType === 'Premix') {
        searchItems.value = item.premixName;
        form.premix = item.premixID;
        filteredItems.value = [];
    } else {
        searchItems.value = item.rawMaterialName;
        form.rawMaterial = item.rawMaterialID;
        filteredItems.value = [];
    }
}
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
                            <Link :href="route('transferitems.index')" class="btn btn-primary">
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
                <div class="relative">
                    <InputLabel for="branch" class="mb-2">Branch</InputLabel>
                    <TextInput id="typebra"
                        type="text" 
                        v-model="searchBranches" 
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
                    <TextInput class="mt-1 block w-[50%]" id="quantity" />
                    <InputError :message="form.errors.quantity" />
                </div>

                
            </form>
        </article>
    </AuthenticatedLayout>
</template>