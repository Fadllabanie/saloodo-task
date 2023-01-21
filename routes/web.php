<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\ParcelController;
use App\Http\Controllers\Dashboard\OrderController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('parcels', ParcelController::class)->middleware('sender');

Route::group(['middleware' => 'biker'],function(){
    Route::get('orders', [OrderController::class,'index'])->name('orders.index');
    Route::get('my-orders', [OrderController::class,'myOrder'])->name('my.orders');
    Route::put('pick-up-parcel/{parcel}',[ OrderController::class,'pickUpParcel'])->name('pick_up.parcel');
    Route::put('drop-off-parcel/{parcel}',[ OrderController::class,'dropOffParcel'])->name('drop_off.parcel');
});
