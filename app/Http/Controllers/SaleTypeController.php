<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\SaleType;
use Illuminate\Http\Request;

class SaleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Admin/Creates/SaleTypes/SaleType', [
            'saletypes' => SaleType::all()
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
        $request->validate([
            'saleTypeName' => 'required|string|max:30',
        ]);

        SaleType::create($request->all());

        return redirect()->to(url()->current());
    }

    /**
     * Display the specified resource.
     */
    public function show(SaleType $saleType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SaleType $saleType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SaleType $saleType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SaleType $deliverytype)
    {
        //
        $deliverytype->delete();
        sleep(1);
    }
}
