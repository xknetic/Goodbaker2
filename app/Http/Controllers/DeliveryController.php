<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Truck;
use App\Models\Client;
use App\Models\Driver;
use App\Models\Product;
use App\Models\Delivery;
use App\Models\SaleType;
use Illuminate\Http\Request;
use App\Models\TruckLoadItem;
use Illuminate\Support\Facades\Redirect;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Admin/Deliveries/Delivery', [
            'deliveries' => Delivery::with(['trucks', 'drivers', 'clients', 'saletypes', 'truckloaditems', 'users'])->get(),
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $agents = User::whereHas('roles', function ($query) {
        // $query->where('name', 'agent'); // Assuming 'name' is the correct column
        // })->get();

        // // Pass the agents to your view
        // return view('your_view_name', compact('agents')); // Adjust to your view name

        return Inertia::render('Admin/Deliveries/DeliveryLoad', [
            'saletypes' => SaleType::all(),
            'trucks' => Truck::all(),
            'drivers' => Driver::all(),
            'clients' => Client::all(),
            'products' => Product::with(['productprices'])->get(),
            'users' => User::with('roles')->get(),
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            // 'salesDate' => 'required|date|max:25',
            // 'truck' => 'required|exists:trucks,truckID',
            // 'saleType' => 'required|exists:sale_types,saleTypeID',
            // 'truckDriver' => 'required|exists:drivers,driverID',
            // 'client' => 'required|exists:clients,clientID',
            // 'products' => 'required|array', 
        ]);

        $deliveries = Delivery::create($request->only([
            'agent',
            'salesDate',
            'truck',
            'saleType',
            'truckDriver',
            'client',
            
        ]));

        if (!$deliveries) {
            return redirect()->route('deliveries.index');
        }
    
        // Loop through each product and create TruckLoadItem entries
        foreach ($request->products as $productData) {
            TruckLoadItem::create([
                'deliveryID' => $deliveries->deliveryID,
                'product' => $productData['productID'],
                'quantity' => $productData['quantity'],
            ]);

            // Deduct the ingredient quantity from raw materials
            $product = Product::find($productData['productID']); // Ensure this is the correct model name
            if ($product) {
                $product->quantity -= $productData['quantity']; // Subtracting the quantity
                $product->save(); // Save the adjusted quantity back to the database
            }
        }
    
        return Redirect::route('deliveries.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Delivery $delivery)
    {
        //
        $delivery->load(['trucks', 'drivers', 'clients', 'saletypes', 'truckloaditems.products.productprices']);

        return Inertia::render('Admin/Deliveries/DeliveryViewMore', [
            'deliveries' => $delivery,
            'trucks' => $delivery->trucks,
            'truckloaditems' => $delivery->truckloaditems,
            'products' => Product::with(['productprices'])->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delivery $delivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Delivery $delivery)
    {
        //
        $validatedData = $request->validate([
            'itemDelete' => 'array', // Ensure itemDelete is an array
        ]);

        $itemsToDelete = $validatedData['itemDelete'] ?? [];
        if(!empty($itemsToDelete)) {
            TruckLoadItem::whereIn('truckLoadItemID', $itemsToDelete)
            ->where('deliveryID', $delivery->deliveryID) // Ensure these items belong to the specific delivery
            ->delete();
        }

        foreach ($request->products as $itemData) {
            TruckLoadItem::create([
                'deliveryID' => $delivery->deliveryID,
                'product' => $itemData['productID'],
                'quantity' => $itemData['quantity'],
            ]);
        }

        return Inertia::location(request()->fullUrl());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delivery $delivery)
    {
        //
    }
}
