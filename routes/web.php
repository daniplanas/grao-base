<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Accounts\Settings;

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

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->
    group(function() {
    Route::view('dashboard', 'dashboard')
        ->name('dashboard');
    Route::prefix('profile')
        ->name('profile.')
        ->group(function() {
            Route::view('/', 'profile.profile')->name('profile');
            Route::view('alerts', 'profile.alerts')->name('alerts');
        });
    Route::prefix('account')
        ->name('account.')
        ->group(function () {
            Route::get('/settings', Settings::class)->name('settings');
            Route::redirect('/billing','/account/settings')->name('billing');
        });
});



require __DIR__.'/auth.php';
