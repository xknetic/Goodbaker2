<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\OrderForm;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class OrderFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Client/OrderForm', [
            'orderform' => OrderForm::all(),
            'products' => Product::with(['products'])->get(),
            'productcategories' => ProductCategory::all(),
        ]);

        // return Inertia::render('Admin/Products/Product', [
        //     'products' => Product::all()
        // ]);
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
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderForm $orderForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderForm $orderForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderForm $orderForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderForm $orderForm)
    {
        //
    }
}
