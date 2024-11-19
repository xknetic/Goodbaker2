<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Delivery;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\RawMaterial;
use App\Models\PurchaseItem;
use Illuminate\Http\Request;
use App\Models\RawMaterialUnit;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Admin/Purchases/Purchase', [
            'purchases' => Purchase::with(['suppliers', 'purchaseitems.rawmaterialunits'])->get(),
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
            'rawmaterials' => RawMaterial::with('rawmaterialunits', 'supplier')->get()
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
            'supplier',
            'status'
        ]));

        foreach ($request->purchases as $purchaseData) {
            PurchaseItem::create([
                'purchaseID' => $purchases->purchaseID,
                'rawMaterialID' => $purchaseData['rawMaterialID'],
                'quantity' => $purchaseData['quantity'],
                'unit' => $purchaseData['unit'],
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
         //
         $purchase->load(['purchaseitems.rawmaterials', 'purchaseitems.rawmaterialunits', 'suppliers']);

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
    public function update(Request $request, $purchaseID)
    {
        //
        $purchase = Purchase::with(['purchaseitems'])->find($purchaseID);
        if(!$purchase){
            return response()->json(['error' => 'undefined']);
        }
        $purchase->update($request->only([
            'status',
            'remarks',
        ]));

        if (($request->status == 'Completed') || ($request->status == 'Incomplete')) {
            foreach ($request->received as $key => $item) {
                $purchase = PurchaseItem::where('purchaseItemID', $key)->first();
                $raw = $purchase->rawMaterialID;
                PurchaseItem::where('purchaseItemID', $key)
                    ->update(['quantityReceived' => $item['quantityReceived']]);
                RawMaterialUnit::where('rawMaterial', $raw)->first()
                    ->increment('stock', $item['quantityReceived']-$purchase->quantityReceived);
            }
        }
    }

    // public function complete(Request $request)
    // {
    // $purchase = Purchase::with('purchaseitems')->find($request->purchaseID);

    // if (!$purchase) {
    //     return back()->withErrors(['message' => 'Purchase not found.']);
    // }

    // // Add each item from purchase items to the raw material table
    // foreach ($purchase->purchaseitems as $item) {
    //     RawMaterialUnit::where('rawMaterial', $item->rawMaterialID)
    //         ->where('rawMaterialUnitID', $item->unit)
    //         ->increment('stock', $item->quantity);

    // }

    // Purchase::where('purchaseID', $request->purchaseID)
    //     ->update(['status' => 'Completed']);
    

    // return back()->with('success', 'Purchase completed successfully.');
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
