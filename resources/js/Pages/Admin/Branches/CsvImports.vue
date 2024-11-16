<script setup>
import { ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';

const form = useForm({
    file: null,
    selectedRoute: '', // Track which import route to use
});

// Handle file input change and assign the route based on selection
const handleFileChange = (event, route) => {
    form.file = event.target.files[0];
    form.selectedRoute = route;
};

const submit = () => {
    if (form.file && form.selectedRoute) {
        const formData = new FormData();
        formData.append('file', form.file);
        form.post(route(form.selectedRoute), {
            data: formData,
            onFinish: () => {
                form.file = null;
                form.selectedRoute = '';
            }
        });
    }
};
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

            <!-- Form -->
            <form @submit.prevent="submit">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-5">
                        <Link :href="route('branches.index')" class="btn btn-primary">
                            <PrimaryButton>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
                                </svg>
                            </PrimaryButton>
                        </Link>
                        <h3>Import CSV</h3>
                    </div>
                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Import
                    </PrimaryButton>
                </div>

                <div class="border-b border-gray-700 my-5" />

                <div class="mb-2">
                    <InputLabel for="discountChargesFile" class="mb-2">Sales Transaction Discount Charges CSV</InputLabel>
                    <input type="file" id="discountChargesFile" @change="event => handleFileChange(event, 'salestransactiondiscountcharges.import')" accept=".csv" class="file-input" />
                    <InputError :message="form.errors.file" />
                </div>

                <div class="mb-2">
                    <InputLabel for="guestCountsFile" class="mb-2">Guest Counts CSV</InputLabel>
                    <input type="file" id="guestCountsFile" @change="event => handleFileChange(event, 'guestcounts.import')" accept=".csv" class="file-input" />
                    <InputError :message="form.errors.file" />
                </div>

                <div class="mb-2">
                    <InputLabel for="transactionCountsFile" class="mb-2">Sales Transaction Counts CSV</InputLabel>
                    <input type="file" id="transactionCountsFile" @change="event => handleFileChange(event, 'salestransactioncounts.import')" accept=".csv" class="file-input" />
                    <InputError :message="form.errors.file" />
                </div>

                <div class="mb-2">
                    <InputLabel for="dailyTransactionsFile" class="mb-2">Daily Sales Transaction CSV</InputLabel>
                    <input type="file" id="dailyTransactionsFile" @change="event => handleFileChange(event, 'dailysalestransactions.import')" accept=".csv" class="file-input" />
                    <InputError :message="form.errors.file" />
                </div>

                <div class="mb-2">
                    <InputLabel for="transactionsFile" class="mb-2">Sales Transaction CSV</InputLabel>
                    <input type="file" id="transactionsFile" @change="event => handleFileChange(event, 'salestransactions.import')" accept=".csv" class="file-input" />
                    <InputError :message="form.errors.file" />
                </div>

                <div class="mb-2">
                    <InputLabel for="transactionJournalsFile" class="mb-2">Sales Transaction Journal CSV</InputLabel>
                    <input type="file" id="transactionJournalsFile" @change="event => handleFileChange(event, 'salestransactionjournals.import')" accept=".csv" class="file-input" />
                    <InputError :message="form.errors.file" />
                </div>
            </form>
        </article>
    </AuthenticatedLayout>
</template>
