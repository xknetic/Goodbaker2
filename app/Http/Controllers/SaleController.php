<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Inertia\Inertia;
use App\Models\Truck;
use App\Models\Delivery;
use App\Models\SaleItem;
use App\Models\SaleType;
use Illuminate\Http\Request;
use App\Models\TruckLoadItem;
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
            'sales' => Sale::with(['delivery', 'saletype', 'truck'])->get(),
            'saleitems' => SaleItem::all(),
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
            'deliveries' => Delivery::with('trucks')->get(),
            'truckloaditems' => TruckLoadItem::with('products')->get()
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
            'deliveryID' => 'nullable|exists:deliveries,deliveryID',
        ]);

        $sales = Sale::create([
            'userName' =>auth()->user()->id,
            'salesDate' =>$request->salesDate,
            'salesStatus'=>$request->salesStatus,
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
                // 'truckLoadItem' => $productData['truckLoadItems'],
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
