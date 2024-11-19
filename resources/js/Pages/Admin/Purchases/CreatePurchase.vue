<script setup>
import { ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';

const props = defineProps({
    suppliers: {
        type: Object,
        default: () => [],
    },
    rawmaterials: {
        type: Object,
        default: () => [],
    },
});

const currentDate = () => {
    const current = new Date();
    return current.toISOString().split('T')[0];
};

const form = useForm({
    purchaseDate: currentDate(),
    supplier: '',   
    purchases: [],
    status: 'Pending',
    selectedRaw: '',
});

const newPurchase = ref({rawMaterialID: '', purchase: '', unit: '', unitName:'', quantity: ''});

const submit = () => {
    form.post(route('purchases.store'));
}

const searchSuppliers = ref('');
const filteredSuppliers = ref(props.suppliers);

function filterSuppliers() {
    filteredSuppliers.value = props.suppliers.filter(supplier =>
        supplier.supplierName.toString().toLowerCase().includes(searchSuppliers.value.toLowerCase())
    );
}

function selectSupplier(supplier) {
    searchSuppliers.value = supplier.supplierName;
    form.supplier = supplier.supplierID;
    filteredSuppliers.value = [];
    filterRawMaterials()
    form.purchases = [];
}

function clearSupplier() {
    if(searchSuppliers.value == '') {
        form.supplier = '';
    }
}

const searchRawMaterials = ref('');
const filteredRawMaterials = ref(props.rawmaterials);
const newUnit = ref({unit: ''});
const selectUnit = ref('');

function filterRawMaterials() {
    if(form.supplier == '') {
        filteredRawMaterials.value = props.rawmaterials.filter(rawmaterial =>
            rawmaterial.rawMaterialName.toString().toLowerCase().includes(searchRawMaterials.value.toLowerCase())
        );
        
    }else {
        filteredRawMaterials.value = props.rawmaterials.filter(rawmaterial =>
            rawmaterial.rawMaterialName.toString().toLowerCase().includes(searchRawMaterials.value.toLowerCase()) && rawmaterial.supplierID == form.supplier
        );
    }
}

function selectRawMaterial(rawmaterial) {
    searchRawMaterials.value = rawmaterial.rawMaterialName;
    newPurchase.value.rawMaterialID= rawmaterial.rawMaterialID;
    newPurchase.value.purchase= rawmaterial.rawMaterialName;
    newUnit.value.unit= rawmaterial.rawmaterialunits;
    filteredRawMaterials.value = [];
    form.selectedRaw = rawmaterial;
    if(!form.supplier){
        form.supplier = rawmaterial.supplierID;
        searchSuppliers.value = rawmaterial.supplier.supplierName;
    }
}

const addPurchase = () => {
    if (newPurchase.value.quantity && newPurchase.value.purchase) {
        newPurchase.value.unit = form.selectedRaw.rawmaterialunits[0].rawMaterialUnitID;
        newPurchase.value.unitName = form.selectedRaw.rawmaterialunits[0].unit;
        form.purchases.push({ ...newPurchase.value });
        newPurchase.value = {rawMaterialID: '', purchase: '', unit: '', unitName:'', quantity: ''};
        searchRawMaterials.value = '';
        filteredRawMaterials.value = [];
        filterRawMaterials();
    }
};
</script>

<style>
    #selectsup, #selectraw {
        visibility: hidden;
        position: absolute;
        z-index: 1;
    }
    #typesup:focus~#selectsup, #typeraw:focus~#selectraw {
        visibility: visible;
    }
    #selectsup:hover, #selectraw:hover {
        visibility: visible;
    }
</style>

<template>
    <Head title="Purchases" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <h3 class="font-bold">Purchases</h3>
            </div>
            <div class="border-b border-gray-700 my-2 mb-5" />

            <!-- Bottom Table -->
            <!-- Form -->
            <form @submit.prevent="submit">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-5">
                        <div>
                            <Link :href="route('purchases.index')" class="btn btn-primary">
                                <PrimaryButton> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
                                    </svg>
                                </PrimaryButton>
                            </Link>
                        </div>
                        <div>
                            <h3> Create Purchase </h3>
                        </div>
                    </div>
                    <div class="space-x-5">
                        <!-- <Link href="/suppliers" class="btn btn-primary">
                            <PrimaryButton>
                                <span>
                                    Cancel
                                </span>
                            </PrimaryButton>
                        </Link> -->

                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            <span>
                                Create
                            </span>
                        </PrimaryButton>
                    </div>
                </div>

                <div class="border-b border-gray-700 my-5" />

                <!-- Form Fields -->

                <div>
                    <InputLabel for="purchaseDate" class="mb-2">Purchase Date</InputLabel>
                    <TextInput class="mt-1 block w-[50%]" id="purchaseDate" type="date" v-model="form.purchaseDate" />
                </div>

                <div class="relative">
                    <InputLabel for="supplier" class="mb-2">Supplier</InputLabel>
                    <TextInput id="typesup"
                        type="text" 
                        v-model="searchSuppliers"
                        @input="filterSuppliers" 
                        class="mt-1 block w-[50%]" 
                        placeholder="Search for supplier" 
                    />
                    <InputError :message="form.errors.supplierID" />

                    <ul id="selectsup" v-if="filteredSuppliers.length > 0" class="w-[50%] bg-white max-h-60 overflow-auto">
                        <li 
                            v-for="supplier in filteredSuppliers" 
                            :key="supplier.supplierID" 
                            @click="selectSupplier(supplier)" 
                            class="cursor-pointer hover:text-white hover:bg-[#0108EE] w-[50%] pl-5 rounded-lg mt-1"
                        >
                            {{ supplier.supplierName }}
                        </li>
                    </ul>
                </div>

                <div class="relative">
                    <InputLabel for="rawMaterial" class="mb-2">Raw Material</InputLabel>
                    <TextInput id="typeraw"
                        
                        type="text" 
                        v-model="searchRawMaterials"
                        @input="filterRawMaterials"
                        @click="clearSupplier" 
                        class="mt-1 block w-[50%]" 
                        placeholder="Search for raw material" 
                    />
                    <InputError :message="form.errors.supplierID" />

                    <ul id="selectraw" v-if="filteredRawMaterials.length > 0" class="w-[50%] bg-white max-h-60 overflow-auto" >
                        <li 
                            v-for="rawMaterial in filteredRawMaterials" 
                            :key="rawMaterial.rawMaterialID" 
                            @click="selectRawMaterial(rawMaterial)" 
                            class="cursor-pointer hover:text-white hover:bg-[#0108EE] w-[50%] pl-5 rounded-lg mt-1"
                        >
                            {{ rawMaterial.rawMaterialName }}
                        </li>
                    </ul>
                </div>

                <div>
                    <InputLabel for="unit" class="mt-5">Unit</InputLabel>
                    <select class="mt-1 w-[50%] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="unit" v-model="selectUnit" required>
                        <option disabled value="">Select Unit</option>
                        <option v-if="form.selectedRaw">{{ form.selectedRaw.type }} x{{ form.selectedRaw.typeQuantity }}  {{ form.selectedRaw.rawmaterialunits[0].unit }}</option>
                    </select>
                    <InputError :message="form.errors.productCategory"/>
                </div>

                <div class="mt-4">
                    <InputLabel for="quantity" class="mb-2">Quantity</InputLabel>
                    <TextInput class="mt-1 block w-[50%]" id="quantity" v-model="newPurchase.quantity" />
                    <InputError :message="form.errors.quantity" />
                </div>

                <PrimaryButton @click.prevent="addPurchase" class="mt-2">
                    Add Purchase Item
                </PrimaryButton>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs uppercase">
                            <tr>
                                <th scope="col" class="px-6 py-3">#</th>
                                <th scope="col" class="px-6 py-3">Purchase Item</th>
                                <th scope="col" class="px-6 py-3">Unit</th>
                                <th scope="col" class="px-6 py-3">Quantity</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>


                        <!-- Table -->
                        <tbody>
                            <tr v-for="(purchase, index) in form.purchases" :key="index">
                                <td class="px-6 py-4">{{ index + 1 }}</td>
                                <td class="px-6 py-4">{{ purchase.purchase }}</td>
                                <td class="px-6 py-4">{{ purchase.unitName }}</td>
                                <td class="px-6 py-4">{{ purchase.quantity }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- <div class="mt-4">
                    <InputLabel for="quantity" class="mb-2">Quantity</InputLabel>
                    <TextInput class="mt-1 block w-[50%]" id="quantity" v-model="newRawMaterial.quantity" />
                    <InputError :message="form.errors.quantity" />
                </div> -->
            </form>
        </article>
    </AuthenticatedLayout>
</template>