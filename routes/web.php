<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/contact', function() {
    return Redirect::to('/');
});
Route::get('/a-propos', function() {
    return Redirect::to('/');
});
Route::get('/projets', function() {
    return Redirect::to('/');
});
Route::get('/localisation', function() {
    // dd('test');
    return view('pages.map');
})->name('localisation');

// Route::get('/pwd-generator/{password}', function($password) {
//     return Hash::make($password);
// });

// Route::get('/{url}', function($url) {
//     return Redirect::to('/');
// });

require __DIR__.'/auth.php';