<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Inertia\Inertia;
use App\Models\Premix;
use App\Models\Product;
use App\Models\RawMaterial;
use App\Models\ProductPrice;
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use App\Models\ProductCategory;
use App\Models\PremixIngredient;
use App\Models\ReplenishProduct;
use App\Models\ProductIngredient;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return Inertia::render('Admin/Products/Product', [
            'products' => Product::with(['productprices', 'productcategories', 'productingredients.premixes'])->get(),
            'productcategories' => ProductCategory::all(),
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
            'rawmaterials' => RawMaterial::all(),
            'premixes' => Premix::all(),
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

    public function replenish(Request $request)
    {
        $product = Product::with('productingredients.premixes')->find($request->productID);
        $quantityToAdd = $request->quantity;

        $product->increment('quantity', $quantityToAdd * $product->productingredients[0]->quantity);
    
        foreach($product->productingredients as $ingredient) {
            // Check if premix quantity is sufficient
            $premix = Premix::find($ingredient->premix);
            if ($premix->quantity >= $quantityToAdd) {

                $ingredientQuantity = $ingredient->quantity;
                // Increment product quantity based on ingredient quantity
        
                // Decrement the premix quantity
                $premix->decrement('quantity', $quantityToAdd);        
            }

            ReplenishProduct::create([
                'quantity' => $request->quantity,
                'product' => $product->productID
            ]);
        }
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
            'area' => $productPrice ? $productPrice->area : null,
            'productIngredients' => ProductIngredient::all(),
            'rawmaterials' => RawMaterial::all(),
            'premixes' => Premix::all(),
            'productcategories' => ProductCategory::all(),
            'productingredients' => ProductIngredient::with('premixes', 'rawMaterial')->get(),
            
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
            'criticalLevel' => 'required|integer',
            'area' => 'required|integer|exists:areas,areaID',
            'price' => 'required|numeric',
            'ingredients' => 'required|array',
        ]);

        // Update the product
        $product->update($request->only([
            'productCategory',
            'productName',
            'unit',
            'quantity',
            'criticalLevel',
        ]));

        // Update product price directly
        ProductPrice::where('product', $product->productID)
            ->update(['price' => $request->price, 'area' => $request->area]);

        // Update ingredients
        $product->productingredients()->delete(); // Clear existing ingredients

        foreach ($request->ingredients as $ingredientData) {
            $ingredientID = ProductIngredient::create([
                'product' => $product->productID,
                'unit' => $ingredientData['unit'],
                'quantity' => $ingredientData['quantity'],
            ]);
            if (is_array($ingredientData['rawMaterial'])) {
                ProductIngredient::where('productIngredientID', $ingredientID->productIngredientID)
                ->update(['rawMaterial' => $ingredientData['rawMaterial']['rawMaterialID']]);
            }else {
                ProductIngredient::where('productIngredientID', $ingredientID->productIngredientID)
                ->update(['rawMaterial' => $ingredientData['rawMaterial']]);
            }
            if (is_array($ingredientData['premix'])) {
                ProductIngredient::where('productIngredientID', $ingredientID->productIngredientID)
                ->update(['premix' => $ingredientData['premix']['premixID']]);
            }else {
                ProductIngredient::where('productIngredientID', $ingredientID->productIngredientID)
                ->update(['premix' => $ingredientData['premix']]);
            }

            // Deduct the ingredient quantity from raw materials
            $rawMaterial = RawMaterial::find($ingredientData['rawMaterial']);
            if ($rawMaterial) {
                $rawMaterial->typeQuantity += $ingredientData['quantity'];
                $rawMaterial->save();
            }

            $premix = Premix::find($ingredientData['premix']);
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

    public function export() 
    {
        // dd('Export function hit');
        return Excel::download(new ProductExport, 'products.xlsx');
    }
}
