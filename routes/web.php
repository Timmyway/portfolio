<?php

use App\Http\Controllers\SiteController;
use App\Http\Middleware\ForceHttps;
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

Route::middleware(['web', ForceHttps::class])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/contact', [SiteController::class, 'backHome']);
    Route::get('/a-propos', [SiteController::class, 'backHome']);
    Route::get('/projets', [SiteController::class, 'backHome']);
    Route::get('/localisation', function() {
        return view('pages.map');
    })->name('localisation');

    Route::get('/vitrine-clients', function() {
        return view('pages.showcase');
    })->middleware('auth')->name('showcase');

    require __DIR__.'/auth.php'; // Include authentication routes
});

// Route::get('/pwd-generator/{password}', function($password) {
//     return Hash::make($password);
// });

// Route::get('/{url}', function($url) {
//     return Redirect::to('/');
// });
