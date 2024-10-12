<?php

namespace App\Http\Controllers;

use App\Models\Premix;
use Illuminate\Http\Request;
use Inertia\Inertia;

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
