<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';

const props = defineProps({
    premix: Object,
});

const form = useForm({
    premixName: props.premix.premixName,
    category: props.premix.category,
    size: props.premix.size,
    cost: props.premix.cost,
});

const submit = () => {
    form.put(route('premixes.update', props.premix.premixID));
}
</script>

<template>
    <Head title="Edit Premix" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <h3 class="font-bold">Premix</h3>
            </div>
            <div class="border-b border-gray-700 my-2 mb-5" />

            <!-- Bottom Table -->
            <!-- Form -->
            <form @submit.prevent="submit">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-5">
                        <div>
                            <Link :href="route('premixes.index')" class="btn btn-primary">
                                <PrimaryButton> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
                                    </svg>
                                </PrimaryButton>
                            </Link>
                        </div>
                        <div>
                            <h3> Edit Premix </h3>
                        </div>
                    </div>
                    <div class="space-x-5">
                        <PrimaryButton class="p-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Update
                        </PrimaryButton>
                    </div>
                </div>

                <div class="border-b border-gray-700 my-5" />

                <!-- Form Fields -->
                <div>
                    <InputLabel for="premixName" class="mb-2">Premix Name</InputLabel>
                    <TextInput class="mt-1 block w-[50%]" id="premixName" type="text" v-model="form.premixName" required />
                    <InputError :message="form.errors.premixName" />
                </div>

                <div>
                    <InputLabel for="category" class="mb-2"> Category </InputLabel>
                    <TextInput class="mt-1 block w-[50%]" id="category" type="text" v-model="form.category" required />
                    <InputError :message="form.errors.category" />
                </div>

                <div>
                    <InputLabel for="size" class="mb-2"> Size </InputLabel>
                    <TextInput class="mt-1 block w-[50%]" id="size" type="text" v-model="form.size" required />
                    <InputError :message="form.errors.size" />
                </div>

                <div>
                    <InputLabel for="cost" class="mb-2"> Cost </InputLabel>
                    <TextInput class="mt-1 block w-[50%]" id="cost" type="text" v-model="form.cost" required />
                    <InputError :message="form.errors.cost" />
                </div>
            </form>
        </article>
    </AuthenticatedLayout>
</template>
