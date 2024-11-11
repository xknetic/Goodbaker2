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
    products: {
        type: Array,
        default: () => [],
    },
    deliveries: {
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

const yearlyProductTotals = computed(() => {
    const totals = props.sales.reduce((acc, sale) => {
        const saleYear = new Date(sale.salesDate).getFullYear();
        const selectedYear = parseInt(form.date);

        // Only consider sales from the selected year
        if (saleYear === selectedYear) {
            sale.saleitems.forEach(saleitem => {
                const truckloaditem = saleitem.truckloaditems;
                const product = truckloaditem.products;
                const productName = product.productName;
                const quantity = saleitem.quantity || 0;

                // Accumulate the quantity for each product
                if (acc[productName]) {
                    acc[productName] += quantity;
                } else {
                    acc[productName] = quantity;
                }
            });
        }
        return acc;
    }, {});

    // Convert the totals object back into an array of objects
    return Object.keys(totals).map(productName => ({
        productName,
        quantity: totals[productName],
    }));
});

const highestSellingProduct = computed(() => {
    if (yearlyProductTotals.value.length === 0) {
        return []; // Return an empty array if there are no products
    }
    
    const maxQuantity = Math.max(...yearlyProductTotals.value.map(product => product.quantity));
    return yearlyProductTotals.value.filter(product => product.quantity === maxQuantity);
});

const lowestSellingProduct = computed(() => {
    if (yearlyProductTotals.value.length === 0) {
        return []; // Return an empty array if there are no products
    }
    
    const minQuantity = Math.min(...yearlyProductTotals.value.map(product => product.quantity));
    return yearlyProductTotals.value.filter(product => product.quantity === minQuantity);
});

const agentSalesTotals = computed(() => {
    const totals = props.sales.reduce((acc, sale) => {
        const saleYear = new Date(sale.salesDate).getFullYear();
        const selectedYear = parseInt(form.date);

        // Only consider sales from the selected year
        if (saleYear === selectedYear) {
            const agentName = sale.delivery.users.name;
            let saleTotal = 0;

            // Calculate total for this sale
            sale.saleitems.forEach(saleitem => {
                const truckloaditem = saleitem.truckloaditems;
                const product = truckloaditem.products;
                const price = product.productprices[0]?.price || 0;
                const quantity = saleitem.quantity || 0;

                // Accumulate the total for this sale
                saleTotal += price * quantity;
            });

            // Accumulate the total for the agent
            if (acc[agentName]) {
                acc[agentName] += saleTotal;
            } else {
                acc[agentName] = saleTotal;
            }
        }
        return acc;
    }, {});

    // Convert the totals object back into an array of objects
    return Object.keys(totals).map(agentName => ({
        agentName,
        totalSales: totals[agentName],
    }));
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
            const truckloaditem = saleitem.truckloaditems;
            const product = truckloaditem.products;

            // Get the price from productprices
            const price = product.productprices[0]?.price || 0;
            const quantity = saleitem.quantity || 0;

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

const monthlyProductsData = computed(() => {
    const monthlyProducts = Array.from({ length: 12 }, () => ({})); // Array to hold products for each month

    // Loop through each sale in filteredSales
    filteredSales.value.forEach(sale => {
        const saleDate = new Date(sale.salesDate);
        const month = saleDate.getMonth(); // Get the month index

        sale.saleitems.forEach(saleitem => {
            const truckloaditem = saleitem.truckloaditems;
            const product = truckloaditem.products;
            const productName = product.productName;
            const quantity = saleitem.quantity || 0;

            // Accumulate quantities for each product in the corresponding month
            if (monthlyProducts[month][productName]) {
                monthlyProducts[month][productName] += quantity;
            } else {
                monthlyProducts[month][productName] = quantity;
            }
        });
    });

    // Determine the highest and lowest selling product for each month
    return monthlyProducts.map(products => {
        const entries = Object.entries(products);
        
        const highestSelling = [];
        const lowestSelling = [];
        let maxQuantity = -Infinity;
        let minQuantity = Infinity;

        entries.forEach(([productName, quantity]) => {
            // Check for highest selling products
            if (quantity > maxQuantity) {
                maxQuantity = quantity;
                highestSelling.length = 0; // Clear the array
                highestSelling.push({ productName, quantity });
            } else if (quantity === maxQuantity) {
                highestSelling.push({ productName, quantity });
            }

            // Check for lowest selling products
            if (quantity < minQuantity) {
                minQuantity = quantity;
                lowestSelling.length = 0; // Clear the array
                lowestSelling.push({ productName, quantity });
            } else if (quantity === minQuantity) {
                lowestSelling.push({ productName, quantity });
            }
        });

        return { highestSelling, lowestSelling };
    });
});

const agentSalesPerMonth = computed(() => {
    const monthlyAgentTotals = Array.from({ length: 12 }, () => ({})); // Array to hold agent totals for each month

    // Loop through each sale in filteredSales
    filteredSales.value.forEach(sale => {
        const saleDate = new Date(sale.salesDate);
        const month = saleDate.getMonth(); // Get the month index

        const agentName = sale.delivery.users.name;
        let saleTotal = 0;

        // Calculate total for this sale
        sale.saleitems.forEach(saleitem => {
            const truckloaditem = saleitem.truckloaditems;
            const product = truckloaditem.products;
            const price = product.productprices[0]?.price || 0;
            const quantity = saleitem.quantity || 0;

            // Accumulate the total for this sale
            saleTotal += price * quantity;
        });

        // Accumulate the total for the agent in the corresponding month
        if (monthlyAgentTotals[month][agentName]) {
            monthlyAgentTotals[month][agentName] += saleTotal;
        } else {
            monthlyAgentTotals[month][agentName] = saleTotal;
        }
    });

    // Convert the totals object back into an array of objects
    return monthlyAgentTotals.map(agentTotals => {
        return Object.entries(agentTotals).map(([agentName, totalSales]) => ({
            agentName,
            totalSales,
        }));
    });
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

const modalPieData = computed(() => {
    const data = [];
    
    // Iterate through each sale in filteredSalesForModal
    filteredSalesForModal.value.forEach(sale => {
        // Iterate through each saleitem in the sale
        sale.saleitems.forEach(saleitem => {
            // Access the truckloaditem and product
            const truckloaditem = saleitem.truckloaditems;
            const product = truckloaditem.products;

            // Extract productName and quantity
            const productName = product.productName;
            const quantity = saleitem.quantity || 0; // Default to 0 if quantity is not available

            // Push the data into the array
            data.push({ productName, quantity });
        });
    });

    return data; // This will be an array of objects containing productName and quantity
});

const modalPieDataTotals = computed(() => {
    const totals = modalPieData.value.reduce((acc, item) => {
        if (acc[item.productName]) {
            acc[item.productName] += item.quantity; // Sum quantities for the same product
        } else {
            acc[item.productName] = item.quantity; // Initialize with the first quantity
        }
        return acc;
    }, {});

    // Convert the totals object back into an array of objects
    return Object.keys(totals).map(productName => ({
        productName,
        quantity: totals[productName],
    }));
});

const modalPieChartOptions = computed(() => {
    const quantities = modalPieDataTotals.value.map(data => data.quantity);
    const productNames = modalPieDataTotals.value.map(data => data.productName);

    const colors = productNames.map((_, index) => {
        // You can customize this logic to generate different colors
        return `hsl(${index * 360 / productNames.length}, 100%, 50%)`; // Generates a hue for each product
    });


    return {
        chart: {
            type: 'pie',
        },
        dataLabels: {
            enabled: true,
        },
        series: quantities,
        labels: productNames,
        colors: colors,
        legend: {
            position: 'bottom',
            horizontalAlign: 'center',
            offsetX: 0,
            offsetY: 0,
        },
    };
});

const pieChartOptions = computed(() => {
    const quantities = yearlyProductTotals.value.map(data => data.quantity);
    const productNames = yearlyProductTotals.value.map(data => data.productName);

    // Generate an array of colors based on the number of products
    const colors = productNames.map((_, index) => {
        // You can customize this logic to generate different colors
        return `hsl(${index * 360 / productNames.length}, 100%, 50%)`; // Generates a hue for each product
    });

    return {
        chart: {
            type: 'pie',
        },
        dataLabels: {
            enabled: true,
        },
        series: quantities,
        labels: productNames,
        colors: colors, // Use the generated colors array
        legend: {
            position: 'bottom',
            horizontalAlign: 'center',
            offsetX: 0,
            offsetY: 0,
        },
    };
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


// Group products by category
const productsByCategory = computed(() => {
    return props.products.reduce((acc, product) => {
        const category = product.productCategory;
        if (!acc[category]) {
            acc[category] = [];
        }
        acc[category].push(product);
        return acc;
    }, {});
});

// Calculate total sales for each product by month
const monthlyProductSales = computed(() => {
    const monthlyTotals = {};
    const selectedYear = parseInt(form.date);

    // Initialize the monthly totals for each category
    Object.keys(productsByCategory.value).forEach(category => {
        monthlyTotals[category] = Array.from({ length: 12 }, () => ({})); // 12 months initialized to empty objects
    });

    // Loop through each sale
    props.sales.forEach(sale => {
        const saleDate = new Date(sale.salesDate);
        const saleYear = saleDate.getFullYear();
        const saleMonth = saleDate.getMonth(); // 0 for January, 1 for February, etc.

        // Only consider sales from the selected year
        if (saleYear === selectedYear) {
            sale.saleitems.forEach(saleitem => {
                const truckloaditem = saleitem.truckloaditems;
                const product = truckloaditem.products;
                const productName = product.productName;
                const productCategory = product.productCategory;
                const quantity = saleitem.quantity || 0;

                // Initialize the product in the monthly totals if not already done
                if (!monthlyTotals[productCategory][saleMonth][productName]) {
                    monthlyTotals[productCategory][saleMonth][productName] = 0;
                }

                // Accumulate the quantity for the product in the corresponding month
                monthlyTotals[productCategory][saleMonth][productName] += quantity;
            });
        }
    });

    // Ensure all products have a total for each month, even if it's zero
    Object.keys(productsByCategory.value).forEach(category => {
        productsByCategory.value[category].forEach(product => {
            const productName = product.productName;
            for (let month = 0; month < 12; month++) {
                if (!monthlyTotals[category][month][productName]) {
                    monthlyTotals[category][month][productName] = 0; // Set to 0 if no sales
                }
            }
        });
    });

    return monthlyTotals;
});

// Prepare data for line charts based on categories
const lineChartData = computed(() => {
    const data = {};

    Object.keys(monthlyProductSales.value).forEach(category => {
        data[category] = {
            series: [],
            categories: Array.from({ length: 12 }, (_, index) => new Date(0, index).toLocaleString('default', { month: 'long' })),
        };

        Object.keys(monthlyProductSales.value[category]).forEach(month => {
            const monthData = monthlyProductSales.value[category][month];
            Object.keys(monthData).forEach(productName => {
                const productSales = monthData[productName];

                // Find or create the series for this product
                const seriesIndex = data[category].series.findIndex(series => series.name === productName);
                if (seriesIndex === -1) {
                    data[category].series.push({ name: productName, data: Array(12).fill(0) });
                }

                // Add the sales quantity to the corresponding month
                data[category].series.find(series => series.name === productName).data[month] += productSales;
            });
        });
    });

    return data;
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 rounded-lg flex flex-col gap-5">

            <!-- highest selling and lowest selling -->
            <div class="flex gap-5">
                <div class="flex bg-white p-2 px-5 rounded-lg items-center gap-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-coin text-[#0108EE]" viewBox="0 0 16 16">
                        <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z"/>
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/>
                    </svg>

                    <div v-for="product in highestSellingProduct" :key="product.productName">
                        <p>Highest selling Product</p>
                        <h4>
                            {{ product.productName }}: {{ product.quantity }}
                        </h4>
                    </div>
                </div>

                <div class="flex bg-white p-2 rounded-lg items-center gap-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-coin text-[#0108EE]" viewBox="0 0 16 16">
                        <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z"/>
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/>
                    </svg>

                    <div v-for="product in lowestSellingProduct" :key="product.productName" class="bg-white p-5 rounded-lg">
                        <p>Lowest selling Product</p>
                        <h4>
                            {{ product.productName }}: {{ product.quantity }}
                        </h4>
                    </div>
                </div>
            </div>

            <div class="flex gap-5">
                <main class="flex-1 flex flex-col gap-5">
                    <!-- Bar chart -->
                    <div class="chart-container bg-white rounded-lg p-5 w-full">
                        <h3 class="font-bold">Sales Reports</h3>

                        <div class="border-b border-gray-700 my-2 mb-5" />

                        <div class="flex">
                            <VueApexCharts
                                :options="barChartOptions" 
                                :series="barChartOptions.series"
                                height="250"
                                width="700"
                            />
                        </div>
                    </div>
                    
                    <!-- Recent transaction -->
                    <div class="bg-white rounded-lg p-5 w-full">
                        <h3 class="font-bold">Recent Transactions </h3>

                        <div class="border-b border-gray-700 my-2 mb-5" />

                        <!-- Bottom Table -->
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left">
                                <thead class="text-xs uppercase">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Delivery Date</th>
                                        <th scope="col" class="px-6 py-3">Client/Route</th>
                                        <th scope="col" class="px-6 py-3">Delivery Type</th>
                                        <th scope="col" class="px-6 py-3">Truck Agent</th>
                                        <th scope="col" class="px-6 py-3">Truck Driver</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="delivery in deliveries" :key="delivery.id" class="border-gray-700">
                                        <td class="px-6 py-4"> {{ delivery.salesDate }} </td>
                                        <td class="px-6 py-4"><span v-if="delivery.client">{{ delivery.clients.clientName }}</span>{{ delivery.route }} </td>
                                        <td class="px-6 py-4"> {{ delivery.saletypes.saleTypeName }} </td>
                                        <td class="px-6 py-4"> {{ delivery.users.name }} </td>
                                        <td class="px-6 py-4"> {{ delivery.drivers.driverName }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </main>
                
                <aside class="bg-white p-5 w-[30%] rounded-lg">
                    <h3 class="font-bold">Month Sales </h3>

                    <div class="border-b border-gray-700 my-2 mb-5" />

                    <table class="striped">
                    <tr>
                        <td>Month</td>
                        <td>Total</td>
                    </tr>
                    <tr v-for="total,index in monthlyTotalSales">
                        <td>{{ new Date(0, index).toLocaleString('default', { month: 'long' }) }}</td>
                        <td>{{ total }}</td>
                    </tr>
                </table>
                </aside>
            </div>
        </article>
    </AuthenticatedLayout>
</template>