<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Carrinho;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use DB;

class CarrinhoController extends Controller
{
    public function ver(){

        $pedidos = Pedido::where(['status' => 'RE', 'User_id' => Auth::id()])->get();


        return view('carrinho.verCarrinho', ['pedidos' => $pedidos]);
    }

    public function adicionar(){
        $this->middleware('VerifyCsrfToken');

        $req = Request();

        $idproduto = $req->input('id');

        $produto = Produto::find($idproduto);
        if( empty($produto->id) ){
            $req->session()->flash('mensagem-falha', 'Produto não encontrado em nossa loja!');
            return redirect('carrinho');

        }

        $idusuario = Auth::User()->id;
        
        $idpedido = Pedido::consultaId([
            'User_id' => $idusuario,
            'status' => 'RE' //reservado
        ]);
        //dd($produto->id);
        

        if(empty($idpedido)){
            DB::beginTransaction();
            try {
                //code...
                $pedido_novo = Pedido::create([
                    'User_id' => Auth::user()->id,
                    'produto_id' => $produto->id,
                    'valor' => $produto->preco,
                    'datapedido' => \Carbon\Carbon::now(),
                    'status' => 'RE',
                    'quantidade' => 1,
                    'observacao' => 'qualquer coisa',
                    
                    'valorunitariop' => $produto->preco,
                ]);
    
                $idpedido = $pedido_novo->id;
                
                Carrinho::create([
                    'pedido_id' => $idpedido,
                    'User_id' =>   Auth::user()->id,
                    'produto_id' => $produto->id,
                    'valor' => $produto->preco,
                    'status' => 'RE'
                ]);
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollback();
                //throw $th;
            }
        }
        
 


        $req->session()->flash('mensagem-sucesso',   'Produto adicionado ao carrinho com sucesso! ');

        return redirect()->route('carrinho.ver');
    }

}
