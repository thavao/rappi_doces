<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function mostrar_produtos(){

        $produtos = Produto::all();

        return view('welcome', ['produtos' => $produtos]);

    }
    public function cadastrar_produto (){
        return view('produtos.cadastrar');
    }
    public function store(Request $request){

        $produto = new Produto;

        $produto->NomeProduto = $request->NomeProduto;
        $produto->preco = $request->preco;
        $produto->descricao = $request->descricao;
        $produto->qtdestoque = $request->qtdestoque;
        $produto->Estoquemin = $request->Estoquemin;
        $produto->Fornecedor_id = $request->Fornecedor_id;

        $produto->save();

        return view('produtos.cadastrar');
    }
}
