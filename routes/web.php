<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Models\Produto;

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

/* Route::get('/', function () {
    return view('welcome');
}); */
 Route::get('/', [ProdutoController::class, 'mostrar_produtos'])->name('mostrar.produto');
 Route::get('/produtos/{id}', [ProdutoController::class, 'show']);/* ->name('mostrar.produto'); */


Route::group(['middleware' => ['auth:sanctum', 'verified']], function (){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
   Route::get('/cadastrar/produtos', [ProdutoController::class, 'cadastrar_produto'])->name('cadastrar.produto');
   Route::post('/cadastrar', [ProdutoController::class, 'store']);


});
