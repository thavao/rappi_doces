<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;
class FornecedorController extends Controller
{
    //cadastrar fornecedor
    public function viewCadastrar(){
        return view('fornecedor.cadastro');
    }
    public function cadastrar(Request $request){
        $fornecedor = new Fornecedor;

        $fornecedor->nome = $request->nome;
        $fornecedor->cnpj = $request->cnpj;

        $fornecedor->save();

        return redirect('/cadastrar/fornecedor')->with('msg', 'Fornecedor cadastrado com sucesso');
    }
    //painel de fornecedores
    public function painelf(){
        $fornecedor = Fornecedor::all();

        return view('fornecedor.painelF', ['fornecedor' => $fornecedor]);
    }

    //tela de editar fornecedor
    public function editarf($id){
        $fornecedor = Fornecedor::findOrfail($id);

        return view('fornecedor.editarF', ['fornecedor' => $fornecedor]);
    }

    //açao de editar fornecedor
    public function updatef(Request $request){

        Fornecedor::findOrFail($request->id)->update($request->all());

        return redirect('/painel/fornecedores')->with('msg', 'Fornecedor eitado com sucesso!');

    }

    public function destroyf($id){

        Fornecedor::findOrFail($id)->delete();

        return redirect('/painel/fornecedores')->with('msg', 'Fornecedor DELETADO com sucesso!');
    }

    public function deletadosf(){

        $fornecedor = Fornecedor::withTrashed()->get();

        return view('fornecedor.deletadosF', ['fornecedor' => $fornecedor]);
    }

    public function restoref($deleted_at){
        $fornecedor = Fornecedor::withTrashed()->findOrFail($deleted_at);
        $fornecedor->restore();

        return redirect('/painel/fornecedores')->with('msg', 'Fornecedor RESTAURADO com sucesso!');
    }
}
