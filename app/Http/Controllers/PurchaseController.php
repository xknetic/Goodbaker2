<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Delivery;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\RawMaterial;
use App\Models\PurchaseItem;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Admin/Purchases/Purchase', [
            'purchases' => Purchase::with(['suppliers', 'purchaseitems'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Admin/Purchases/CreatePurchase', [
            'suppliers' => Supplier::all(),
            'rawmaterials' => RawMaterial::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'purchaseDate' => 'required|date|max:25',
            'supplier' => 'required|exists:suppliers,supplierID',
            'purchases' => 'required|array', 
        ]);

        $purchases = Purchase::create($request->only([
            'purchaseDate',
            'supplier'
        ]));

        foreach ($request->purchases as $purchaseData) {
            PurchaseItem::create([
                'purchaseID' => $purchases->purchaseID,
                'rawMaterialID' => $purchaseData['rawMaterialID'],
                'quantity' => $purchaseData['quantity'],
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
         //
         $purchase->load(['purchaseitems.rawmaterials']);

         return Inertia::render('Admin/Purchases/PurchaseViewMore', [
            'purchases' => $purchase,
            'purchaseitems' => $purchase->purchaseitems,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
