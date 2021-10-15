<?php

namespace App\Http\Livewire\produtosp;

use Livewire\Component;
use App\Models\{produto, fornecedor, fotop, imagemp};
use DB;
use Str;

class Lista extends Component
{
    public $modalDelete = false;
    public $modalRestore = false;
    public $modalAltera = false;
    public $showModalNew = false;

    public $bloqueados;
    public $itensPaginas = 10;
    public $termo;

    public $produtoFake;
    public $idproduto;

    public $preco;
    public $nomeproduto;
    public $descricao;
    public $qtdestoque;
    public $estoquemin;
    public $fornecedor_id;


    public function resetData(){
        $this->reset();
    }

    //neste caso o metodo tem que chamar rules mesmo
    public function rules(){
        return [
            'NomeProduto' => "required|string|min:3",
            'preco' => "required|float" . $this->idproduto
        ];
    }

    public function messages(){
        return [
            'name.required' => 'O campo <strong>Nome do Usuário</strong> é obrigatório',
            'name.min' => 'O campo <strong>Nome do Usuário</strong> precisa ter no mínimo 3 caracteres',
            'email.required' => 'O campo <strong>E-mail</strong> é obrigatório sua besta',
        ];
    }


    public function render(){
        if($this->termo){
            if( !$this->bloqueados ){
                $produtos = produto::where('name', 'like', '%'.$this->termo.'%')->orderBy('name')->paginate($this->itensPaginas);
            }else{
                $produtos = produto::withTrashed()->where('name', 'like', '%'.$this->termo.'%')->orderBy('name')->paginate($this->itensPaginas);
            }
        }else{
            if( !$this->bloqueados ){
                $produtos = produto::orderBy('name')->paginate($this->itensPaginas);
            }else{
                $produtos = produto::withTrashed()->orderBy('name')->paginate($this->itensPaginas);
            }
        }
       // $niveis = collect([0 => 'ADMINISTRADOR', 10 => 'GERENTE', 99 => 'COMUM']);
        // return view('livewire.usuarios.lista')->withUsuarios($usuarios)->withNiveis($niveis);
    }

    public function remover($id){
        $this->produtoFake = produto::findOrFail(decrypt($id));
        $this->modalDelete = true;
    }

    public function delete($id){
        try {
            $produtos = produto::findOrFail(decrypt($id));
            // $usuario->team->delete();
            $produtos->delete();
            session()->flash('success', "Produto removido com sucesso!");
        } catch (\Exception $ex) {
            session()->flash('error', $ex->getMessage());
        }
        $this->reset();
    }

    public function restaurar($id){
        $this->produtoFake = produto::withTrashed()->findOrFail(decrypt($id));
        $this->modalRestore = true;
    }

    public function restore($id){
        try {
            $produtos = produto::withTrashed()->findOrFail(decrypt($id));
            $produtos->restore();
            session()->flash('success', "Produto recolocado com sucesso!");
        } catch (\Exception $ex) {
            session()->flash('error', $ex->getMessage());
        }
        $this->reset();
    }

    public function create(){
        $this->validate();
        DB::beginTransaction();
        try {
            $produtos = produto::create([
                'NomeProduto' => $this->nomeproduto,
                'preco' => $this->preco,
                'descricao' => $this->descricao,
                'qtdestoque' => $this->qtdestoque,
                'Fornecedor_id' => $this->fornecedor_id,
                'estoquemin' => $this->estoquemin,
            ]);
            //$fotops = fotop::create([
            //  'name' => "Time " . $usuario->name,
            //   'user_id' => $usuario->id
            //]);
            $produtos->current_produto_id = $produtos->id;
            $produtos->save();
            DB::commit();
            session()->flash('success', "Produto cadastrado com sucesso!");
        } catch (\Exception $ex) {
            DB::rollBack();
            session()->flash('error', $ex->getMessage());
        }
        $this->reset();
        $this->dispatchBrowserEvent('click');
    }

    public function alterar($id){
        $this->produtoFake = produto::withTrashed()->findOrFail(decrypt($id));
        $this->idproduto = $this->produtoFake->id;
        $this->NomeProduto = $this->produtoFake->nomeproduto;
        $this->preco = $this->produtoFake->preco;
        $this->descricao = $this->produtoFake->descricao;
        $this->qtdestoque = $this->produtoFake->qtdestoque;
        $this->Fornecedor_id = $this->produtoFake->Fornecedor_id;
        $this->Estoquemin = $this->produtoFake->Estoquemin;
        $this->modalAltera = true;
    }

    public function update(){
        DB::beginTransaction();
        try {
            $produtos = produto::findOrFail($this->idUsuario);

            $validatedData = $this->validate();

            $produtos->update($validatedData);

            DB::commit();
            session()->flash('success', "Produto alterado com sucesso!");
        } catch (\Exception $ex) {
            DB::rollBack();
            session()->flash('error', $ex->getMessage());
        }
        $this->reset();
        $this->dispatchBrowserEvent('click');
    }
}