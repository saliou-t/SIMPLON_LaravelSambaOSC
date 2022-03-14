<?php

use App\Models\Pays;
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

Route::get('/', function () {

    $pays = Pays::all();
    return view('welcome', [
        'pays' => $pays
    ]);
});

Route::get('/entreprise', [EntrepriseController::class,'index'])->name('entreprise.index');

Route::get('/entreprise/create', [EntrepriseController::class,'create'])->name('entreprise.create');
Route::post('/entreprise/store', [EntrepriseController::class,'store'])->name('entreprise.store');
Route::get('/entreprise/delete/{id}', [EntrepriseController::class,'delete'])->name('entreprise.delete');
