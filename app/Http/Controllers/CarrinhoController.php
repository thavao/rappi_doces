<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Carrinho;
use App\Models\Pedido;
use App\Models\User;



class CarrinhoController extends Controller
{
    public function ver(){

        $pedidos = Pedido::where(['status' => 'RE', 'User_id' => Auth::id()])->get();


        return view('carrinho.verCarrinho', ['pedidos' => $pedidos]);
    }

}
