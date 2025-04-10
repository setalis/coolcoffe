<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\Admin\CoffeeManagementController;
use App\Livewire\CoffeeForm;
use App\Livewire\CoffeeOrderForm;

// Публичные маршруты
Route::get('/', [CoffeeController::class, 'index'])->name('home');
Route::get('/coffee', [CoffeeController::class, 'index'])->name('coffee.index');
Route::get('/coffee/{coffee}/order', CoffeeOrderForm::class)->name('coffee.order');
Route::get('/thanks', function() {
    return view('coffee.thanks');
})->name('thanks');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    // Административные маршруты для управления кофе
    Route::get('/admin/coffee', [CoffeeController::class, 'adminIndex'])->name('admin.coffee.index');
    Route::get('/admin/coffee/orders', [CoffeeManagementController::class, 'orders'])->name('admin.coffee.orders');
    Route::get('/admin/coffee/view_order/{id}', [CoffeeManagementController::class, 'viewOrder'])->name('admin.coffee.view_order');
    Route::get('/admin/coffee/create', CoffeeForm::class)->name('admin.coffee.create');
    Route::get('/admin/coffee/{coffee}/edit', CoffeeForm::class)->name('admin.coffee.edit');
    Route::delete('/admin/coffee/{coffee}', [CoffeeController::class, 'destroy'])->name('admin.coffee.destroy');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
