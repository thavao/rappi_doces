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

class PedidoController extends Controller
{
    public function verPedidos(){
        $pedido = Pedido::where('user_id', '=', Auth::user()->id)->get();

        return view('pedido.pedidos', ['pedido' => $pedido]);
    }

    public function cancelar(Request $request){

        Pedido::findOrFail($request->id);
        $pedido = Pedido::where('user_id', '=', Auth::user()->id)->get();

        $pedido->status = 'CA';

        return redirect('/')->with('msg', 'Pedido cancelado');
    }

    public function mostrarPedido($id){

        $pedido = Pedido::where('user_id', '=', Auth::user()->id)->get();
dd($pedido);
        $itens = ItensPedido::where('pedido_id', '=', $pedido->id);

        return view('pedido.itenspedido', ['itens' => $itens]);
    }
}
