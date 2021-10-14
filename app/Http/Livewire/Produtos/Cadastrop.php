<?php

namespace App\Http\Livewire\produtosp;

use Livewire\Component;
use App\Models\{produto, fornecedor, imagemp};
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
        $this->usuarioFake = produto::findOrFail(decrypt($id));
        $this->modalDelete = true;
    }

    public function delete($id){
        try {
            $usuario = produto::findOrFail(decrypt($id));
            // $usuario->team->delete();
            $usuario->delete();
            session()->flash('success', "Usuário bloqueado com sucesso!");
        } catch (\Exception $ex) {
            session()->flash('error', $ex->getMessage());
        }
        $this->reset();
    }

    public function restaurar($id){
        $this->usuarioFake = produto::withTrashed()->findOrFail(decrypt($id));
        $this->modalRestore = true;
    }

    public function restore($id){
        try {
            $usuario = produto::withTrashed()->findOrFail(decrypt($id));
            $usuario->restore();
            session()->flash('success', "Usuário restaurado com sucesso!");
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
                'name' => $this->name,
                'email' => $this->email,
                'password' => Str::random(40)
            ]);
            $time = Team::create([
                'name' => "Time " . $usuario->name,
                'personal_team' => '1',
                'user_id' => $usuario->id
            ]);
            $usuario->current_team_id = $time->id;
            $usuario->save();
            DB::commit();
            session()->flash('success', "Usuário cadastrado com sucesso!");
        } catch (\Exception $ex) {
            DB::rollBack();
            session()->flash('error', $ex->getMessage());
        }
        $this->reset();
        $this->dispatchBrowserEvent('click');
    }

    public function alterar($id){
        $this->usuarioFake = User::withTrashed()->findOrFail(decrypt($id));
        $this->idUsuario = $this->usuarioFake->id;
        $this->name = $this->usuarioFake->name;
        $this->email = $this->usuarioFake->email;
        $this->modalAltera = true;
    }

    public function update(){
        DB::beginTransaction();
        try {
            $usuario = User::findOrFail($this->idUsuario);

            $validatedData = $this->validate();

            $usuario->update($validatedData);

            DB::commit();
            session()->flash('success', "Usuário alterado com sucesso!");
        } catch (\Exception $ex) {
            DB::rollBack();
            session()->flash('error', $ex->getMessage());
        }
        $this->reset();
        $this->dispatchBrowserEvent('click');
    }
}