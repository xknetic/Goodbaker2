<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { ref, computed } from 'vue';
import Modal from '@/Components/Modal.vue';
const props = defineProps({
    rawmaterials: {
        type: Array,
        default: () => [],
    },

    suppliers: {
        type: Array,
        default: () => [],
    },

    purchases: {
        type: Array,
        default: () => [],
    },

    replenishpremixes: {
        type: Array,
        default: () => [],
    },

    premixes: {
        type: Array,
        default: () => [],
    },

    replenishproducts: {
        type: Array,
        default: () => [],
    },

    products: {
        type: Array,
        default: () => [],
    },

    sales: {
        type: Array,
        default: () => [],
    },
});

const form = useForm({
    date: '2024',
    month: 0,
    show: 'rawMaterials',
});


function totalAmount(supplierID) {
    // Ensure to check for valid supplierID
    if (!supplierID) return 0;

    return props.rawmaterials
        .filter(rawMaterial => rawMaterial.supplierID === supplierID) // Filter by supplier
        .reduce((total, rawMaterial) => {
            return total + rawMaterial.rawmaterialunits.reduce((unitTotal, unit) => {
                return unitTotal + (unit.price * unit.stock);
            }, 0);
        }, 0);
}

function formatNumber(value) {
    if (value === null || value === undefined || isNaN(value)) return '';
    if (value === 0) return '0'; // Handle null or undefined
    return value.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}

function formatQuantity(value) {
    if (value === null || value === undefined || isNaN(value)) return '';
    if (value === 0) return '0'; // Handle null or undefined
    return value;
}

const years = computed(() => {
    const replenishYears = props.replenishpremixes.map(replenish => new Date(replenish.date).getFullYear());
    return [...new Set(replenishYears)]; // Convert Set back to an array
});

const totalPurchasesByMonthAndMaterial = computed(() => {
    const selectedYear = parseInt(form.date); // Get the selected year from the form

    // Filter purchases by the selected year
    const filteredPurchases = props.purchases.filter(purchase => {
        const purchaseYear = new Date(purchase.purchaseDate).getFullYear();
        return purchaseYear === selectedYear;
    });

    // Initialize an object to hold the totals
    const totals = {};
    const adds = {};
    const deducts = {};
    const repremix = {};
    const usedpremix = {};
    const reproduct = {};
    const sold = {};
    // Initialize totals for all months of the selected year
    for (let year of years.value) {
        for (let month = 0; month < 12; month++) {
            totals[`${year}-${month}`] = {};
            adds[`${year}-${month}`] = {};
            deducts[`${year}-${month}`] = {};
            repremix[`${year}-${month}`] = {};
            usedpremix[`${year}-${month}`] = {};
            reproduct[`${year}-${month}`] = {};
            sold[`${year}-${month}`] = {};
        }
    }

    // for (let year of years.value) {
    //     for (let month = 0; month < 12; month++) {
    //         for (let stock of props.rawmaterials) {
    //             totals[year+'-'+month][stock.rawMaterialID] = 0;
    //             adds[year+'-'+month][stock.rawMaterialID] = 0;
    //             deducts[year+'-'+month][stock.rawMaterialID] = 0;
    //         }
    //     }
    // }

    // for (let stock of props.rawmaterials) {
    //     totals[`2023-0`][stock.rawmaterialunits[0].rawMaterial] = stock.rawmaterialunits[0].stock;
    // }

    // Function to add quantities to totals
    const addToTotals = (monthKey, rawMaterialID, quantity) => {
        if (!totals[monthKey][rawMaterialID]) {
            totals[monthKey][rawMaterialID] = 0;
        }
        if (!adds[monthKey][rawMaterialID]) {
            adds[monthKey][rawMaterialID] = 0;
        }
        totals[monthKey][rawMaterialID] += quantity;
        adds[monthKey][rawMaterialID] += quantity;
    };

    const deductToTotals = (monthKey, rawMaterialID, quantity, premixID, repremixQuantity) => {
        if (!totals[monthKey][rawMaterialID]) {
            totals[monthKey][rawMaterialID] = 0;
        }
        if (!deducts[monthKey][rawMaterialID]) {
            deducts[monthKey][rawMaterialID] = 0;
        }
        if (!repremix[monthKey][rawMaterialID]) {
            repremix[monthKey][premixID] = 0;
        }
        totals[monthKey][rawMaterialID] -= quantity;
        deducts[monthKey][rawMaterialID] += quantity;
        repremix[monthKey][premixID] += repremixQuantity;
    };

    const addUsedpremix= (monthKey, premixID, toDeduct) => {
        if (!usedpremix[monthKey][premixID]) {
            usedpremix[monthKey][premixID] = 0;
        }
        usedpremix[monthKey][premixID] += toDeduct;
    };

    const addReproduct= (monthKey, productID, quantity) => {
        if (!reproduct[monthKey][productID]) {
            reproduct[monthKey][productID] = 0;
        }
        reproduct[monthKey][productID] += quantity;
    };

    const addSold= (monthKey, productID, quantity) => {
        if (!sold[monthKey][productID]) {
            sold[monthKey][productID] = 0;
        }
        sold[monthKey][productID] += quantity;
    };


    // Iterate through filtered purchases
    filteredPurchases.forEach(purchase => {
        const purchaseDate = new Date(purchase.purchaseDate);
        const month = purchaseDate.getMonth(); // Get the month (0-11)
        const year = purchaseDate.getFullYear(); // Get the year
        const monthKey = `${year}-${month}`; // Create a key for the month

        // Iterate through purchase items
        purchase.purchaseitems.forEach(item => {
            const rawMaterialID = item.rawMaterialID; // Get the raw material ID
            const quantity = item.quantity; // Get the quantity
            addToTotals(monthKey, rawMaterialID, quantity);
        });
    });

    // Now, consider replenish premixes from another source (e.g., props.replenishPremixes)
    if (props.replenishpremixes) {
        props.replenishpremixes.forEach(replenish => {
            const replenishDate = new Date(replenish.date); // Assuming replenishDate exists
            const month = replenishDate.getMonth(); // Get the month (0-11)
            const year = replenishDate.getFullYear(); // Get the year
            const monthKey = `${year}-${month}`; // Create a key for the month

            const premixID = replenish.premix;
            const quantity = replenish.quantity;


            replenish.premixes.premixingredients.forEach(ingredient => {
                const rawMaterialID = ingredient.rawMaterial; // Get the raw material ID
                const unitQuantity = ingredient.unitQuantity;
                let totalQuantity = quantity * unitQuantity;
                const typeQuantity = ingredient.rawmaterial.typeQuantity;
                if (ingredient.unit == 'g') {
                    totalQuantity /= 1000;
                }
                const toDeduct = totalQuantity / typeQuantity;
                deductToTotals(monthKey, rawMaterialID, toDeduct, premixID, quantity);
            });
        });
    }

    if (props.replenishproducts) {
        props.replenishproducts.forEach(replenish => {
            const replenishDate = new Date(replenish.date); // Assuming replenishDate exists
            const month = replenishDate.getMonth(); // Get the month (0-11)
            const year = replenishDate.getFullYear(); // Get the year
            const monthKey = `${year}-${month}`; // Create a key for the month

            const productID = replenish.product;
            const toDeduct = replenish.quantity;
            const replenishQuantity = replenish.products.productingredients[0].quantity;

            replenish.products.productingredients.forEach(ingredient => {
                const premixID = ingredient.premix; // Get the raw material ID
                addUsedpremix(monthKey, premixID, toDeduct);
            });
            addReproduct(monthKey, productID, replenishQuantity);
        });
    }

    if (props.sales) {
        props.sales.forEach(sale => {
            const saleDate = new Date(sale.salesDate); // Assuming replenishDate exists
            const month = saleDate.getMonth(); // Get the month (0-11)
            const year = saleDate.getFullYear(); // Get the year
            const monthKey = `${year}-${month}`; // Create a key for the month

            sale.saleitems.forEach(item => {
                const productID = item.truckloaditems.product; // Get the raw material ID
                const quantity = item.quantity;
                addSold(monthKey, productID, quantity);
            });
        });
    }

    return {
        totals,
        adds,
        deducts,
        repremix,
        usedpremix,
        reproduct,
        sold
    };
});


</script>
<style>
    .striped {
        border: 1px solid #ddd;
    }
    
    .striped > tr:nth-child(odd) {
        background: rgb(234, 235, 234);
    }

    .striped td > tr {
        background: transparent; /* Ensure nested <tr> do not get the striped background */
    }
</style>

<template>
    <Head title="Inventory Reports" />

    <AuthenticatedLayout>
        <article class="min-h-full p-5 bg-white rounded-lg flex flex-col">
            <!-- Top -->
            <div class="flex justify-between items-center">
                <div class="flex justify-between items-center gap-4">
                    <h3 class="font-bold">Inventory Reports</h3>
                    <div>
                        <InputLabel for="show" class="mb-2">Item: </InputLabel>
                        <select v-model="form.show" name="show" id="show" class="mt-1 w-[70%] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                            <option :value="'rawMaterials'">Raw Materials</option>
                            <option :value="'premixes'">Premixes</option>
                            <option :value="'products'">Products</option>
                        </select>
                    </div>
                    <div>
                        <InputLabel for="year" class="mb-2">Year: </InputLabel>
                        <select v-model="form.date" name="year" id="year" class="mt-1 w-[70%] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                            <option v-for="year in years" :value="year">{{ year }}</option>
                        </select>
                    </div>
                    <div>
                        <InputLabel for="month" class="mb-2">Month: </InputLabel>
                        <select v-model="form.month" name="month" id="month" class="mt-1 w-[70%] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                            <option :value="0">January</option>
                            <option :value="1">February</option>
                            <option :value="2">March</option>
                            <option :value="3">April</option>
                            <option :value="4">May</option>
                            <option :value="5">June</option>
                            <option :value="6">July</option>
                            <option :value="7">August</option>
                            <option :value="8">September</option>
                            <option :value="9">October</option>
                            <option :value="10">November</option>
                            <option :value="11">December</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="border-b border-gray-700 my-2 mb-5" />

            <!-- Bottom Table -->
            <div v-if="form.show=='rawMaterials'" v-for="supplier in suppliers" :key="supplier.id">{{ supplier.supplierName }}

<!-- Bottom Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs uppercase">
                            <tr>
                                <th scope="col" class="px-6 py-3">Raw Material Name</th>
                                <th scope="col" class="px-6 py-3">Type</th>
                                <th scope="col" class="px-6 py-3">Price</th>
                                <!-- <th scope="col" class="px-6 py-3">Exp Date</th> -->
                                <th scope="col" class="px-6 py-3">Purchased</th>
                                <th scope="col" class="px-6 py-3">Purchased Total</th>
                                <th scope="col" class="px-6 py-3">Used</th>
                                <th scope="col" class="px-6 py-3">Used Total</th>
                                <th scope="col" class="px-6 py-3">Net Quantity</th>

                            </tr>
                        </thead>
                        <tbody class="striped">
                            <tr v-for="rawMaterial in rawmaterials" :key="rawMaterial.id">
                                <td v-show="rawMaterial.supplierID===supplier.supplierID" class="px-6 py-4 w-[25%]"><span v-show="rawMaterial.supplierID===supplier.supplierID">{{ rawMaterial.rawMaterialName }}</span></td>
                                <td v-show="rawMaterial.supplierID===supplier.supplierID" class="px-6 py-4"><span v-show="rawMaterial.supplierID===supplier.supplierID">{{ rawMaterial.type }} x {{ rawMaterial.typeQuantity }} {{ rawMaterial.rawmaterialunits[0]?.unit }}</span></td>
                                <td v-show="rawMaterial.supplierID===supplier.supplierID" class="px-6 py-4"><span v-show="rawMaterial.supplierID===supplier.supplierID">{{ rawMaterial.rawmaterialunits[0]?.price }}</span></td>
                                <!-- <td v-show="rawMaterial.supplierID===supplier.supplierID" class="px-6 py-4"><span v-show="rawMaterial.supplierID===supplier.supplierID">--</span></td> -->
                                <!-- <td v-show="rawMaterial.supplierID===supplier.supplierID" class="px-6 py-4">
                                    <span v-show="rawMaterial.supplierID===supplier.supplierID" v-if="form.month!=0">{{ totalPurchasesByMonthAndMaterial.totals[form.date+'-'+(form.month-1)][rawMaterial.rawMaterialID] }}</span>
                                    <span v-show="rawMaterial.supplierID===supplier.supplierID" v-else-if="form.month==0 && form.date-1">{{ totalPurchasesByMonthAndMaterial.totals[(form.date-1)+'-'+11][rawMaterial.rawMaterialID] }}</span>    
                                </td> -->
                                <td v-show="rawMaterial.supplierID===supplier.supplierID" class="px-6 py-4">
                                    <span v-show="rawMaterial.supplierID===supplier.supplierID">{{ totalPurchasesByMonthAndMaterial.adds[form.date+'-'+(form.month)][rawMaterial.rawMaterialID] }}</span>    
                                </td>
                                <td v-show="rawMaterial.supplierID===supplier.supplierID" class="px-6 py-4">
                                    <span v-show="rawMaterial.supplierID===supplier.supplierID">{{ formatNumber(rawMaterial.rawmaterialunits[0].price*(totalPurchasesByMonthAndMaterial.adds[form.date+'-'+(form.month)][rawMaterial.rawMaterialID])) }}</span>    
                                </td>
                                <td v-show="rawMaterial.supplierID===supplier.supplierID" class="px-6 py-4">
                                    <span v-show="rawMaterial.supplierID===supplier.supplierID">{{ formatNumber(totalPurchasesByMonthAndMaterial.deducts[form.date+'-'+(form.month)][rawMaterial.rawMaterialID]) }}</span>
                                </td>
                                <td v-show="rawMaterial.supplierID===supplier.supplierID" class="px-6 py-4">
                                    <span v-show="rawMaterial.supplierID===supplier.supplierID">{{ formatNumber(rawMaterial.rawmaterialunits[0].price*(totalPurchasesByMonthAndMaterial.deducts[form.date+'-'+(form.month)][rawMaterial.rawMaterialID])) }}</span>
                                </td>
                                <td v-show="rawMaterial.supplierID===supplier.supplierID" class="px-6 py-4">
                                    <span v-show="rawMaterial.supplierID===supplier.supplierID">{{ formatNumber(totalPurchasesByMonthAndMaterial.totals[form.date+'-'+(form.month)][rawMaterial.rawMaterialID]) }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="overflow-x-auto" v-if="form.show=='premixes'">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs uppercase">
                        <tr>
                            <th scope="col" class="px-6 py-3">Premix Name</th>
                            <th scope="col" class="px-6 py-3">Cost</th>
                            <!-- <th scope="col" class="px-6 py-3">Exp Date</th> -->
                            <th scope="col" class="px-6 py-3">Replenished</th>
                            <th scope="col" class="px-6 py-3">Replenished Total</th>
                            <th scope="col" class="px-6 py-3">Used</th>
                            <th scope="col" class="px-6 py-3">Used Total</th>
                            <th scope="col" class="px-6 py-3">Net Quantity</th>
                        </tr>
                    </thead>
                    <tbody class="striped">
                        <tr v-for="premix in premixes" :key="premix.id">
                            <td class="px-6 py-4">{{ premix.premixName }}</td>
                            <td class="px-6 py-4">{{ premix.cost }}</td>
                            <td class="px-6 py-4">{{ totalPurchasesByMonthAndMaterial.repremix[form.date+'-'+(form.month)][premix.premixID] }}</td>
                            <td class="px-6 py-4">{{ formatNumber(premix.cost*(totalPurchasesByMonthAndMaterial.repremix[form.date+'-'+(form.month)][premix.premixID])) }}</td>
                            <td class="px-6 py-4">{{ totalPurchasesByMonthAndMaterial.usedpremix[form.date+'-'+(form.month)][premix.premixID] }}</td>
                            <td class="px-6 py-4">{{ formatNumber(premix.cost*(totalPurchasesByMonthAndMaterial.usedpremix[form.date+'-'+(form.month)][premix.premixID])) }}</td>
                            <td class="px-6 py-4">{{ formatQuantity(totalPurchasesByMonthAndMaterial.repremix[form.date+'-'+(form.month)][premix.premixID]-totalPurchasesByMonthAndMaterial.usedpremix[form.date+'-'+(form.month)][premix.premixID]) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="overflow-x-auto" v-if="form.show=='products'">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs uppercase">
                        <tr>
                            <th scope="col" class="px-6 py-3">Product Category</th>
                            <th scope="col" class="px-6 py-3">Product Name</th>
                            <!-- <th scope="col" class="px-6 py-3">Exp Date</th> -->
                            <th scope="col" class="px-6 py-3">Unit</th>
                            <th scope="col" class="px-6 py-3">Price</th>
                            <th scope="col" class="px-6 py-3">Replenished</th>
                            <th scope="col" class="px-6 py-3">Replenished Total</th>
                            <th scope="col" class="px-6 py-3">Sold</th>
                            <th scope="col" class="px-6 py-3">Sold Total</th>
                            <th scope="col" class="px-6 py-3">Net Quantity</th>
                        </tr>
                    </thead>
                    <tbody class="striped">
                        <tr v-for="product in products" :key="product.id">
                            <td class="px-6 py-4">{{ product.productcategories.categoryName }}</td>
                            <td class="px-6 py-4">{{ product.productName }}</td>
                            <td class="px-6 py-4">{{ product.unit }}</td>
                            <td class="px-6 py-4">{{ product.productprices[0]?.price }}</td>
                            <td class="px-6 py-4">{{ totalPurchasesByMonthAndMaterial.reproduct[form.date+'-'+(form.month)][product.productID] }}</td>
                            <td class="px-6 py-4">{{ formatNumber(product.productprices[0]?.price*totalPurchasesByMonthAndMaterial.reproduct[form.date+'-'+(form.month)][product.productID]) }}</td>
                            <td class="px-6 py-4">{{ totalPurchasesByMonthAndMaterial.sold[form.date+'-'+(form.month)][product.productID] }}</td>
                            <td class="px-6 py-4">{{ formatNumber(product.productprices[0]?.price*totalPurchasesByMonthAndMaterial.sold[form.date+'-'+(form.month)][product.productID]) }}</td>
                            <td class="px-6 py-4">{{ formatQuantity(totalPurchasesByMonthAndMaterial.reproduct[form.date+'-'+(form.month)][product.productID]-totalPurchasesByMonthAndMaterial.sold[form.date+'-'+(form.month)][product.productID]) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </article>
    </AuthenticatedLayout>
</template>