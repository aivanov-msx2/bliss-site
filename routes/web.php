<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\CsvController;
use App\Http\Controllers\WineController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () { return Inertia::render('Home'); })->name('home');
Route::get('/about', function () { return Inertia::render('About'); })->name('about');
Route::get('/wineclub', function () { return Inertia::render('WineClub'); })->name('wineclub');
Route::get('/contact', function () { return Inertia::render('Contact'); })->name('contact');
Route::get('/wholesale', function () { return Inertia::render('Wholesale'); })->name('wholesale');
Route::get('/privacy', function () { return Inertia::render('Privacy'); })->name('privacy');
Route::get('/terms', function () { return Inertia::render('Terms'); })->name('terms');

Route::resource('wines', WineController::class)->only(['index']);
Route::get('wines/{country}', [WineController::class, 'country'])->name('wines.country');
Route::get('winery/{winery}', [WineController::class, 'winery'])->name('wines.winery');
Route::get('wine/{winery}/{wine}', [WineController::class, 'wine'])->name('wines.wine');
Route::get('specSheet/{winery}/{wine}', [PdfController::class, 'specSheet'])->name('pdf.specSheet');
Route::get('shelfTalker/{winery}/{wine}/{showBottleImage}', [PdfController::class, 'shelfTalker'])->name('pdf.shelfTalker');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin', function () {return Inertia::render('Admin'); })->name('admin');
    Route::get('/pdf/pricebook/distributor',    [PdfController::class, 'pricebookDistributor'])->name('pdf.pricebook.distributor');
    Route::get('/pdf/pricebook/wholesale',      [PdfController::class, 'pricebookWholesale'])->name('pdf.pricebook.wholesale');
    Route::get('/csv/wine/download',      [CsvController::class, 'csvWineDownload'])->name('csv.wine.download');
    Route::put('/csv/wine/upload',      [CsvController::class, 'csvWineUpload'])->name('csv.wine.upload');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
});


require __DIR__.'/auth.php';
