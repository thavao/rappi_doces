<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Carrinho;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\User;
use App\Models\ItensPedido;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;


class CarrinhoController extends Controller
{
    public function ver()
    {

        // $pedidos = Pedido::where(['status' => 'RE', 'User_id' => Auth::id()])->get();
        $carrinho = Carrinho::where('user_id', '=', Auth::user()->id)->get();

        return view('carrinho.verCarrinho', ['carrinho' => $carrinho]);
    }


    public function adicionar(Request $request)
    {
        $this->middleware('VerifyCsrfToken');

        // $req = Request();
        if (Auth::user()->nivel == 99) {
            try {
                //code...
                // $idproduto = Produto::findOrFail('id');
                $produto = Produto::findOrFail(decrypt($request->id));
                //adiciona produto no carrinho do cliente
                $carrinho = Carrinho::where('produto_id', '=', $produto->id)->where('user_id', '=', Auth::user()->id)->first();
                //se nao encontrou o produto no carrinho do usuario, entao adiciona
                if (!$carrinho) {
                    Carrinho::create([
                        'produto_id' => $produto->id,
                        'user_id' => Auth::user()->id,
                        'quantidade' => $request->quantidade > 0 ? $request->quantidade : 1,
                        'datacarrinho' => \Carbon\Carbon::now(),
                    ]);
                } else {
                    $carrinho->quantidade += $request->quantidade > 0 ? $request->quantidade : 1;
                    $carrinho->save();
                }
                $request->session()->flash('mensagem-sucesso',   "Produto {$produto->NomeProduto} foi adicionado ao carrinho! ");
                return redirect('/carrinho');
            } catch (\Exception $th) {
                $request->session()->flash('mensagem-falha', 'Produto não encontrado em nossa loja! ' . $th);
                return redirect('/carrinho');
            }
        } else {
            return redirect('/')->with('msg', 'Você não é autorizado a comprar produtos');
        }
    }
        //remover produto do carrinho
    public function retirar($id)
    {

        Carrinho::findOrFail($id)->forceDelete();


        return redirect('/')->with('msg', 'Produto removido do carrinho!');
    }

        //fazer pedido
    public function pedido(Request $request)
    {

        $carrinho = Carrinho::where('user_id', '=', Auth::user()->id)->get();
        // dd($carrinho);
        $npedido = new Pedido;

        $npedido->user_id = Auth::user()->id;
        $npedido->datapedido = \Carbon\Carbon::now();
        $npedido->observacao = $request->observacao;

        $npedido->save();

        foreach ($carrinho as $car) {
            $itensPedido = new ItensPedido;
            $itensPedido->pedido_id = $npedido->id;

            $itensPedido->produto_id = $car->produto->id;
            $itensPedido->preco = $car->produto->preco;
            $itensPedido->quantidade = $car->quantidade;

            $itensPedido->save();
        }

        foreach ($carrinho as $cartrash) {

            $cartrash->findOrFail($cartrash->id)->forceDelete();



        }
       


        return redirect('/')->with('msg', 'Seu pedido foi reservado e esta sendo tratado');
    }
}
