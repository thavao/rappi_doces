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

        //upload de imagem
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){

            $requestImagem = $request->imagem;
            $extension = $requestImagem->extension();

            $nomeImagem = md5($requestImagem->getClientOriginalName(). strtotime("now")). "." . $extension;

            $request->imagem->move(public_path('\produtos'), $nomeImagem);

            $produto->imagem = $nomeImagem;


        }

        $produto->save();

        return view('produtos.cadastrar')->with('msg', 'Produto cadastrado com SUCESSO') ;
    }

    public function show($id){

        $produto = Produto::findOrFail($id);

        return view('produtos.show', ['produto' => $produto]);
    }
}
