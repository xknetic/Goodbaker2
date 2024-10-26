<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Branch;
use App\Models\Premix;
use App\Models\Product;
use App\Models\Transfer;
use App\Models\RawMaterial;
use App\Models\TransferItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Admin/Transfers/TransferItems', [
            'transfers' => Transfer::with(['transferItems', 'branches'])->get(), 
            'transferitems' => TransferItem::with(['products'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Admin/Transfers/CreateTransferItems', [
            'branches' => Branch::all(),
            'products' => Product::all(),
            'premixes' => Premix::all(),
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
            'transferDate' => 'required',
            'branch' => 'required|exists:branches,branchID',
            'transferType' => 'required',
            'items' => 'required|array',
            'itemType'
        ]);

        $transfers = Transfer::create($request->only([
            'transferDate',
            'branch',
        ]));

        foreach ($request->items as $itemData) {
            if ($itemData['itemType']=='product') {
                TransferItem::create([
                    'transferID' => $transfers->transferID,
                    'product' => $itemData['item'],
                    'quantity' => $itemData['quantity'],
                ]);
            } else if ($itemData['itemType']=='premix') {
                TransferItem::create([
                    'transferID' => $transfers->transferID,
                    'premix' => $itemData['item'],
                    'quantity' => $itemData['quantity'],
                ]);
            } else {
                TransferItem::create([
                    'transferID' => $transfers->transferID,
                    'rawMaterial' => $itemData['item'],
                    'quantity' => $itemData['quantity'],
                ]);
            }
        }

        return Redirect::route('transfers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transfer $transfer)
    {
        //
        $transfer->load(['transferitems.products', 'transferitems.premixes', 'transferitems.rawmaterials', 'branches']);

        return Inertia::render('Admin/Transfers/TransferItemsViewMore', [
            'transfer' => $transfer,
            'transferItems' => $transfer->transferitems
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transfer $transfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transfer $transfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transfer $transfer)
    {
        //
    }
}
