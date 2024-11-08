<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Supplier;
use App\Models\RawMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RawMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Admin/RawMaterials/RawMaterial', [
<<<<<<< HEAD
            'rawmaterials' => RawMaterial::with(['supplier', 'rawmaterialunits'])->get(),
            'suppliers' => Supplier::all(),
            // 'amount' => RawMaterial::max('price')
=======
            'rawmaterials' => RawMaterial::with(['supplier'])->get(),
            'suppliers' => Supplier::all(),
            'amount' => RawMaterial::max('price')
>>>>>>> ccf9f6e (8/11)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Admin/RawMaterials/CreateRawMaterial', [
            'suppliers' => Supplier::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'rawMaterialName' => 'required|string|max:25',
            'unit' => 'required|string|max:25',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'type' => 'required|string|max:25',
            'typeQuantity' => 'required|integer',
            'supplierID' => 'required|exists:suppliers,supplierID',
        ]);
    
        // Create the RawMaterial with the supplierID
        RawMaterial::create($request->only([
            'rawMaterialName',
            'type',
            'typeQuantity',
            'unit',
            'price',
            'quantity',
            'supplierID'
        ]));

        // Supplier::create($request->only(['supplierID']));

        return Redirect::route('rawmaterials.index');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RawMaterial $rawmaterial)
    {
        //
        return Inertia::render('Admin/RawMaterials/EditRawMaterial', [
            'rawMaterial' => $rawmaterial,
            'suppliers' => Supplier::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RawMaterial $rawmaterial)
    {
        //
        $request->validate([
            'rawMaterialName' => 'required|string|max:25',
            'type' => 'required|string|max:25',
            'typeQuantity' => 'required|integer',
            'unit' => 'required|string|max:25',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'supplierID' => 'required|exists:suppliers,supplierID',
        ]);

        $rawmaterial->update($request->only([
            'rawMaterialName',
            'type',
            'typeQuantity',
            'unit',
            'price',
            'quantity',
        ]) + ['supplierID' => $request->supplierID]);

        return Redirect::route('rawmaterials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RawMaterial $rawmaterial)
    {
        // Delete the raw material record
        $rawmaterial->delete();
        sleep(1);

        return Redirect::route('rawmaterials.index');
    }
}
