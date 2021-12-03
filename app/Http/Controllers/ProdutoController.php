<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Redirect;

class ProdutoController extends Controller
{
    public function mostrar_produtos(){

        $search = request('search');
        if($search){
            $produtos = Produto::where([
                ['NomeProduto', 'like', '%'.$search.'%']
            ])->get();

        }
        else{
                $produtos = Produto::all();
            }


        return view('welcome', ['produtos' => $produtos, 'search' => $search]);

    }
    public function cadastrar_produto (){
        return view('produtos.cadastrar');
    }
    public function store(Request $request){
        if (Auth::user()->nivel == 99) {
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

        return redirect('cadastrar\produtos')->with('msg', 'Produto cadastrado com SUCESSO');
    
    }else{
        return redirect('/asyudhgashd')->with('msg', 'Você não é autorizado a acessar essapagina');
    }



 }
 



    public function show($id){

        $produto = Produto::findOrFail($id);

        return view('produtos.show', ['produto' => $produto]);
    }

    public function painel(){
        if (Auth::user()->nivel == 99) {

        $produto = Produto::all();

        return view('produtos.painel', ['produto' => $produto]);
    }
        else {
            return redirect('/asyudhgashd')->with('msg', 'Você não é autorizado a acessar essapagina');
        }
    }
        //deletar
    public function destroy($id){
        if (Auth::user()->nivel == 99) {
            Produto::findOrFail($id)->delete();
            
            
            return redirect('/p/painel')->with('msg', 'PRODUTO DELETADO COM SUCESSO!');
        }
            else {
            return redirect('/asyudhgashd')->with('msg', 'Você não é autorizado a acessar essapagina');
        }

    }

    //mostrar os deletados
    public function deletados(){
        if (Auth::user()->nivel == 99) {
         
        $produtos = Produto::onlyTrashed()->get();


       return view('produtos.deletados', ['produto'=>$produtos]);

    } else {
            return redirect('/asyudhgashd')->with('msg', 'Você não é autorizado a acessar essapagina');
        }

    }
        //restaurar
    public function restore($deleted_at){
        if (Auth::user()->nivel == 99) {
            $p = Produto::withTrashed()->findOrFail($deleted_at);
            $p->restore();
            
            return redirect('/p/painel_deletados')->with('msg', 'Produto restaurado com sucesso!');
            
        } 
            else {
            return redirect('/asyudhgashd')->with('msg', 'Você não é autorizado a acessar essapagina');
        }
    }
        //mostrar tela de editar
    public function editar($id){
        if (Auth::user()->nivel == 99) {
            $produto = Produto::findOrFail($id);
            
            return view('produtos.editar', ['produto' => $produto]);
            
        } 
        else {
            return redirect('/asyudhgashd')->with('msg', 'Você não é autorizado a acessar essapagina');
        }
    }
        //editar
    public function update(Request $request){
        if (Auth::user()->nivel == 99) {
            
            
            Produto::findOrFail($request->id)->update($request->all());
            
            return redirect('/p/painel')->with('msg', 'PRODUTO DELETADO COM SUCESSO!');
        } 
        else {
            return redirect('/asyudhgashd')->with('msg', 'Você não é autorizado a acessar essapagina');
        }

    }
}

