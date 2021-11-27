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

        // $pedidos = Pedido::where(['status' => 'RE', 'User_id' => Auth::id()])->get();
        $carrinho = Carrinho::where('user_id', '=', Auth::user()->id)->get();

        return view('carrinho.verCarrinho', ['carrinho' => $carrinho]);
    }


    public function adicionar(Request $request){
        $this->middleware('VerifyCsrfToken');

        // $req = Request();
        if(Auth::user()->nivel == 99){
        try {
            //code...
            // $idproduto = Produto::findOrFail('id');
            $produto = Produto::findOrFail( decrypt($request->id) );
            //adiciona produto no carrinho do cliente
            $carrinho = Carrinho::where('produto_id', '=', $produto->id)->where('user_id', '=', Auth::user()->id)->first();
            //se nao encontrou o produto no carrinho do usuario, entao adiciona
            if(! $carrinho){
                Carrinho::create([
                    'produto_id' => $produto->id,
                    'user_id' => Auth::user()->id,
                    'quantidade' => $request->quantidade > 0 ? $request->quantidade : 1,
                    'datacarrinho' => \Carbon\Carbon::now(),
                ]);
            }else{
                $carrinho->quantidade += $request->quantidade > 0 ? $request->quantidade : 1;
                $carrinho->save();
            }
            $request->session()->flash('mensagem-sucesso',   "Produto {$produto->NomeProduto} foi adicionado ao carrinho! ");
            return redirect('/carrinho');
        } catch (\Exception $th) {
            $request->session()->flash('mensagem-falha', 'Produto não encontrado em nossa loja! ' . $th);
            return redirect('/carrinho');
        }

    }
    else{
        return redirect('/')->with('msg', 'Você não é autorizado a comprar produtos');
    }


        // $idusuario = Auth::id();

        // $idpedido = Pedido::consultaId([
        //     'user_id' => $idusuario,
        //     'status' => 'RE' //reservado
        // ]);

        // if(empty($idpedido)){
        //     $pedido_novo = Pedido::create([
        //         'user_id' => $idusuario,
        //         'status' => 'RE',
        //     ]);

        //     $idpedido = $pedido_novo->id;
        // }

        // Carrinho::create([
        //     'pedido_id' => $idpedido,
        //     'produto_id' => $idproduto,
        //     'valor' => $produto->preco,
        //     'status' => 'RE'
        // ]);




        // $req->sesion()->flash('mensagem-sucesso',   'Produto adicionado ao carrinho com sucesso! ');

        // return redirect()->route('/carrinho');
    }

}
