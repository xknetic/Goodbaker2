<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Admin/Clients/Client', [
            'clients' => Client::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Admin/Clients/CreateClient');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'clientName' => 'required|string|max:50',
            'clientAddress' => 'required|string|max:100',
            // 'clientDate' => 'required|string',
        ]);

        Client::create($request->all());
        return Redirect::route('clients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
        return Inertia::render('Admin/Clients/EditClient', [
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
        $request->validate([
            'clientName' => 'required|string|max:50',
            'clientAddress' => 'required|string|max:100',
            'clientContact' => 'required|integer',
            // 'clientDate' => 'nullable|string',
        ]);

        $client->update($request->all());
        return Redirect::route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
        $client->delete();
        sleep(1);

        return Redirect::route('clients.index');
    }
}
