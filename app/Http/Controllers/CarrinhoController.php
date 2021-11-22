<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Carrinho;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

class CarrinhoController extends Controller
{
    public function ver(){

        $pedidos = Pedido::where(['status' => 'RE', 'User_id' => Auth::id()])->get();


        return view('carrinho.verCarrinho', ['pedidos' => $pedidos]);
    }

    public function adicionar(Request $req){
        $this->middleware('VerifyCsrfToken');



        $idproduto = $req->input('id');

        $produto = Produto::find('$idproduto');
        if( empty($produto->id) ){
            $req->session()->flash('mensagem-falhas', 'Produto não encontrado em nossa loja!');
            return redirect('carrinho');

        }

        $idusuario = Auth::id();

        $idpedido = Pedido::consultaId([
            'user_id' => $idusuario,
            'status' => 'RE' //reservado
        ]);

        if(empty($idpedido)){
            $pedido_novo = Pedido::create([
                'user_id' => $idusuario,
                'status' => 'RE',
            ]);

            $idpedido = $pedido_novo->id;
        }

        Carrinho::create([
            'pedido_id' => $idpedido,
            'produto_id' => $idproduto,
            'valor' => $produto->preco,
            'status' => 'RE'
        ]);




        $req->sesion()->flash('mensagem-sucesso',   'Produto adicionado ao carrinho com sucesso! ');

        return redirect()->route('/carrinho');
    }

}
