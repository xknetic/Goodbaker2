<script setup>
import { ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';

const form = useForm({
    file: null,
});

const handleFileChange = (event) => {
    form.file = event.target.files[0];
}

const submit = () => {
    // Importing Sales
    const formData = new FormData();
    formData.append('file', form.file);
    form.post(route('salestransactiondiscountcharges.import'), {
        data: formData,
        onFinish: () => {
            form.file = null;
        }
    });

    // Importing Guest Counts
    formData.append('file', form.file);
    form.post(route('guestcounts.import'), {
        data: formData,
        onFinish: () => {
            form.file = null;
        }
    });

    // Importing Sales Transaction Counts
    formData.append('file', form.file);
    form.post(route('salestransactioncounts.import'), {
        data: formData,
        onFinish: () => {
            form.file = null;
        }
    });

    // Importing Daily Sales Transactions
    formData.append('file', form.file);
    form.post(route('dailysalestransactions.import'), {
        data: formData,
        onFinish: () => {
            form.file = null;
        }
    });

    // Importing Sales Transactions
    formData.append('file', form.file);
    form.post(route('salestransactions.import'), {
        data: formData,
        onFinish: () => {
            form.file = null;
        }
    });

    // Importing Sales Transaction Journals
    formData.append('file', form.file);
    form.post(route('salestransactionjournals.import'), {
        data: formData,
        onFinish: () => {
            form.file = null;
        }
    });
}
</script>

<template>
    <Head title="Branch" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <h3 class="font-bold">Branch</h3>
            </div>
            <div class="border-b border-gray-700 my-2 mb-5" />

            <!-- Bottom Table -->
            <!-- Form -->
            <form @submit.prevent="submit">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-5">
                        <div>
                            <Link :href="route('branches.index')" class="btn btn-primary">
                                <PrimaryButton> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
                                    </svg>
                                </PrimaryButton>
                            </Link>
                        </div>
                        <div>
                            <h3> Import CSV </h3>
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
                                Import
                            </span>
                        </PrimaryButton>
                    </div>
                </div>

                <div class="border-b border-gray-700 my-5" />

                <!-- Form Fields -->
                <div class="mb-2">
                    <InputLabel for="file" class="mb-2">Sales Transaction Discount Charges CSV</InputLabel>
                    <input type="file" id="file" @change="handleFileChange" accept=".csv"
                        class="flex h-10 w-[30%] rounded-md border border-input bg-white px-3 py-2 text-sm text-gray-400 file:border-0 file:bg-transparent file:text-gray-600 file:text-sm file:font-medium" />
                    <InputError :message="form.errors.file" />
                </div>

                <div class="mb-2">
                    <InputLabel for="file" class="mb-2">Guest Counts CSV</InputLabel>
                    <input type="file" id="file" @change="handleFileChange" accept=".csv" 
                        class="flex h-10 w-[30%] rounded-md border border-input bg-white px-3 py-2 text-sm text-gray-400 file:border-0 file:bg-transparent file:text-gray-600 file:text-sm file:font-medium" />
                    <InputError :message="form.errors.file" />
                </div>

                <div class="mb-2">
                    <InputLabel for="file" class="mb-2"> Sales Transaction Counts CSV</InputLabel>
                    <input type="file" id="file" @change="handleFileChange" accept=".csv"
                        class="flex h-10 w-[30%] rounded-md border border-input bg-white px-3 py-2 text-sm text-gray-400 file:border-0 file:bg-transparent file:text-gray-600 file:text-sm file:font-medium" />
                    <InputError :message="form.errors.file" />
                </div>

                <div class="mb-2">
                    <InputLabel for="file" class="mb-2"> Daily Sales Transaction CSV</InputLabel>
                    <input type="file" id="file" @change="handleFileChange" accept=".csv"
                        class="flex h-10 w-[30%] rounded-md border border-input bg-white px-3 py-2 text-sm text-gray-400 file:border-0 file:bg-transparent file:text-gray-600 file:text-sm file:font-medium" />
                    <InputError :message="form.errors.file" />
                </div>

                <div class="mb-2">
                    <InputLabel for="file" class="mb-2"> Sales Transaction CSV</InputLabel>
                    <input type="file" id="file" @change="handleFileChange" accept=".csv"
                        class="flex h-10 w-[30%] rounded-md border border-input bg-white px-3 py-2 text-sm text-gray-400 file:border-0 file:bg-transparent file:text-gray-600 file:text-sm file:font-medium" />
                    <InputError :message="form.errors.file" />
                </div>

                <div class="mb-2">
                    <InputLabel for="file" class="mb-2"> Sales Transaction Journal CSV</InputLabel>
                    <input type="file" id="file" @change="handleFileChange" accept=".csv"
                        class="flex h-10 w-[30%] rounded-md border border-input bg-white px-3 py-2 text-sm text-gray-400 file:border-0 file:bg-transparent file:text-gray-600 file:text-sm file:font-medium" />
                    <InputError :message="form.errors.file" />
                </div>
            </form>
        </article>
    </AuthenticatedLayout>
</template>