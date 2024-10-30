<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import { ref, computed } from 'vue';

const props = defineProps({
    trucks: {
        type: Array,
        default: () => [],
    },
});

const form = useForm({
    plateNumber: '',

});

const duplicatePlateError = ref('');

const isDuplicate = computed(() => {
    return props.trucks.some(truck => truck.plateNumber === form.plateNumber);
});

const submit = () => {
    if (isDuplicate.value) {
        duplicatePlateError.value = "Plate number already exists.";
        return;
    }
    form.post(route('trucks.store'));
};

function destroy(id) {
    if (confirm("Are you sure you want to delete this? This action cannot be undone.")) {
        form.delete(route('trucks.destroy', id));
    }
}

</script>

<template>
    <Head title="Truck" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <h3 class="font-bold">Truck</h3>
            </div>
            <div class="border-b border-gray-700 my-2 mb-5" />

            <!-- Bottom Table -->
            <!-- Form -->
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
                        <div>
                            <h3> Add Trucks </h3>
                        </div>
                    </div>
                </div>

                <div class="border-b border-gray-700 my-5" />

                <!-- Form Fields -->
                <InputLabel for="plateNumber" class="mb-2"> Plate Number </InputLabel>
                <div class="flex gap-4">
                    <TextInput class="mt-1 block w-[50%]" id="plateNumber" type="text" v-model="form.plateNumber"
                    pattern="^[A-Za-z]{3}[0-9]{4}$"
                    maxlength="7"
                    oninput="this.value = this.value.toUpperCase().replace(/[^A-Za-z0-9]/g, '').replace(/^([A-Za-z]{3})([0-9]{0,4}).*$/, '$1$2');"required />
                    <PrimaryButton 
                        class="p-2" 
                        :class="{ 'opacity-25': form.processing || isDuplicate }" 
                        :disabled="form.processing || isDuplicate"
                    >
                        Create
                    </PrimaryButton>
                </div>
                <InputError :message="form.errors.plateNumber || duplicatePlateError" class="absolute"/>
            </form>
            <div class="overflow-x-auto py-4">
                <table class="w-full text-sm text-left w-[45%]">
                    <thead class="text-xs uppercase">
                        <tr>
                            <th scope="col" class="px-6 py-3">Truck</th>
                            <th scope="col" class="px-6 py-3">Plate Number</th>
                            <th scope="col" class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="truck in trucks" :key="truck.id" class="border-gray-700">
                            <td class="px-6 py-4"> {{ truck.truckID }} </td>
                            <td class="px-6 py-4"> {{ truck.plateNumber }} </td>
                            <td class="px-6 py-4">
                                <button @click.prevent="destroy(truck.truckID)" class="text-red-700 hover:text-red-400">
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
        </article>
    </AuthenticatedLayout>
</template>