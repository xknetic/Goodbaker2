<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Inertia\Inertia;
use App\Models\Premix;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\RawMaterial;
use Illuminate\Http\Request;
use App\Models\InventoryReport;
use App\Models\ReplenishPremix;
use App\Models\ReplenishProduct;

class InventoryReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Admin/InventoryReports/InvReport', [
            'inventoryreports' => InventoryReport::all(),
            'rawmaterials' => RawMaterial::with(['supplier', 'rawmaterialunits', 'premixingredients.premix'])->get(),
            'suppliers' => Supplier::all(),
            'purchases' => Purchase::with(['purchaseitems'])->get(),
            'replenishpremixes' => ReplenishPremix::with(['premixes.premixingredients.rawmaterial'])->get(),
            'premixes' => Premix::all(),
            'replenishproducts' => ReplenishProduct::with(['products.productingredients.premixes'])->get(),
            'products' => Product::with(['productcategories', 'productprices'])->get(),
            'sales' => Sale::with(['saleitems.truckloaditems.products'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(InventoryReport $inventoryReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InventoryReport $inventoryReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InventoryReport $inventoryReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InventoryReport $inventoryReport)
    {
        //
    }
}
