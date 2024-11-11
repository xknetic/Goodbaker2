<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from "@inertiajs/vue3";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { ref, computed } from 'vue';
import Modal from '@/Components/Modal.vue';
import TextInput from '@/Components/TextInput.vue';

const showModal = ref(false);

const props = defineProps({
    premixes: {
        type: Array,
        default: () => [],
    },
});

const form = useForm({
    premix: '',
    quantity: '',
    premixID: '',
});

function destroy(id) {
    if (confirm("Are you sure you want to delete this? This action cannot be undone.")) {
        form.delete(route('premixes.destroy', id));
    }
}

const searchPremixes = ref('');
const filteredPremixes = ref(props.premixes);

function filterPremixes() {
    filteredPremixes.value = props.premixes.filter(premix =>
        premix.premixName.toString().toLowerCase().includes(searchPremixes.value.toLowerCase())
    );
}

function selectPremix(premix) {
    searchPremixes.value = premix.premixName;
    form.premix = premix;
    filteredPremixes.value = [];
}

function replenish(premix) {
    form.premixID = premix.premixID;
    let isSufficient = true;
    premix.premixingredients.filter(ingredient => ingredient.premix === form.premix.premixID).forEach(ingredient => {
        const unit = ingredient.rawmaterial.rawmaterialunits;
        const stock = unit[0].stock;
        const factor = ingredient.rawmaterial.typeQuantity;
        const rawMaterialQuantity = stock * factor;
        let toUse = ingredient.unitQuantity * form.quantity
        if(ingredient.unit == 'g') {
            toUse /= 1000;
        }
        // alert(toUse)
        
        if (rawMaterialQuantity < toUse) {
            isSufficient = false;
        }
    })
    if (isSufficient) {
        form.post(route('premixes.replenish'));
        alert("Premix has been successfully replenished");
    } else {
        alert("Not enough raw materials to replenish premix");
    }
}

function formatNumber(value) {
    if (value === null || value === undefined) return '0.00'; // Handle null or undefined
    return value.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}
</script>
<style>
    #selectpre {
        visibility: hidden;
        position: absolute;
        z-index: 1;
    }

    #typepre:focus~#selectpre {
        visibility: visible;
    }

    #selectpre:hover {
        visibility: visible;
    }

</style>

<template>
    <Head title="Premixes" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <h3 class="font-bold">Premixes</h3>
                <div class="flex gap-5">
                    <PrimaryButton @click.prevent="showModal = true" class="p-2">
                        Replenish
                    </PrimaryButton>

                    <Link :href="route('premixes.create')" class="btn btn-primary">
                        <PrimaryButton class="p-2">
                            Create
                        </PrimaryButton>
                    </Link>
                </div>
            </div>
            <div class="border-b border-gray-700 my-2 mb-5" />

            <!-- Bottom Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs uppercase">
                        <tr>
                            <th scope="col" class="px-6 py-3">Premix</th>
                            <th scope="col" class="px-6 py-3">Size</th>
                            <th scope="col" class="px-6 py-3">Quantity</th>
                            <th scope="col" class="px-6 py-3">Cost</th>
                            <th scope="col" class="px-6 py-3">Amount</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="premix in premixes" :key="premix.id">
                            <td class="px-6 py-4">{{ premix.premixName }}</td>
                            <td class="px-6 py-4">{{ premix.size }}</td>
                            <td class="px-6 py-4">{{premix.quantity}}</td>
                            <td class="px-6 py-4">₱{{ premix.cost }}</td>
                            <td class="px-6 py-4">{{(premix.quantity * premix.cost).toFixed(2)}}</td>
                            <td class="px-6 py-4 flex items-center space-x-3">
                                <Link :href="route('premixes.edit', premix.premixID)" class="text-blue-500 hover:text-blue-700 transition duration-300 p-2 rounded-md flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>
                                </Link>
                                <button @click="destroy(premix.premixID)" class="text-red-400 hover:text-red-600">
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

            <Modal
                :show="showModal" 
                @close="showModal = false" 
                :closeable="true"
                >

                <div class="overflow-auto max-h-svh p-8">
                
                    <div class="size-full p-8 flex items-start">
                        <div class="relative">
                            <InputLabel for="premix" class="mb-2">Premix</InputLabel>
                            <TextInput id="typepre"
                                type="text" 
                                v-model="searchPremixes" 
                                @input="filterPremixes" 
                                class="mt-1 block w-[100%]" 
                                placeholder="Search for premix" 
                            />
                            <InputError :message="form.errors.supplierID" />

                            <ul id="selectpre" v-if="filteredPremixes.length > 0" class="w-[100%] bg-white max-h-40 overflow-y-auto" >
                                <li 
                                    v-for="premix in filteredPremixes" 
                                    :key="premix.premixID" 
                                    @click="selectPremix(premix)" 
                                    class="cursor-pointer hover:text-white hover:bg-[#0108EE] w-[100%] pl-5 rounded-lg mt-1"
                                >
                                    {{ premix.premixName }}
                                </li>
                            </ul>
                        </div>

                        <div class="flex items-center space-x-2">
                            <div class="w-[50%]">
                                <InputLabel for="quantity" class="mb-2">Quantity</InputLabel>
                                <TextInput class="mt-1 block w-[100%]" id="quantity" v-model="form.quantity" />
                                <InputError :message="form.errors.quantity" />
                            </div>
                            <PrimaryButton class="self-end" @click="replenish(form.premix)">
                                Add
                            </PrimaryButton>
                        </div>
                    </div>

                    <table class="w-full">
                        <tr>
                            <td>Ingredient</td>
                            <td>Quantity Used</td>
                            <td>Variance</td>
                        </tr>
                        <tr v-for="ingredient in form.premix.premixingredients">
                            <td>{{ ingredient.rawmaterial.rawMaterialName }}</td>
                            <td v-if="form.quantity > 0">{{ formatNumber((ingredient.unitQuantity + (ingredient.unitQuantity * ingredient.variance)) * form.quantity)}} {{ ingredient.unit }}</td>
                            <td v-if="form.quantity > 0">{{ formatNumber((ingredient.unitQuantity * form.quantity) * ingredient.variance) }} {{ ingredient.unit }}</td>
                        </tr>
                    </table>
                </div>


            </Modal>
        </article>
    </AuthenticatedLayout>
</template>