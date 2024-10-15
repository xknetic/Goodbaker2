<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Admin/Suppliers/Supplier', [
            'suppliers' => Supplier::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Admin/Suppliers/CreateSupplier');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'supplierName' => 'required|string|max:50',
            'address' => 'required|string|max:100',
            'contactNumber' => 'required|string|size:11',
        ]);

        Supplier::create($request->all());
        return Redirect::route('suppliers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
        return Inertia::render('Admin/Suppliers/EditSupplier', [
            'supplier' => $supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
        $request->validate([
            'supplierName' => 'required|string|max:50',
            'address' => 'required|string|max:100',
            'contactNumber' => 'required|string|size:11',
        ]);

        $supplier->update($request->all());
        return Redirect::route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
        $supplier->delete();
        sleep(1);

        return Redirect::route('suppliers.index');
    }
}
