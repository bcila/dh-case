<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ContactInfoController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/portfolio', [PageController::class, 'portfolio'])->name('portfolio');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'storeContact'])->name('contact.store');

// Admin routes
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/about/edit', [AboutController::class, 'edit'])->name('admin.about.edit');
    Route::put('/about/update', [AboutController::class, 'update'])->name('admin.about.update');
    Route::post('/about/hobby', [AboutController::class, 'addHobby'])->name('admin.about.hobby.add');
    Route::delete('/about/hobby/{index}', [AboutController::class, 'removeHobby'])->name('admin.about.hobby.remove');
    Route::post('/about/phobia', [AboutController::class, 'addPhobia'])->name('admin.about.phobia.add');
    Route::delete('/about/phobia/{index}', [AboutController::class, 'removePhobia'])->name('admin.about.phobia.remove');
    Route::post('/about/update', [AboutController::class, 'update'])->name('admin.about.update');
    Route::get('/messages', [ContactMessageController::class, 'index'])->name('admin.messages.index');
    Route::get('/messages/{message}', [ContactMessageController::class, 'show'])->name('admin.messages.show');
    Route::delete('/messages/{message}', [ContactMessageController::class, 'destroy'])->name('admin.messages.destroy');
    Route::resource('portfolio', PortfolioController::class)->names([
        'index' => 'admin.portfolio.index',
        'create' => 'admin.portfolio.create',
        'store' => 'admin.portfolio.store',
        'edit' => 'admin.portfolio.edit',
        'update' => 'admin.portfolio.update',
        'destroy' => 'admin.portfolio.destroy'
    ]);
    Route::get('/contact/edit', [ContactInfoController::class, 'edit'])->name('admin.contact.edit');
    Route::put('/contact/update', [ContactInfoController::class, 'update'])->name('admin.contact.update');
});

require __DIR__.'/auth.php';
