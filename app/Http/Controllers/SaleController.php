<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SaleItem;
use Inertia\Inertia;
use App\Models\Truck;
use App\Models\SaleType;
use App\Models\TruckLoadItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Admin/Sales/Sales', [
            'sales' => Sale::with('deliveries', 'saletypes', 'trucks')->get(),
            'saleitems' => SaleItem::with('sale', 'product', 'truckLoadItem')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Admin/Sales/CreateSale', [
            'saletypes' => SaleType::all(),
            'trucks' => Truck::all(),
            'truckloaditems' => TruckLoadItem::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'salesDate' => 'required|date',
            'salesStatus' => 'required|string|max:15',
            'saleType' => 'required|exists:sale_types,saleTypeID',
            'deliveryID' => 'nullable|exists:deliveries,deliveryID',
        ]);

        $sales = Sale::create([
            'userName' =>auth()->user()->id,
            'salesDate' =>$request->salesDate,
            'salesStatus'=>$request->salesStatus,
            'saleType'=>$request->saleType,
            'deliveryID'=>$request->deliveryID,
        ]);

        if (!$sales) {
            return redirect()->route('deliveries.index');
        }

        // Loop through each product and create TruckLoadItem entries
        foreach ($request->products as $productData) {
            SaleItem::create([
                'salesID' => $sales->salesID,
                'quantity' => $productData['quantity'],
                'truckLoadItem' => $productData['truckLoadItems'],
            ]);

            // Deduct the ingredient quantity from raw materials
            $product = TruckLoadItem::find($productData['truckLoadItems']); // Ensure this is the correct model name
            if ($product) {
                $product->quantity -= $productData['quantity']; // Subtracting the quantity
                $product->save(); // Save the adjusted quantity back to the database
            }
        }

        return Redirect::route('sales.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
