<?php

use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// routes/web.php

Route::get('/', [SearchController::class, 'index']);
Route::get('/search', [SearchController::class, 'search'])->name('search');
