<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Admin/Products/Product', [
            'productPrices' => ProductPrice::with(['products', 'areas'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Admin/Products/CreateProduct', [
            'products' => Product::all(),
            'areas' => Area::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $request->validate([
        //     'productCategory' => 'required|string|max:25',
        //     'productName' => 'required|string|max:25',
        //     'unit' => 'required|string|max:25',
        //     'quantity' => 'required|integer',
        //     'criticalLevel' => 'required|integer',
        //     'price' => 'required|numeric',
        //     'amount' => 'required|numeric',
        // ]);

        // $request->validate([
        //     'product' => 'required|exists:products,productID',
        //     'area' => 'required|exists:areas,areaID',
        //     'price' => 'required|numeric',
        // ]);

        // ProductPrice::create($request->all());
        
        // return Redirect::route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
