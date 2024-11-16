<script setup>
import { ref, computed } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';

const props = defineProps({
    branches: {
        type: Object,
        default: () => [],
    },

    salestransactions: {
        type: Array,
        default: () => [],
    },

    journals: {
        type: Array,
        default: () => [],
    },

    dailysales: {
        type: Array,
        default:() => [],
    },

    counts: {
        type: Array,
        default:() => [],
    },

    guestcounts: {
        type: Array,
        default:() => [],
    },

    discountcharges: {
        type: Array,
        default:() => [],
    },
});

// State to track the selected category for the table
const activeCategory = ref('sale');

// Method to change the active category
const showCategory = (category) => {
    activeCategory.value = category;
    currentPage.value = 1; // Reset to first page whenever category changes
};

const form = useForm({
    file: null,
    selectedRoute: '', // Track which import route to use
    branch: props.branches.branchID
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
    <Head title="Branches" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <h3 class="font-bold">Branches</h3>
            </div>
            <div class="border-b border-gray-700 my-2 mb-5" />

            <!-- Bottom Table -->
            <div class="overflow-auto max-w-full">
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
                        <div v-if="branches">
                            <h3>{{ branches.branchName }}</h3>
                        </div>
                    </div>
                    <div class="space-x-5 w-[80%] flex flex-wrap justify-end space-y-2">
                        <div/>
                        <PrimaryButton class="p-2" @click="showCategory('sale')">
                            Sale Transactions
                        </PrimaryButton>
                        <PrimaryButton class="p-2" @click="showCategory('journals')">
                            Transaction Journals
                        </PrimaryButton>
                        <PrimaryButton class="p-2" @click="showCategory('dailysales')">
                            Daily Transactions
                        </PrimaryButton>
                        <PrimaryButton class="p-2" @click="showCategory('counts')">
                            Transaction Count
                        </PrimaryButton>
                        <PrimaryButton class="p-2" @click="showCategory('guestcounts')">
                            Guest Counts
                        </PrimaryButton>
                        <PrimaryButton class="p-2" @click="showCategory('discountcharges')">
                            Discount Charges
                        </PrimaryButton>
                    </div>
                </div>

                <div class="border-b border-gray-700 my-5" />

                <!-- Conditional Rendering of Tables Based on Active Category -->
                <!-- Sale Transactions Table -->
                <div v-if="activeCategory === 'sale'">
                    <form @submit.prevent="submit"
                        class="flex items-center"
                    >
                        <div class="mb-2">
                            <InputLabel for="transactionsFile" class="mb-2">Sales Transaction CSV</InputLabel>
                            <input type="file" id="transactionsFile" @change="event => handleFileChange(event, 'salestransactions.import')" accept=".csv" class="file-input" />
                            <InputError :message="form.errors.file" />
                        </div>

                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Import
                        </PrimaryButton>
                    </form>
                    <div class="overflow-y-auto" style="max-height: 200px;">
                        <table>
                            <thead class="text-xs uppercase">
                                <tr>
                                    <th scope="col" class="px-6 py-3">#</th>
                                    <th scope="col" class="px-6 py-3">Terminal</th>
                                    <th scope="col" class="px-6 py-3">Username</th>
                                    <th scope="col" class="px-6 py-3">Transaction Date</th>
                                    <th scope="col" class="px-6 py-3">Transaction Number</th>
                                    <th scope="col" class="px-6 py-3">Amount</th>
                                    <th scope="col" class="px-6 py-3">Transaction Number</th>
                                    <th scope="col" class="px-6 py-3">Amount</th>
                                    <th scope="col" class="px-6 py-3">Transaction Number</th>
                                    <th scope="col" class="px-6 py-3">Amount</th>
                                    <th scope="col" class="px-6 py-3">Transaction Number</th>
                                    <th scope="col" class="px-6 py-3">Amount</th>
                                    <th scope="col" class="px-6 py-3">Transaction Number</th>
                                    <th scope="col" class="px-6 py-3">Amount</th>
                                    <th scope="col" class="px-6 py-3">Transaction Number</th>
                                    <th scope="col" class="px-6 py-3">Amount</th>
                                    <th scope="col" class="px-6 py-3">Transaction Number</th>
                                    <th scope="col" class="px-6 py-3">Amount</th>
                                </tr>
                            </thead>
                            <tbody v-for="(transaction, index) in salestransactions" :key="transaction.id">
                                <tr v-if="branches.branchID === transaction.branch">
                                    <td class="px-6 py-4">{{ index + 1 }}</td>
                                    <td class="px-6 py-4">{{ transaction.Terminal }}</td>
                                    <td class="px-6 py-4">{{ transaction.UserName }}</td>
                                    <td class="px-6 py-4">{{ transaction.TranDate }}</td>
                                    <td class="px-6 py-4">{{ transaction.TranNo }}</td>
                                    <td class="px-6 py-4">{{ transaction.Amount }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Journal Table with Pagination -->
                <div v-if="activeCategory === 'journals'">
                    <form @submit.prevent="submit"
                        class="flex items-center"
                    >
                        <div class="mb-2">
                            <InputLabel for="transactionJournalsFile" class="mb-2">Sales Transaction Journal CSV</InputLabel>
                            <input type="file" id="transactionJournalsFile" @change="event => handleFileChange(event, 'salestransactionjournals.import')" accept=".csv" class="file-input" />
                            <InputError :message="form.errors.file" />
                        </div>

                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Import
                        </PrimaryButton>
                    </form>
                    <div class="overflow-y-auto" style="max-height: 400px;">
                        <table>
                            <thead class="text-xs uppercase">
                                <tr>
                                    <th scope="col" class="px-6 py-3">#</th>
                                    <th scope="col" class="px-6 py-3">Store Code</th>
                                    <th scope="col" class="px-6 py-3">Sales Date</th>
                                    <th scope="col" class="px-6 py-3">Customer Name</th>
                                    <th scope="col" class="px-6 py-3">Bar Code</th>
                                    <th scope="col" class="px-6 py-3">SKU</th>
                                    <th scope="col" class="px-6 py-3">Vat/Non-Vat</th>
                                    <th scope="col" class="px-6 py-3">Quantity</th>
                                    <th scope="col" class="px-6 py-3">UOM</th>
                                    <th scope="col" class="px-6 py-3">Unit Price</th>
                                    <th scope="col" class="px-6 py-3">Amount</th>
                                    <th scope="col" class="px-6 py-3">Charges</th>
                                    <th scope="col" class="px-6 py-3">Discounts/Allowance</th>
                                    <th scope="col" class="px-6 py-3">Sales Returns</th>
                                    <th scope="col" class="px-6 py-3">Vat Amount</th>
                                    <th scope="col" class="px-6 py-3">Net Amount</th>
                                </tr>
                            </thead>
                            <tbody v-for="(journal, index) in paginatedJournals" :key="journal.id">
                                <tr v-if="branches.branchID === journal.branch">
                                    <td class="px-6 py-4">{{ index + 1 }}</td>
                                    <td class="px-6 py-4">{{ journal.StoreCode }}</td>
                                    <td class="px-6 py-4">{{ journal.SalesDate }}</td>
                                    <td class="px-6 py-4">{{ journal.CustomerName }}</td>
                                    <td class="px-6 py-4">{{ journal.BarCode }}</td>
                                    <td class="px-6 py-4">{{ journal.SKU }}</td>
                                    <td class="px-6 py-4">{{ journal.VatOrNonVAt }}</td>
                                    <td class="px-6 py-4">{{ journal.QTY }}</td>
                                    <td class="px-6 py-4">{{ journal.UOM }}</td>
                                    <td class="px-6 py-4">{{ journal.UnitPrice.toFixed(2) }}</td>
                                    <td class="px-6 py-4">{{ journal.Amount.toFixed(2) }}</td>
                                    <td class="px-6 py-4">{{ journal.Charges.toFixed(2) }}</td>
                                    <td class="px-6 py-4">{{ journal.DiscountsOrAllowance.toFixed(2) }}</td>
                                    <td class="px-6 py-4">{{ journal.SalesReturns.toFixed(2) }}</td>
                                    <td class="px-6 py-4">{{ journal.VatAmount }}</td>
                                    <td class="px-6 py-4">{{ journal.NetAmt.toFixed(2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Daily Table with Pagination -->
                <div v-if="activeCategory === 'dailysales'">
                    <form @submit.prevent="submit"
                        class="flex items-center"
                    >
                        <div class="mb-2">
                            <InputLabel for="dailyTransactionsFile" class="mb-2">Daily Sales Transaction CSV</InputLabel>
                            <input type="file" id="dailyTransactionsFile" @change="event => handleFileChange(event, 'dailysalestransactions.import')" accept=".csv" class="file-input" />
                            <InputError :message="form.errors.file" />
                        </div>

                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Import
                        </PrimaryButton>
                    </form>
                    <div class="overflow-y-auto" style="max-height: 200px;">
                        <table>
                            <thead class="text-xs uppercase">
                                <tr>
                                    <th scope="col" class="px-6 py-3">#</th>
                                    <th scope="col" class="px-6 py-3">Store Name</th>
                                    <th scope="col" class="px-6 py-3">Log Date</th>
                                    <th scope="col" class="px-6 py-3">Log Day</th>
                                    <th scope="col" class="px-6 py-3">Log Time</th>
                                    <th scope="col" class="px-6 py-3">Transaction No</th>
                                    <th scope="col" class="px-6 py-3">Terminal No</th>
                                    <th scope="col" class="px-6 py-3">Customer Name</th>
                                    <th scope="col" class="px-6 py-3">Product Code</th>
                                    <th scope="col" class="px-6 py-3">Product Description</th>
                                    <th scope="col" class="px-6 py-3">Category</th>
                                    <th scope="col" class="px-6 py-3">Total Quantity</th>
                                    <th scope="col" class="px-6 py-3">UOM</th>
                                    <th scope="col" class="px-6 py-3">Price</th>
                                    <th scope="col" class="px-6 py-3">Gross Sales</th>
                                    <th scope="col" class="px-6 py-3">Sales Returns</th>
                                    <th scope="col" class="px-6 py-3">Sales REG Disc</th>
                                    <th scope="col" class="px-6 py-3">Sales SCD Disc</th>
                                    <th scope="col" class="px-6 py-3">Sales PWD Disc</th>
                                    <th scope="col" class="px-6 py-3">VAT Exempt</th>
                                    <th scope="col" class="px-6 py-3">Net Sales</th>
                                    <th scope="col" class="px-6 py-3">VAT Non-VAT</th>
                                </tr>
                            </thead>
                            <tbody v-for="(dailysale, index) in dailysales" :key="dailysale.id">
                                <tr v-if="branches.branchID === dailysale.branch">
                                    <td class="px-6 py-4">{{ index + 1 }}</td>
                                    <td class="px-6 py-4">{{ dailysale.StoreName }}</td>
                                    <td class="px-6 py-4">{{ dailysale.LogDate }}</td>
                                    <td class="px-6 py-4">{{ dailysale.LogDay }}</td>
                                    <td class="px-6 py-4">{{ dailysale.LogTime }}</td>
                                    <td class="px-6 py-4">{{ dailysale.TransactionNo }}</td>
                                    <td class="px-6 py-4">{{ dailysale.TerminalNo }}</td>
                                    <td class="px-6 py-4">{{ dailysale.CustomerName }}</td>
                                    <td class="px-6 py-4">{{ dailysale.ProductCode }}</td>
                                    <td class="px-6 py-4">{{ dailysale.ProductDescription }}</td>
                                    <td class="px-6 py-4">{{ dailysale.Category }}</td>
                                    <td class="px-6 py-4">{{ dailysale.TotalQTY }}</td>
                                    <td class="px-6 py-4">{{ dailysale.UOM }}</td>
                                    <td class="px-6 py-4">{{ dailysale.Price }}</td>
                                    <td class="px-6 py-4">{{ dailysale.GrossSales }}</td>
                                    <td class="px-6 py-4">{{ dailysale.SalesReturns }}</td>
                                    <td class="px-6 py-4">{{ dailysale.SalesREGDisc }}</td>
                                    <td class="px-6 py-4">{{ dailysale.SalesSCDDisc }}</td>
                                    <td class="px-6 py-4">{{ dailysale.SalesPWDDISC }}</td>
                                    <td class="px-6 py-4">{{ dailysale.VATExempt }}</td>
                                    <td class="px-6 py-4">{{ dailysale.NetSales }}</td>
                                    <td class="px-6 py-4">{{ dailysale.VATNonVAT }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Transaction Counts Table with Pagination -->
                <div v-if="activeCategory === 'counts'">
                    <form @submit.prevent="submit"
                        class="flex items-center"
                    >
                        <div class="mb-2">
                            <InputLabel for="transactionCountsFile" class="mb-2">Sales Transaction Counts CSV</InputLabel>
                            <input type="file" id="transactionCountsFile" @change="event => handleFileChange(event, 'salestransactioncounts.import')" accept=".csv" class="file-input" />
                            <InputError :message="form.errors.file" />
                        </div>

                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Import
                        </PrimaryButton>
                    </form>
                    <div class="overflow-y-auto" style="max-height: 200px;">
                        <table>
                            <thead class="text-xs uppercase">
                                <tr>
                                    <th scope="col" class="px-6 py-3">#</th>
                                    <th scope="col" class="px-6 py-3">Terminal</th>
                                    <th scope="col" class="px-6 py-3">Amount</th>
                                    <th scope="col" class="px-6 py-3">Sales Count</th>
                                </tr>
                            </thead>
                            <tbody v-for="(count, index) in counts" :key="count.id">
                                <tr v-if="branches.branchID === count.branch">
                                    <td class="px-6 py-4">{{ index + 1 }}</td>
                                    <td class="px-6 py-4">{{ count.Terminal }}</td>
                                    <td class="px-6 py-4">{{ count.Amount }}</td>
                                    <td class="px-6 py-4">{{ count.SalesCount }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Guest Counts Table with Pagination -->
                <div v-if="activeCategory === 'guestcounts'">
                    <form @submit.prevent="submit"
                        class="flex items-center"
                    >
                        <div class="mb-2">
                            <InputLabel for="guestCountsFile" class="mb-2">Guest Counts CSV</InputLabel>
                            <input type="file" id="guestCountsFile" @change="event => handleFileChange(event, 'guestcounts.import')" accept=".csv" class="file-input" />
                            <InputError :message="form.errors.file" />
                        </div>

                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Import
                        </PrimaryButton>
                    </form>
                    <div class="overflow-y-auto" style="max-height: 200px;">
                        <table>
                            <thead class="text-xs uppercase">
                                <tr>
                                    <th scope="col" class="px-6 py-3">#</th>
                                    <th scope="col" class="px-6 py-3">Store Name</th>
                                    <th scope="col" class="px-6 py-3">Date</th>
                                    <th scope="col" class="px-6 py-3">Day</th>
                                    <th scope="col" class="px-6 py-3">Time</th>
                                    <th scope="col" class="px-6 py-3">Transaction No</th>
                                    <th scope="col" class="px-6 py-3">Guest Count</th>
                                    <th scope="col" class="px-6 py-3">Gross Amount</th>
                                    <th scope="col" class="px-6 py-3">Returns</th>
                                    <th scope="col" class="px-6 py-3">Regular Discount</th>
                                    <th scope="col" class="px-6 py-3">Senior Discount</th>
                                    <th scope="col" class="px-6 py-3">PWD Discount</th>
                                    <th scope="col" class="px-6 py-3">VAT Exempt</th>
                                    <th scope="col" class="px-6 py-3">Net Sales</th>
                                </tr>
                            </thead>
                            <tbody v-for="(guestcount, index) in guestcounts" :key="guestcount.id">
                                <tr v-if="branches.branchID === guestcount.branch">
                                    <td class="px-6 py-4">{{ index + 1 }}</td>
                                    <td class="px-6 py-4">{{ guestcount.StoreName }}</td>
                                    <td class="px-6 py-4">{{ guestcount.Date }}</td>
                                    <td class="px-6 py-4">{{ guestcount.Day }}</td>
                                    <td class="px-6 py-4">{{ guestcount.Time }}</td>
                                    <td class="px-6 py-4">{{ guestcount.TransactionNo }}</td>
                                    <td class="px-6 py-4">{{ guestcount.GuestCount }}</td>
                                    <td class="px-6 py-4">{{ guestcount.GrossAmount }}</td>
                                    <td class="px-6 py-4">{{ guestcount.Return }}</td>
                                    <td class="px-6 py-4">{{ guestcount.RegularDiscount }}</td>
                                    <td class="px-6 py-4">{{ guestcount.SeniorDiscount }}</td>
                                    <td class="px-6 py-4">{{ guestcount.PWDDiscount }}</td>
                                    <td class="px-6 py-4">{{ guestcount.VatExempt }}</td>
                                    <td class="px-6 py-4">{{ guestcount.NetAmount }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Discount Charges Table -->
                <div v-if="activeCategory === 'discountcharges'">
                    <form @submit.prevent="submit"
                        class="flex items-center"
                    >
                        <div class="mb-2">
                            <InputLabel for="discountChargesFile" class="mb-2">Sales Transaction Discount Charges CSV</InputLabel>
                            <input type="file" id="discountChargesFile" @change="event => handleFileChange(event, 'salestransactiondiscountcharges.import')" accept=".csv" class="file-input" />
                            <InputError :message="form.errors.file" />
                        </div>

                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Import
                        </PrimaryButton>
                    </form>
                    <div class="overflow-y-auto" style="max-height: 200px;">
                        <table>
                            <thead class="text-xs uppercase">
                                <tr>
                                    <th scope="col" class="px-6 py-3">#</th>
                                    <th scope="col" class="px-6 py-3">Terminal</th>
                                    <th scope="col" class="px-6 py-3">UserName</th>
                                    <th scope="col" class="px-6 py-3">TranDate</th>
                                    <th scope="col" class="px-6 py-3">TranNo</th>
                                    <th scope="col" class="px-6 py-3">Discount</th>
                                    <th scope="col" class="px-6 py-3">Allowance</th>
                                    <th scope="col" class="px-6 py-3">Charge</th>
                                    <th scope="col" class="px-6 py-3">PesoCharge</th>
                                </tr>
                            </thead>
                            <tbody v-for="(discountcharge, index) in discountcharges" :key="discountcharge.id">
                                <tr v-if="branches.branchID === discountcharge.branch">
                                    <td class="px-6 py-4">{{ index + 1 }}</td>
                                    <td class="px-6 py-4">{{ discountcharge.Terminal }}</td>
                                    <td class="px-6 py-4">{{ discountcharge.UserName }}</td>
                                    <td class="px-6 py-4">{{ discountcharge.TranDate }}</td>
                                    <td class="px-6 py-4">{{ discountcharge.TranNo }}</td>
                                    <td class="px-6 py-4">{{ discountcharge.Discount }}</td>
                                    <td class="px-6 py-4">{{ discountcharge.Allowance }}</td>
                                    <td class="px-6 py-4">{{ discountcharge.Charge }}</td>
                                    <td class="px-6 py-4">{{ discountcharge.PesoCharge }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </article>
    </AuthenticatedLayout>
</template>
