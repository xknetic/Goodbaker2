<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Premix;
use App\Models\PremixIngredient;
use App\Models\RawMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PremixController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Admin/Premixes/Premix', [
            'premixes' => Premix::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Admin/Premixes/CreatePremix', [
            'rawmaterials' => RawMaterial::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'premixName' => 'required|string|max:25',
            'category' => 'required|string|max:25',
            'size' => 'required|string|max:25',
            'quantity' => 'required|integer',
            'cost' => 'required|numeric',
            'ingredients' => 'required|array',
        ]);

        $premixes = Premix::create($request->only([
            'premixName',
            'category',
            'size',
            'quantity',
            'cost',
        ]));

        if (!$premixes) {
            return redirect()->route('premixes.index');
        }

        foreach ($request->ingredients as $ingredientData) {
            PremixIngredient::create([
                'premix' => $premixes->premixID,
                'quantity' => $ingredientData['quantity'],
                'rawMaterial' => $ingredientData['rawMaterial'],
            ]);

            // Deduct the ingredient quantity from raw materials
            $rawMaterial = RawMaterial::find($ingredientData['rawMaterial']); // Ensure this is the correct model name
            if ($rawMaterial) {
                $rawMaterial->quantity -= $ingredientData['quantity']; // Subtracting the quantity
                $rawMaterial->save(); // Save the adjusted quantity back to the database
            }
        }

        return Redirect::route('premixes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Premix $premix)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Premix $premix)
    {
        //
        return Inertia::render('Admin/Premixes/EditPremix', [
            'premix' => $premix
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Premix $premix)
    {
        //
        $request->validate([
            'premixName' => 'required|string|max:25',
            'category' => 'required|string|max:25',
            'size' => 'required|string|max:25',
            'cost' => 'required|numeric',
        ]);

        $premix->update($request->all());
        return Redirect::route('premixes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Premix $premix)
    {
        //
        $premix->delete();
        sleep(1);

        return Redirect::route('premixes.index');
    }
}
