<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrinterController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Livewire\AsignarComponent;
use App\Http\Livewire\PermisosComponent;
use App\Http\Livewire\CoinsComponent;
use App\Http\Livewire\Categories;
use App\Http\Livewire\EditProductsComponent;
use App\Http\Livewire\ProductsComponent;
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

Route::get('/', function () {
    return view('home');
});

Route::get('categories', Categories::class);
Route::get('products', ProductsComponent::class);
Route::get('users', UsersComponent::class);
Route::get('pos', PosComponent::class);
Route::get('coins', CoinsComponent::class);
Route::get('roles', RolesComponent::class);
Route::get('permisos', PermisosComponent::class);
Route::get('asignar', AsignarComponent::class);
Route::get('add_product', CreateProductsComponent::class);
Route::get('new_purchase', PurchaseComponent::class);
Route::get('product/{id}', EditProductsComponent::class);
//rutas impresion
Route::get('print/sale/{id}','PrinterController@TicketVenta');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';