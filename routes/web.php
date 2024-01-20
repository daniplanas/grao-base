<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Accounts\Settings;
use App\Livewire\Users\UserSetting;
use App\Http\Controllers\Controller;
use App\Livewire\Users\IndexUser;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::view('/', 'profile.profile')->name('profile');
        Route::view('alerts', 'profile.alerts')->name('alerts');
    });

    Route::prefix('account')->name('account.')->group(function () {
        Route::get('/settings', Settings::class)->name('settings');
        Route::redirect('/billing', '/account/settings')->name('billing');
    });

    Route::get('/base/create/{id?}', UserSetting::class)->name('user.create');
    Route::get('/base', IndexUser::class)->name('user.index');
    Route::delete('/base/delete/{user}', [UserSetting::class, 'destroy'])->name('user.destroy');
});

require __DIR__.'/auth.php';
