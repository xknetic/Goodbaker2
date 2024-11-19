<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import { ref } from 'vue';

const props = defineProps({
    areas: {
        type: Array,
        default: () => [],
    },

    productcategories: {
        type: Array,
        default: () => [],
    },

    rawmaterials: {
        type: Array,
        default: () => [],
    },

    premixes: {
        type: Array,
        default: () => [],
    },
});

const form = useForm({
    productCategory: '',
    productName: '',
    unit: '',
    quantity: '',
    price: '',
    criticalLevel: '',
    area: '',
    ingredients: [],
});

const newIngredient = ref({ quantity: '', rawMaterial: '', rawMaterialName: '', premix: '', premixName: '' });

const addIngredients = () => {
    if ((newIngredient.value.rawMaterial || newIngredient.value.premix) && newIngredient.value.quantity) {
        form.ingredients.push({ ...newIngredient.value });
        newIngredient.value.quantity = '';
        newIngredient.value.rawMaterial = '';
        newIngredient.value.rawMaterialName = '';
        newIngredient.value.premix = '';
        newIngredient.value.premixName = '';
        searchRawMaterials.value = '';
        searchPremixes.value = '';
        filterRawMaterials();
        filterPremixes();
    }
};

const removeIngredient = (index) => {
    form.ingredients.splice(index, 1);
};

const submit = () => {
    form.post(route('products.store'));
}

const searchRawMaterials = ref('');
const filteredRawMaterials = ref(props.rawmaterials);
var disabledRaw = false;
var disabledPremix = false;

function filterRawMaterials() {
    disable()
    filteredRawMaterials.value = props.rawmaterials.filter(rawMaterial =>
    rawMaterial.rawMaterialName.toString().toLowerCase().includes(searchRawMaterials.value.toLowerCase())
    );
}

function selectRawMaterial(rawMaterial) {
    searchRawMaterials.value = rawMaterial.rawMaterialName;
    newIngredient.value.rawMaterialName = rawMaterial.rawMaterialName;
    newIngredient.value.rawMaterial = rawMaterial.rawMaterialID
    filteredRawMaterials.value = [];
    disable()
}

const searchPremixes = ref('');
const filteredPremixes = ref(props.premixes);

function filterPremixes() {
    disable()
    filteredPremixes.value = props.premixes.filter(premix =>
    premix.premixName.toString().toLowerCase().includes(searchPremixes.value.toLowerCase())
    );
}

function selectPremix(premix) {
    searchPremixes.value = premix.premixName;
    newIngredient.value.premixName = premix.premixName;
    newIngredient.value.premix = premix.premixID
    filteredPremixes.value = [];
    disable()
}

function disable() {
    if (searchPremixes.value) {
        disabledRaw = true;
    } else {
        disabledRaw = false;
    }
    if (searchRawMaterials.value) {
        disabledPremix = true;
    } else {
        disabledPremix = false;
    }
    if(!searchRawMaterials.value) {
        newIngredient.value.rawMaterialName = '';
        newIngredient.value.rawMaterial = '';
    }
    if(!searchPremixes.value) {
        newIngredient.value.premixName = '';
        newIngredient.value.premix = '';
    }
}
</script>

<style>
    #selectpre, #selectraw {
        display: none;
        position: absolute;
        z-index: 1;
    }
    #typepre:focus~#selectpre, #typeraw:focus~#selectraw {
        display: inline;
        visibility: visible;
    }
    #selectpre:hover, #selectraw:hover {
        display: inline;
        visibility: visible;
    }
</style>

<template>
    <Head title="Product" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <h3 class="font-bold">Products</h3>
            </div>
            <div class="border-b border-gray-700 my-2 mb-5" />

            <!-- Bottom Table -->
            <!-- Form -->
            <form @submit.prevent="submit">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-5">
                        <div>
                            <Link :href="route('products.index')" class="btn btn-primary">
                                <PrimaryButton> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
                                    </svg>
                                </PrimaryButton>
                            </Link>
                        </div>
                        <div>
                            <h3> Create Product </h3>
                        </div>
                    </div>
                    <div class="space-x-5">
                        <!-- <Link href="/products" class="btn btn-primary">
                            <PrimaryButton class="p-2">
                                Cancel
                            </PrimaryButton>
                        </Link> -->

                        <PrimaryButton class="p-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Create
                        </PrimaryButton>
                    </div>
                </div>

                <div class="border-b border-gray-700 my-5" />

                <!-- Form Fields -->
                <div>
                    <InputLabel for="productName" class="mb-2">Product Name</InputLabel>
                    <TextInput class="mt-1 block w-[50%]" id="productName" type="text" v-model="form.productName" required />
                    <InputError :message="form.errors.productName" />
                </div>

                <div>
                    <InputLabel for="productCategory" class="mt-5">Category</InputLabel>
                    <select class="mt-1 w-[50%] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="productCategory" v-model="form.productCategory" required>
                        <option disabled value="">Select Category</option>
                        <option v-for="category in productcategories" :key="category.id" :value="category.categoryID">{{ category.categoryName }}</option>
                    </select>
                    <InputError :message="form.errors.productCategory"/>
                </div>

                <div>
                    <InputLabel for="price" class="mb-2"> Price </InputLabel>
                    <TextInput class="mt-1 block w-[50%]" id="price" type="text" v-model="form.price" required />
                    <InputError :message="form.errors.price" />
                </div>

                <div>
                    <InputLabel for="area" class="mt-5">Area</InputLabel>
                    <select class="mt-1 w-[50%] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="area" v-model="form.area" required>
                        <option disabled value="">Select Area</option>
                        <option v-for="area in areas" :key="area.id" :value="area.areaID">{{ area.areaName }}</option>
                    </select>
                    <InputError :message="form.errors.productCategory"/>
                </div>

                <div>
                    <InputLabel for="unit" class="mb-2">Unit</InputLabel>
                    <TextInput class="mt-1 block w-[50%]" id="unit" type="text" v-model="form.unit" required />
                    <InputError :message="form.errors.unit" />
                </div>

                <div>
                    <InputLabel for="quantity" class="mb-2">Quantity</InputLabel>
                    <TextInput class="mt-1 block w-[50%]" id="quantity" type="text" v-model="form.quantity" required />
                    <InputError :message="form.errors.quantity" />
                </div>

                <div>
                    <InputLabel for="criticalLevel" class="mb-2">Critical Level</InputLabel>
                    <TextInput class="mt-1 block w-[50%]" id="criticalLevel" type="text" v-model="form.criticalLevel" required />
                    <InputError :message="form.errors.criticalLevel" />
                </div>

                <!-- Bottom Table for Ingredients -->
                <div>
                    <h4>Ingredients</h4>

                    <div class="flex gap-5 mb-3">
                        <div class="relative">
                            <TextInput id="typepre"
                                type="text"
                                v-model="searchPremixes" 
                                @input="filterPremixes"
                                class="mt-1 block" 
                                placeholder="Search for premix"
                                :disabled = "disabledPremix"
                            />
                            <InputError :message="form.errors.supplierID" />

                            <ul id="selectpre" v-if="filteredPremixes.length > 0" class="w-[100%] bg-white max-h-60 overflow-auto" >
                                <li 
                                    v-for="premix in filteredPremixes" 
                                    :key="premix.id" 
                                    @click="selectPremix(premix)" 
                                    class="cursor-pointer hover:text-white hover:bg-[#0108EE] pl-5 rounded-lg mt-1"
                                >
                                    {{ premix.premixName }}
                                </li>
                            </ul>
                        </div>

                        <!-- <div class="relative">
                            <TextInput id="typeraw"
                                type="text"
                                v-model="searchRawMaterials" 
                                @input="filterRawMaterials"
                                class="mt-1 block" 
                                placeholder="Search for raw material" 
                                :disabled = "disabledRaw"
                            />
                            <InputError :message="form.errors.supplierID" />

                            <ul id="selectraw" v-if="filteredRawMaterials.length > 0" class="w-[100%] bg-white" >
                                <li 
                                    v-for="rawMaterial in filteredRawMaterials" 
                                    :key="rawMaterial.id" 
                                    @click="selectRawMaterial(rawMaterial)" 
                                    class="cursor-pointer hover:text-white hover:bg-[#0108EE] pl-5 rounded-lg mt-1"
                                >
                                    {{ rawMaterial.rawMaterialName }}
                                </li>
                            </ul>
                        </div> -->

                        <TextInput v-model="newIngredient.quantity" class="mt-1 block w-[20%]" type="text" placeholder="Quantity" />
                        <PrimaryButton @click.prevent="addIngredients" class="px-5">
                            Add
                        </PrimaryButton>
                    </div>

                    <table class="w-[50%] text-sm text-left">
                        <thead class="text-xs uppercase">
                            <tr>
                                <th scope="col" class="px-6 py-3">Premix</th>
                                <th scope="col" class="px-6 py-3">Quantity</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(ingredient, index) in form.ingredients" :key="index" class="border-gray-700">
                                <td class="px-6 py-4"> {{ ingredient.rawMaterialName }} {{ ingredient.premixName }}</td>
                                <td class="px-6 py-4">{{ ingredient.quantity }}</td>
                                <td class="px-6 py-4 flex items-center space-x-3">
                                    <button @click.prevent="removeIngredient(index)" class="text-red-700 hover:text-red-400">
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
            </form>
        </article>
    </AuthenticatedLayout>
</template>