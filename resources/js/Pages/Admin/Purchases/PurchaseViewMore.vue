<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link,useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import NumberInput from '@/Components/NumberInput.vue';
import { ref, computed, reactive } from 'vue';

const props = defineProps({
    purchases: {
        type: Object,
        default: () => [],
    },
    purchaseitems: {
        type: Object,
        default: () => [],
    },
});

const form = useForm({
    status: props.purchases.status,
    remarks: props.purchases.remarks,
    received: reactive({}),
});

props.purchaseitems.forEach((purchase) => {
    if (!form.received[purchase.purchaseItemID]) {
        form.received[purchase.purchaseItemID] = { quantityReceived: purchase.quantityReceived || 0 };
    }
});

function notReceived() {
    if (form.status == 'Completed') {
        props.purchaseitems.forEach((purchase) => {
            form.received[purchase.purchaseItemID].quantityReceived = purchase.quantity || 0;
        });
        return false;
    } else if (form.status == 'Incomplete') {
        return false; 
    } else {
        Object.keys(form.received).forEach((key) => {
            form.received[key].quantityReceived = 0;
        });
        return true;
    }
}

function notCompleted(){
    if (props.purchases.status == 'Completed') {
        return true;
    } else {
        return false;
    }
}

function confirm() {
    form.put(route('purchases.update', props.purchases.purchaseID)); 
}
</script>

<template>
    <Head title="Purchase" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <h3 class="font-bold">Purchase Items</h3>
            </div>
            <div class="border-b border-gray-700 my-2 mb-5" />

            <!-- Bottom Table -->
            <div>
                <div class="flex justify-between">
                    <div class="flex items-center space-x-2">
                        <Link :href="route('purchases.index')" class="btn btn-primary">
                            <PrimaryButton> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
                                </svg>
                            </PrimaryButton>
                        </Link>
                        <div>
                            <h3>{{ purchases.suppliers.supplierName }}</h3>
                        </div>
                    </div>
                    <div class="space-x-5" v-show="notCompleted()==false">
                        <PrimaryButton class="p-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" @click.prevent="confirm()">
                            Confirm
                        </PrimaryButton>
                    </div>
                </div>

                <div class="border-b border-gray-700 my-5" />

                <div>
                    <InputLabel for="status" class="mb-2">Status</InputLabel>
                    <select class="mt-1 w-[50%] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="status" v-model="form.status" required :disabled="notCompleted()">
                        <option disabled value="">Select Status</option>
                        <option value="Completed">Completed</option>
                        <option value="Cancelled">Cancelled</option>
                        <option value="Incomplete">Incomplete</option>
                        <option value="Pending">Pending</option>
                    </select>
                </div>

                <div class="mt-4">
                    <InputLabel for="remarks" class="mb-2">Remarks</InputLabel>
                    <TextInput class="mt-1 block w-[50%]" id="remarks" v-model="form.remarks" :disabled="notCompleted()" />
                    <InputError :message="form.errors.remarks" />
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs uppercase">
                            <tr>
                                <th scope="col" class="px-6 py-3">Purchase Item</th>
                                <th scope="col" class="px-6 py-3">Unit</th>
                                <th scope="col" class="px-6 py-3">Quantity Ordered</th>
                                <th scope="col" class="px-6 py-3">Quantity Received</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr v-for="purchase in purchaseitems" class="border-t border-gray-700">
                                    <td class="px-6 py-4">{{ purchase.rawmaterials.rawMaterialName  }}</td>
                                    <td class="px-6 py-4">{{ purchase.rawmaterials.type }} x{{ purchase.rawmaterials.typeQuantity }} {{ purchase.rawmaterialunits.unit }}</td>
                                    <td class="px-6 py-4">{{ purchase.quantity }}</td>
                                    <td class="px-6 py-4">
                                        <input :min="purchase.quantityReceived" :max="purchase.quantity" v-model="form.received[purchase.purchaseItemID].quantityReceived" :disabled="notReceived() || notCompleted()" type="number" class="mt-1 block w-[25%] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" :id="purchase.purchaseID" />
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </article>
    </AuthenticatedLayout>
</template>