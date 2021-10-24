<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FornecedorController;
use App\Models\Fornecedor;
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

//cadastrar produto
    Route::get('/cadastrar/produtos', [ProdutoController::class, 'cadastrar_produto'])->name('cadastrar.produto');

    Route::post('/cadastrar', [ProdutoController::class, 'store']);

//painel de produto
    Route::get('/p/painel', [ProdutoController::class, 'painel']);

//excluir produto
    Route::delete('produtos/destroy/{id}',[ProdutoController::class, 'destroy']);

//restaurar produto
    Route::post('/produtos/restore/{id}', [ProdutoController::class, 'restore']);

//painel de produtos deletados
    Route::get('/p/painel_deletados', [ProdutoController::class, 'deletados']);

//tela de editar produto
    Route::get('/produtos/editar/{id}', [ProdutoController::class, 'editar']);

//açao de editar produto
    Route::put('/produtos/update/{id}', [ProdutoController::class, 'update']);

//tela de cadastrar fornecedor
    Route::get('/cadastrar/fornecedor', [FornecedorController::class, 'viewCadastrar']);

//ação de cadastrar fornecedor
    Route::post('/cadastrar/cadastrar_fornecedor', [FornecedorController::class, 'cadastrar']);

//painel de fornecedores
    Route::get('/painel/fornecedores', [FornecedorController::class, 'painelf']);

//tela de editar fornecedor
    Route::get('/fornecedores/editar/{id}', [FornecedorController::class, 'editarf']);

//açao de editar fornecedor

    Route::put('/fornecedores/update/{id}', [FornecedorController::class, 'updatef']);

//açao excluir fornecedor
    Route::delete('/fornecedores/detroy/{id}', [FornecedorController::class, 'destroyf']);

//painel de fornecedores deletados
    Route::get('/fornecedores/deletados', [FornecedorController::class, 'deletadosf']);

//ação restaurar fonecedor deletado

    Route::post('/fornecedores/restore/{id}', [FornecedorController::class, 'restoref']);


});
