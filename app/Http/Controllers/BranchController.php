<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Imports\BranchImport;
use App\Imports\DailySalesTransactionImport;
use App\Imports\GuestCountImport;
use App\Imports\SalesTransactionCountImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;
use App\Imports\SalesTransactionDiscountChargeImport;
use App\Imports\SalesTransactionImport;
use App\Imports\SalesTransactionJournalImport;
use App\Models\DailySalesTransaction;
use App\Models\GuestCount;
use App\Models\SalesTransaction;
use App\Models\SalesTransactionCount;
use App\Models\SalesTransactionDiscountCharge;
use App\Models\SalesTransactionJournal;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Admin/Branches/Branches', [
            'branches' => Branch::with('users')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Admin/Branches/CreateBranches');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            // 'branchName' => 'required|string|max:25',
            // 'contactPerson' => 'required|integer|exists:users,id',
            // 'contact' => 'required|string',
        ]);

        Branch::create($request->all());

        return Redirect::route('branches.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        //
        $salesTransactions = SalesTransaction::all();
        $journals = SalesTransactionJournal::all();
        $dailysales = DailySalesTransaction::all();
        $counts = SalesTransactionCount::all();
        $guestcounts = GuestCount::all();
        $discountcharges = SalesTransactionDiscountCharge::all();

        return Inertia::render('Admin/Branches/BranchSales', [
            'branches' => $branch,
            'salestransactions' => $salesTransactions,
            'journals' => $journals,
            'dailysales' => $dailysales,
            'counts' => $counts,
            'guestcounts' => $guestcounts,
            'discountcharges' => $discountcharges,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        //
    }

    // public function importBranches(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required|mimes:csv,txt', // Validation for CSV file
    //     ]);

    //     $path = $request->file('file')->store('temp');

    //     // Import the CSV file into the Branch model
    //     Excel::import(new BranchImport, storage_path('app/'.$path));

    //     return redirect()->route('branches.index')->with('success', 'Branches imported successfully!');
    // }

    public function csvimports()
    {
        return Inertia::render('Admin/Branches/CsvImports');
    }

    /**
     * Import Sales Transaction data from an Excel file.
     */
    public function importSalesTransactionDiscountCharges(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        $path = $request->file('file')->store('temp');

        $branch = Branch::find($request->branch);

        // Import the data
        Excel::import(new SalesTransactionDiscountChargeImport($branch->branchID), storage_path('app/'.$path));

        return redirect()->route('branches.index')->with('success', 'Branches imported successfully!');
    }


    public function importGuestCounts(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        $path = $request->file('file')->store('temp');

        $branch = Branch::find($request->branch);

        // Import the data
        Excel::import(new GuestCountImport($branch->branchID), storage_path('app/'.$path));

        return redirect()->route('branches.index')->with('success', 'Branches imported successfully!');
    }


    public function importSalesTransactionCounts(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        $path = $request->file('file')->store('temp');

        $branch = Branch::find($request->branch);

        // Import the data
        Excel::import(new SalesTransactionCountImport($branch->branchID), storage_path('app/'.$path));

        return redirect()->route('branches.index')->with('success', 'Branches imported successfully!');
    }


    public function importDailySalesTransactions(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        $path = $request->file('file')->store('temp');

        $branch = Branch::find($request->branch);

        // Import the data
        Excel::import(new DailySalesTransactionImport($branch->branchID), storage_path('app/'.$path));

        return redirect()->route('branches.index')->with('success', 'Branches imported successfully!');
    }


    public function importSalesTransactions(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        $path = $request->file('file')->store('temp');

        $branch = Branch::find($request->branch);

        // Import the data
        Excel::import(new SalesTransactionImport($branch->branchID), storage_path('app/'.$path));

        return redirect()->route('branches.index')->with('success', 'Branches imported successfully!');
    }


    public function importSalesTransactionJournals(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        $path = $request->file('file')->store('temp');

        $branch = Branch::find($request->branch);

        // Import the data
        Excel::import(new SalesTransactionJournalImport($branch->branchID), storage_path('app/'.$path));

        return redirect()->route('branches.index')->with('success', 'Branches imported successfully!');
    }
}
