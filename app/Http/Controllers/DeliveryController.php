<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Truck;
use App\Models\Client;
use App\Models\Driver;
use App\Models\LoadIn;
use App\Models\Product;
use App\Models\BadOrder;
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
            'truckDriver',
            'client',
            'route'
        ])+ [
            'saleType' => $request->input('saleType.saleTypeId'),]);

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

    public function loadIn(Request $request, Delivery $delivery)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.truckLoadItemID' => 'required|exists:truck_load_items,truckLoadItemID',
            'items.*.badOrderQuantity' => 'required|integer|min:0',
            'items.*.bOName' => 'nullable|string|max:255',
        ]);
    
        foreach ($request->items as $item) {
            // Find the truck load item
            $truckLoadItem = TruckLoadItem::find($item['truckLoadItemID']);
            
            // Deduct the bad order quantity from the TruckLoadItem
            if ($truckLoadItem) {
                // Calculate remaining quantity after deducting the bad order quantity
                $remainingQuantity = $truckLoadItem->quantity - $item['badOrderQuantity'];

                // Save the bad order quantity in the `bad_orders` table
                BadOrder::create([
                    'bOName' => $item['bOName'], // Assuming you have a product relation in TruckLoadItem
                    'quantity' => $item['badOrderQuantity'],
                ]);
                
                // Deduct the bad order quantity from the TruckLoadItem
                $truckLoadItem->quantity = $remainingQuantity;
                $truckLoadItem->save();

                LoadIn::create([
                    'deliveryID' => $delivery->deliveryID,
                    'product' => $truckLoadItem->product,
                    'quantity' => $remainingQuantity,
                ]);
                
                // Adjust the product stock (if needed)
                $product = Product::find($truckLoadItem->product);
                if ($product) {
                    $product->quantity += $remainingQuantity; // Add bad order quantity back to product stock
                    $product->save();
                }

                // // Deduct the bad order quantity
                // $truckLoadItem->quantity -= $item['badOrderQuantity'];
                // // Store the original quantity before deduction
                // $originalQuantity = $truckLoadItem->quantity;
                // $truckLoadItem->save();
    
                // // Find the corresponding product
                // $product = Product::find($truckLoadItem->product); // Adjust this if the relation is different
                
                // // Add the current quantity of the TruckLoadItem to the product's quantity
                // if ($product) {
                //     $product->quantity += $originalQuantity; // Add the original quantity (before deduction)
                //     $product->save();
                // }
            }
    
            // Now delete all truck load items for this delivery
            // TruckLoadItem::where('deliveryID', $delivery->deliveryID)->delete();
        }
    
        return redirect()->route('deliveries.index');
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
