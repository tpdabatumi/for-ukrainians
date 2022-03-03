<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;

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

Auth::routes([
    'register' => false,
    'reset' => false
]);

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [
            'localeSessionRedirect', 
            'localizationRedirect', 
            'localeViewPath'
        ]
    ], function() {
        Route::get('/', [ApplicationController::class, 'index'])
            ->name('index');
        Route::post('/', [ApplicationController::class, 'store'])
            ->name('store');
        Route::get('/applications', [ApplicationController::class, 'applications'])
            ->middleware('auth')
            ->name('applications');
});
