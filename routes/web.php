<?php

use Illuminate\Support\Facades\Route;
 
use App\Http\Controllers\EscolaController;
 
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
    return view('auth/login');
});

Route::get('/escolas', function () {
    return view('escolas');
})->middleware(['auth'])->name('escolas');

require __DIR__.'/auth.php';


Route::resource('escolas', EscolaController::class);


Route::prefix('escolas')->group(function () {
    Route::get('index', [EscolaController::class, 'index']);
    Route::post('adc_local', [EscolaController::class, 'adc_local'])->name('escolas.adc_local');
    Route::post('adc_escola', [EscolaController::class, 'adc_escola'])->name('escolas.adc_escola');;
    Route::post('edit', [EscolaController::class, 'edit']);
    Route::delete('destroy', [EscolaController::class, 'destroy']);

});

Route::get('/localizacao',function(){
    
     return view('escolas.localizacao');
});

 