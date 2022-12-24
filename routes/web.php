<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\ExportController;
use App\Exports\SaleExport;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Livewire\AsignarComponent;
use App\Http\Livewire\CashoutComponent;
use App\Http\Livewire\ClientsComponent;
use App\Http\Livewire\InventoryComponent;
use App\Http\Livewire\PermisosComponent;
use App\Http\Livewire\CoinsComponent;
use App\Http\Livewire\Categories;
use App\Http\Livewire\EditProductsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\PurchaseListComponent;
use App\Http\Livewire\ProductsComponent;
use App\Http\Livewire\SupliersComponent;
use App\Http\Livewire\MSellerProductComponent;
use App\Http\Livewire\ManageInvoiceComponent;
use App\Http\Livewire\lastProductsComponent;
use App\Http\Livewire\ProfileComponent;
use App\Http\Livewire\PurchaseComponent;
use App\Http\Livewire\RolesComponent;
use App\Http\Livewire\UsersComponent;
use App\Http\Livewire\PosComponent;
use App\Http\Livewire\CreateProductsComponent;
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

/*
Route::get('/', function () {
    return Inertia::render('home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
*/


Route::middleware('auth')->group(function () {

Route::get('/', HomeComponent::class);
Route::get('categories', Categories::class);
Route::get('products', ProductsComponent::class);
Route::get('users', UsersComponent::class);
Route::get('supliers', SupliersComponent::class);
Route::get('customers', ClientsComponent::class);
Route::get('pos', PosComponent::class);
Route::get('profile', PosComponent::class);
Route::get('coins', CoinsComponent::class);
Route::get('roles', RolesComponent::class);
Route::get('business_profile', ProfileComponent::class);
Route::get('permisos', PermisosComponent::class);
Route::get('asignar', AsignarComponent::class);
Route::get('purchases_report', PurchaseListComponent::class );
Route::get('sales_report', CashoutComponent::class);
Route::get('purchase_list', PurchaseListComponent::class);
Route::get('inventory_report', InventoryComponent::class);
Route::get('products_mas_vendidos_report', MSellerProductComponent::class);
Route::get('manage_invoice', ManageInvoiceComponent::class);
Route::get('add_product', CreateProductsComponent::class);
Route::get('business_profile', ProfileComponent::class);
Route::get('new_purchase', PurchaseComponent::class);
Route::get('product/{id}', EditProductsComponent::class);
Route::get('pos/{product}', PosComponent::class);

//rutas impresion
Route::get('print/sale/{id}','PrinterController@TicketVenta');
//Exportar a pdf

});
//report Test
Route::get('report/pdf/', [ExportController::class, 'reportTest']);


//reportes PDF
Route::get('report/pdf/{user}/{type}/{f1}/{f2}', [ExportController::class, 'reportPDF']);
Route::get('report/pdf/{user}/{type}/', [ExportController::class, 'reportPDF']);

//reportes EXCEL
Route::get('report/excel/{user}/{type}/{f1}/{f2}', [SaleExport::class, 'reportExcel']);
Route::get('report/excel/{user}/{type}', [SaleExport::class, 'reportExcel']);


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';