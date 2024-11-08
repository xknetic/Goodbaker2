<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Delivery;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\RawMaterial;
use App\Models\PurchaseItem;
use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Models\RawMaterialUnit;
=======
>>>>>>> ccf9f6e (8/11)

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Admin/Purchases/Purchase', [
<<<<<<< HEAD
            'purchases' => Purchase::with(['suppliers', 'purchaseitems.rawmaterialunits'])->get(),
=======
            'purchases' => Purchase::with(['suppliers', 'purchaseitems'])->get(),
>>>>>>> ccf9f6e (8/11)
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
<<<<<<< HEAD
            'rawmaterials' => RawMaterial::with('rawmaterialunits')->get()
=======
            'rawmaterials' => RawMaterial::all()
>>>>>>> ccf9f6e (8/11)
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
<<<<<<< HEAD
            'supplier',
            'status'
=======
            'supplier'
>>>>>>> ccf9f6e (8/11)
        ]));

        foreach ($request->purchases as $purchaseData) {
            PurchaseItem::create([
                'purchaseID' => $purchases->purchaseID,
                'rawMaterialID' => $purchaseData['rawMaterialID'],
                'quantity' => $purchaseData['quantity'],
<<<<<<< HEAD
                'unit' => $purchaseData['unit'],
=======
>>>>>>> ccf9f6e (8/11)
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
         //
<<<<<<< HEAD
         $purchase->load(['purchaseitems.rawmaterials', 'purchaseitems.rawmaterialunits']);
=======
         $purchase->load(['purchaseitems.rawmaterials']);
>>>>>>> ccf9f6e (8/11)

         return Inertia::render('Admin/Purchases/PurchaseViewMore', [
            'purchases' => $purchase,
            'purchaseitems' => $purchase->purchaseitems,
        ]);
<<<<<<< HEAD
=======

>>>>>>> ccf9f6e (8/11)
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

    public function complete(Request $request)
    {
    $purchase = Purchase::with('purchaseitems')->find($request->purchaseID);

    if (!$purchase) {
        return back()->withErrors(['message' => 'Purchase not found.']);
    }

    // Add each item from purchase items to the raw material table
    foreach ($purchase->purchaseitems as $item) {
        RawMaterialUnit::where('rawMaterial', $item->rawMaterialID)
            ->where('rawMaterialUnitID', $item->unit)
            ->increment('stock', $item->quantity);

    }

    Purchase::where('purchaseID', $request->purchaseID)
        ->update(['status' => 'Completed']);
    

    return back()->with('success', 'Purchase completed successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
