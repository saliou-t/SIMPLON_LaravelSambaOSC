<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntrepriseController;

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

Route::get('/', [EntrepriseController::class,'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::get('/entreprise', [EntrepriseController::class,'index'])->name('entreprise.index');
Route::middleware(['auth'])->group(function () {

    Route::get('/entreprise/create', [EntrepriseController::class,'create'])->name('entreprise.create');
    Route::post('/entreprise/store', [EntrepriseController::class,'store'])->name('entreprise.store');
    Route::get('/entreprise/delete/{id}', [EntrepriseController::class,'delete'])->name('entreprise.delete');
});

require __DIR__.'/auth.php';
