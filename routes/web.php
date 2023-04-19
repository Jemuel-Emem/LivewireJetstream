<?php

use App\Http\Livewire\Userproducttable;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
//  })->name('dashboard');

//  Route::get('/userdashboard', function () {
//     return view('userdashboard');
//  })->name('userdashboard');

 Route::middleware([
     'auth:sanctum',
     config('jetstream.auth_session'),
     'verified'
 ])->group(function () {
      Route::get('/dashboard', function () {
       if (auth()->user()->is_admin == 1) {
        return redirect()->route('admin-dashboard');
       }else{
        return redirect()->route('user-dashboard');
       }
      })->name('userdashboard');

 });


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/userdashboard', function () {
//         return view('userdashboard');
//     })->name('userdashboard');

// });

Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('admin-dashboard');

    Route::get('/orderlist', function(){
        return view('orderlist');
})->name('orderlist');

Route::get('/messages', function(){
    return view('messages-table');
})->name('messages');
});

Route::prefix('user')->middleware('user')->group(function(){
Route::get('/dashboard', function(){
        return view('userdashboard');
    })->name('user-dashboard');

Route::get('/cart', function(){
        return view('cart');
})->name('cart');

Route::get('/order', function(){
    return view('order');
})->name('order');

Route::get('/messages', function(){
    return view('messages-table');
})->name('messages');
});
