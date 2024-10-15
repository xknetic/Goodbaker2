<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Premix;
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
        return Inertia::render('Admin/Premixes/CreatePremix');
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
            'cost' => 'required|numeric',
        ]);

        Premix::create($request->all());

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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Premix $premix)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Premix $premix)
    {
        //
    }
}
