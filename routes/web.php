<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\PremixController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BeverageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleTypeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\OrderFormController;
use App\Http\Controllers\RawMaterialController;
use App\Http\Controllers\SalesReportController;
use App\Http\Controllers\TransferItemController;
use App\Http\Controllers\PurchaseReturnController;
use App\Http\Controllers\InventoryReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/orderform', OrderFormController::class);

Route::resource('/users', UserController::class)
->middleware(['auth', 'role:admin']);

Route::resource('/branches', BranchController::class)
->middleware(['auth', 'role:admin|branch']);

Route::resource('/sales', SaleController::class)
->middleware(['auth', 'role:admin|agent']);

// Route::resource('/sales/create', SaleItemController::class)
// ->middleware(['auth', 'role:admin']);

Route::resource('/deliveries', DeliveryController::class)
->middleware(['auth', 'role:admin|agent']);

Route::post('/deliveries/{delivery}/load-in', [DeliveryController::class, 'loadIn'])->name('deliveries.loadIn');

Route::resource('/products', ProductController::class)
->middleware(['auth', 'role:admin']);

Route::resource('/premixes', PremixController::class)
->middleware(['auth', 'role:admin']);

Route::resource('/beverage', BeverageController::class)
->middleware(['auth', 'role:admin']);

Route::resource('/rawmaterials', RawMaterialController::class)
->middleware(['auth', 'role:admin']);

Route::resource('/clients', ClientController::class)
->middleware(['auth', 'role:admin']);

Route::resource('/suppliers', SupplierController::class)
->middleware(['auth', 'role:admin']);

Route::resource('/purchases', PurchaseController::class)
->middleware(['auth', 'role:admin']);
Route::post('/purchases/complete', [PurchaseController::class, 'complete'])->name('purchases.complete');


Route::resource('/salesreports', SalesReportController::class)
->middleware(['auth', 'role:admin']);

Route::resource('/inventoryreports', InventoryReportController::class)
->middleware(['auth', 'role:admin']);

Route::resource('/purchasereturns', PurchaseReturnController::class)
->middleware(['auth', 'role:admin']);

Route::resource('/transfers', TransferController::class)
->middleware(['auth', 'verified']);



// Creates
Route::resource('/areas', AreaController::class)
->middleware(['auth', 'role:admin']);

Route::resource('/categories', CategoryController::class)
->middleware(['auth', 'role:admin']);

// Route::post('/products/create', [AreaController::class, 'store'])
//     ->name('areas.store') // Give it a name
//     ->middleware(['auth', 'role:admin']);

// Route::post('/products/create', [CategoryController::class, 'store'])
//     ->name('categories.store') // Give it a name
//     ->middleware(['auth', 'role:admin']);

Route::resource('/trucks', TruckController::class)
->middleware(['auth', 'role:admin']);

Route::resource('/drivers', DriverController::class)
->middleware(['auth', 'role:admin']);

Route::resource('/deliverytypes', SaleTypeController::class)
->middleware(['auth', 'role:admin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
