<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Modal from '@/Components/Modal.vue';
import VueApexCharts from 'vue3-apexcharts';

const showModal = ref(false);

const props = defineProps({
    sales: {
        type: Array,
        default: () => [],
    },
});

const form = useForm({
    date: '2024',
    month: ''
});

// Create a computed property to extract unique years from salesDate
const saleYears = computed(() => {
    const years = props.sales.map(sale => new Date(sale.salesDate).getFullYear());
    return [...new Set(years)]; // Convert Set back to an array
});
const filteredSales = computed(() => {
    const selectedYear = parseInt(form.date); // Get the selected year from the form
    return props.sales.filter(sale => {
        const saleYear = new Date(sale.salesDate).getFullYear(); // Extract the year from salesDate
        return saleYear === selectedYear; // Filter sales that match the selected year
    });
});

const monthlyTotalSales = computed(() => {
    // Initialize an array for each month to hold total sales amounts
    const monthlyTotals = Array.from({ length: 12 }, () => 0); // 12 months initialized to 0

    // Loop through each sale in filteredSales
    filteredSales.value.forEach(sale => {
        // Initialize total for the current sale
        let saleTotal = 0;

        // Loop through each saleitem in the sale
        sale.saleitems.forEach(saleitem => {
            // Access the truckloaditem directly (assuming it's a single object)
            const truckloaditem = saleitem.truckloaditems; // Assuming this is an object

            // Access the product directly from truckloaditem
            const product = truckloaditem.products; // Assuming this is also an object

            // Get the price from productprices
            const price = product.productprices[0]?.price || 0; // Use optional chaining to avoid errors
            const quantity = saleitem.quantity || 0; // Assuming quantity is directly on saleitem

            // Calculate total for this product and add to saleTotal
            saleTotal += price * quantity;
        });

        // Get the sales date and determine the month
        const saleDate = new Date(sale.salesDate);
        const month = saleDate.getMonth(); // getMonth() returns 0 for January, 1 for February, etc.

        // Add the sale total to the corresponding month's total
        monthlyTotals[month] += saleTotal;
    });

    return monthlyTotals; // This will be an array of total sales amounts for each month
});

const filteredSalesForModal = computed(() => {
    const selectedYear = parseInt(form.date); // Get the selected year from the form
    const selectedMonth = parseInt(form.month); // Get the selected month from the form
    return props.sales.filter(sale => {
        const saleDate = new Date(sale.salesDate);
        const saleYear = saleDate.getFullYear(); // Extract the year from salesDate
        const saleMonth = saleDate.getMonth(); // Extract the month from salesDate
        return saleYear === selectedYear && saleMonth === selectedMonth; // Filter sales that match the selected year and month
    });
});

const modalPieData = ref({name:'', quantity:''});

const pieChartOptions = ref({
    chart: {
        type: 'pie',
    },
    dataLabels: {
        enabled: true,
    },
    series: [12],
    labels: [12],
    colors: ['#0108EE', '#F7C849'],
    legend: {
        position: 'bottom',
        horizontalAlign: 'center',
        offsetX: 0,
        offsetY: 0,
    },
});

const barChartOptions = computed(() => ({
    plotOptions: {
        bar: {
            distributed: true
        }
    },
    chart: {
        type: 'bar',
    },
    series: [{
        data: monthlyTotalSales.value.map((total, index) => ({
            x: new Date(0, index).toLocaleString('default', { month: 'long' }), // Get month name
            y: total
        }))
    }]
}));

</script>

<style>
tr:nth-child(even) {
  background: rgb(234, 235, 234);
}
</style>

<template>
    <Head title="Sales Reports" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <h3 class="font-bold">Sales Reports</h3>

                <!-- Export Button -->
                <Link
                    href="/sales-reports/export"
                    target="_blank" 
                >
                    <PrimaryButton>
                        Export
                    </PrimaryButton>
                </Link>
            </div>
            <div class="border-b border-gray-700 my-2 mb-5" />

            <div>
                <InputLabel for="saleType" class="mb-2">Year: </InputLabel>
                <select v-model="form.date" name="year" id="year" class="mt-1 w-[8%] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                    <option v-for="year in saleYears" :value="year">{{ year }}</option>
                </select>
            </div>
            
            <h4>{{ form.date }} Sales Performance</h4>

            <VueApexCharts
                :options="barChartOptions" 
                :series="barChartOptions.series"
                height="400"
            />

            <table>
                <tr>
                    <td>Month</td>
                    <td>Total</td>
                    <td>Action</td>
                </tr>
                <tr v-for="total,index in monthlyTotalSales">
                    <td>{{ new Date(0, index).toLocaleString('default', { month: 'long' }) }}</td>
                    <td>{{ total }}</td>
                    <td><PrimaryButton class="w-[20%] h-[32%] text-sm" @click.prevent="showModal = true; form.month=index" >View</PrimaryButton></td>
                </tr>
            </table>


            <Modal
                :show="showModal" 
                @close="showModal = false" 
                :closeable="true"
                >

                <VueApexCharts
                    :options="pieChartOptions" 
                    :series="pieChartOptions.series" 
                    type="pie" 
                    height="200"
                />

                <table class="w-full text-sm text-left">
                    <thead class="text-xs uppercase">
                        <tr>
                            <th scope="col" class="px-6 py-3">Transaction No.</th>
                            <th scope="col" class="px-6 py-3">Sale Type</th>
                            <th scope="col" class="px-6 py-3">Date</th>
                            <!-- <th scope="col" class="px-6 py-3">Invoice</th> -->
                            <th scope="col" class="px-6 py-3">Product Items</th>
                            <th scope="col" class="px-6 py-3">Quantity</th>
                            <th scope="col" class="px-6 py-3">Price</th>
                            <th scope="col" class="px-6 py-3">Amount</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="sale in filteredSalesForModal" :key="sale.id">
                            <td class="px-6 py-4 align-top"> {{ sale.salesID }} </td>
                            <td class="px-6 py-4 align-top"> {{ sale.delivery.saletypes.saleTypeName }} </td>
                            <td class="px-6 py-4 align-top"> {{ sale.salesDate }} </td>
                            <td class="px-6 py-4">
                                <tr v-for="item in sale.saleitems">{{ item.truckloaditems.products.productName }}</tr>
                            </td>
                            <td class="px-6 py-4">
                                <tr v-for="item in sale.saleitems">{{ item.quantity }}</tr>
                            </td>
                            <td class="px-6 py-4">
                                <tr v-for="item in sale.saleitems">{{ item.truckloaditems.products.productprices[0].price }}</tr>
                            </td>
                            <td class="px-6 py-4">
                                <tr v-for="item in sale.saleitems">{{ item.quantity*item.truckloaditems.products.productprices[0].price }}</tr>
                            </td>
                            <td class="px-6 py-4 align-top">{{ sale.salesStatus }} </td>
                        </tr>
                    </tbody>
                </table>
            </Modal>

        </article>
    </AuthenticatedLayout>
</template>

<style>
.align-top {
    vertical-align: top;
}
</style>
