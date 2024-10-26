<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\PremixIngredient;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\RawMaterial;
use App\Models\ProductPrice;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductIngredient;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return Inertia::render('Admin/Products/Product', [
            'products' => Product::with(['products', 'productcategories'])->get(),
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
            'productcategories' => ProductCategory::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ProductPrice $price, Product $product)
    {
        $request->validate([
            'productCategory' => 'required|integer|exists:product_categories,categoryID',
            'productName' => 'required|string|max:25',
            'unit' => 'required|string|max:25',
            'quantity' => 'required|integer',
            'amount' => 'required|numeric',
            'criticalLevel' => 'required|integer',
            'area' => 'required|integer|exists:areas,areaID',
            'price' => 'required|numeric',
            'ingredients' => 'required|array',
        ]);

        $product = Product::create($request->only([
            'productCategory',
            'productName',
            'unit',
            'quantity',
            'amount',
            'criticalLevel',
        ]));

        ProductPrice::create([
            'area'=>$request->area,
            'product'=>$product->productID,
            'price'=>$request->price
        ]);

        foreach ($request->ingredients as $ingredientData) {
            ProductIngredient::create([
                'product' => $product->productID,
                'quantity' => $ingredientData['quantity'],
                'rawMaterial' => $ingredientData['rawMaterial'],
                'premix' => $ingredientData['premix'],
            ]);

            // Deduct the ingredient quantity from raw materials
            $rawMaterial = RawMaterial::find($ingredientData['rawMaterial']); // Ensure this is the correct model name
            if ($rawMaterial) {
                $rawMaterial->quantity -= $ingredientData['quantity']; // Subtracting the quantity
                $rawMaterial->save(); // Save the adjusted quantity back to the database
            }

            $premix = PremixIngredient::find($ingredientData['premix']);
            if ($premix) {
                $premix->quantity -= $ingredientData['quantity'];
                $premix->save();
            }
        }

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
        $productPrice = ProductPrice::where('product', $product->productID)->first();
        return Inertia::render('Admin/Products/EditProduct', [
            'product' => $product,
            'areas' => Area::all(),
            'productPrices' => $productPrice ? $productPrice->price : null,
            'productcategories' => ProductCategory::all(),
            'area' => $productPrice ? $productPrice->area : null,
            'productIngredients' => ProductIngredient::all(),
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'productCategory' => 'required|integer|exists:product_categories,categoryID',
            'productName' => 'required|string|max:25',
            'unit' => 'required|string|max:25',
            'quantity' => 'required|integer',
            'amount' => 'required|numeric',
            'criticalLevel' => 'required|integer',
            'area' => 'required|integer|exists:areas,areaID',
            'price' => 'required|numeric',
            'ingredients' => 'required|array',
            'productIngredients' => ProductIngredient::where('product', $product->productID),
        ]);

        // Update the product
        $product->update($request->only([
            'productCategory',
            'productName',
            'unit',
            'quantity',
            'amount',
            'criticalLevel',
        ]));

        // Update product price directly
        ProductPrice::where('product', $product->productID)
            ->update(['price' => $request->price, 'area' => $request->area]);

        // Update ingredients
        $product->ingredients()->delete(); // Clear existing ingredients

        foreach ($request->ingredients as $ingredientData) {
            ProductIngredient::create([
                'product' => $product->productID,
                'quantity' => $ingredientData['quantity'],
                'rawMaterial' => $ingredientData['rawMaterial'],
                'premix' => $ingredientData['premix'],
            ]);

            // Deduct the ingredient quantity from raw materials
            $rawMaterial = RawMaterial::find($ingredientData['rawMaterial']);
            if ($rawMaterial) {
                $rawMaterial->quantity += $ingredientData['quantity'];
                $rawMaterial->save();
            }

            $premix = PremixIngredient::find($ingredientData['premix']);
            if ($premix) {
                $premix->quantity += $ingredientData['quantity'];
                $premix->save();
            }
        }

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
