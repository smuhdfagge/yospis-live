<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\PartnerController as AdminPartnerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/about/team', [AboutController::class, 'team'])->name('about.team');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/partners', [PartnerController::class, 'index'])->name('partners');

Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{article}', [NewsController::class, 'show'])->name('news.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/donate', [DonateController::class, 'index'])->name('donate');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

/*
|--------------------------------------------------------------------------
| Protected User Routes
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Articles Management
    Route::resource('articles', AdminArticleController::class)->except(['show']);
    Route::patch('articles/{article}/toggle-publish', [AdminArticleController::class, 'togglePublish'])
        ->name('articles.togglePublish');

    // Contacts Management
    Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::post('contacts/{contact}/reply', [AdminContactController::class, 'reply'])->name('contacts.reply');
    Route::delete('contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');
    Route::patch('contacts/{contact}/mark-read', [AdminContactController::class, 'markAsRead'])
        ->name('contacts.markAsRead');
    Route::post('contacts/mark-all-read', [AdminContactController::class, 'markAllAsRead'])
        ->name('contacts.mark-all-read');

    // Projects Management
    Route::resource('projects', AdminProjectController::class)->except(['show']);

    // Partners Management
    Route::resource('partners', AdminPartnerController::class)->except(['show']);
    Route::patch('partners/{partner}/toggle-active', [AdminPartnerController::class, 'toggleActive'])
        ->name('partners.toggleActive');

    // Gallery Management
    Route::resource('galleries', AdminGalleryController::class)->except(['show']);
    Route::patch('galleries/{gallery}/toggle-publish', [AdminGalleryController::class, 'togglePublish'])
        ->name('galleries.togglePublish');
});

require __DIR__.'/auth.php';
