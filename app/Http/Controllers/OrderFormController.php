<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\OrderForm;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
<<<<<<< HEAD
use Illuminate\Support\Facades\Redirect;
=======
>>>>>>> ccf9f6e (8/11)

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
<<<<<<< HEAD
            'products' => Product::with(['productprices', 'productcategories', 'ingredients', 'truckloaditems'])->get(),
=======
            'products' => Product::with(['products'])->get(),
>>>>>>> ccf9f6e (8/11)
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
        $request->validate([
            'customerName' => 'required|string|max:60',
            'customerAddress' => 'required|string|max:100',
            'customerContact' => 'required|string',
            'orderDate' => 'required|date',
            'products' => 'required|array',
        ]);
    
        // Create the order form
        $orderForm = OrderForm::create($request->only([
            'customerName',
            'customerAddress',
            'customerContact',
            'orderDate',
        ]));
    
        // Loop through products to create order items
        foreach ($request->products as $product) {
            OrderItem::create([
                'orderID' => $orderForm->orderID,
                'productID' => $product['productID'],
                'quantity' => $product['quantity'],
            ]);
        }

        return Redirect::route('orderform.index');

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
