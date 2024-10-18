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
            'rawmaterials' => RawMaterial::with(['supplier'])->get(),
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
            'container' => 'required|string|max:25',
            'unit' => 'required|string|max:25',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'supplierID' => 'required|exists:suppliers,supplierID',
        ]);
    
        // Create the RawMaterial with the supplierID
        RawMaterial::create($request->only([
            'rawMaterialName',
            'container',
            'unit',
            'price',
            'quantity',
        ]) + ['supplierID' => $request->supplierID]);

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
    public function edit(RawMaterial $rawMaterial)
    {
        //
        return Inertia::render('Admin/RawMaterials/EditRawMaterial', [
            'rawMaterial' => $rawMaterial,
            'suppliers' => Supplier::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RawMaterial $rawMaterial)
    {
        //
        // $request->validate([
        //     'rawMaterialName' => 'required|string|max:25',
        //     'container' => 'required|string|max:25',
        //     'unit' => 'required|string|max:25',
        //     'price' => 'required|numeric',
        //     'quantity' => 'required|integer',
        //     'supplierID' => 'required|exists:suppliers,supplierID',
        // ]);

        // $rawMaterial->update($request->only([
        //     'rawMaterialName',
        //     'container',
        //     'unit',
        //     'price',
        //     'quantity',
        // ]) + ['supplierID' => $request->supplierID]);

        $request->validate([
            'rawMaterialName' => 'required|string|max:25',
            'container' => 'required|string|max:25',
            'unit' => 'required|string|max:25',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'supplierID' => 'required|exists:suppliers,supplierID',
        ]);

        $rawMaterial->update($request->only([
            'rawMaterialName',
            'container',
            'unit',
            'price',
            'quantity',
        ]) + ['supplierID' => $request->supplierID]);

        return Redirect::route('rawmaterials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RawMaterial $rawMaterial)
    {
        //
        $rawMaterial->delete();
        sleep(1);

        return Redirect::route('rawmaterials.index');
    }
}
