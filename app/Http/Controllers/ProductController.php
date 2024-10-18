<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return Inertia::render('Admin/Products/Product', [
            'products' => Product::with(['products'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Admin/Products/CreateProduct', [
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
        //     'amount' => 'required|numeric',
        //     'criticalLevel' => 'required|integer',
        // ]);

        $request->validate([
            'productCategory' => 'required|string|max:25',
            'productName' => 'required|string|max:25',
            'unit' => 'required|string|max:25',
            'quantity' => 'required|integer',
            'amount' => 'required|numeric',
            'criticalLevel' => 'required|integer',
            'area' => 'required|integer|exists:areas,areaID',
            'product' => 'required|string',
            'price' => 'required|numeric',
        ]);

        Product::create($request->only([
            'productCategory',
            'productName',
            'unit',
            'quantity',
            'amount',
            'criticalLevel',
        ]));

        // Area::create($request->only(['areaName']));
        ProductPrice::create($request->only(['area', 'product' ,'price']));

        return Redirect::route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        return Inertia::render('Admin/Products/EditProduct', [
            'product' => $product,
            'areas' => Area::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
            'productCategory' => 'required|string|max:25',
            'productName' => 'required|string|max:25',
            'unit' => 'required|string|max:25',
            'quantity' => 'required|integer',
            'amount' => 'required|numeric',
            'criticalLevel' => 'required|integer',
            'area' => 'required|integer|exists:areas,areaID',
            'product' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $product->update($request->only([
            'productCategory',
            'productName',
            'unit',
            'quantity',
            'amount',
            'criticalLevel',
        ]));
    
        ProductPrice::updateOrCreate(
            ['area' => $request->area, 'product' => $request->product],
            ['price' => $request->price]
        );
    
        return Redirect::route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        sleep(1);

        return Redirect::route('products.index');
    }
}
