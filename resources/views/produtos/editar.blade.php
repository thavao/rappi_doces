@if (session('msg'))
<div class="container">
    <!-- component -->
    <div class="flex justify-center my-6 text-center">
        <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
            <div class="flex-1">
                
                    <div class="card-panel green center">
                        <strong>{{session('msg') }}</strong>
                    </div>
            </div>
        </div>
    </div>
</div>
@endif

@if (Auth::user()->nivel > 10)
<h1 style="text-align: center">Falha ao carregar a pagina</h1>

@endif
@extends('layouts.menu')
@section('title', 'Rappi Doces')
@section('content')


@if (Auth::user()->nivel < 10)
<div>
   <div class="flex justify-center items-center w-full bg-grey-200 ">
        <div class="w-1/2 bg-white border-r-2 border-t-2 border-b-2 border-l-2 border-grey rounded shadow-lg p-8 m-4">
        <h1 class="block w-full text-center text-black text-2xl font-bold mb-6">EDITANDO: {{$produto->NomeProduto}}</h1>
<form action="/produtos/update/{{$produto->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<div class="flex flex-col mb-4">
        <label class="mb-2 font-bold text-lg text-black font-light" for="NomeProduto">Nome do Produto:</label>
        <input class="border py-1 px-2 border-grey-500 rounded py-1 px-3 text-grey-800" type="text"  id="NomeProduto" name="NomeProduto" placeholder="Nome do produto" value="{{$produto->NomeProduto}}">
</div>
    <div class="flex flex-col mb-4">
        <label class="mb-2 font-bold text-lg text-black font-light" for="preco">Valor do Produto:</label>
        <input class="border py-1 px-2 border-grey-500 rounded py-1 px-3 text-grey-800" type="decimal"  id="preco" name="preco" placeholder="R$ 00.0" value="{{$produto->preco}}" >
</div>

    <div class="flex flex-col mb-4">
        <label class="mb-2 font-bold text-lg text-black font-light" for="descricao">Descrição:</label>
      <input autocapitalize="border py-1 px-2 border-grey-500 rounded py-1 px-3 text-grey-800" name="descricao" id="descricao"  placeholder="Descrição" value="{{$produto->descricao}}">
    </div>
    <div class="flex flex-col mb-4">
        <label class="mb-2 font-bold text-lg text-black font-light" for="qtdestoque">Quantidade de Estoque:</label>
        <input class="border py-1 px-2 border-grey-500 rounded py-1 px-3 text-grey-800" type="int"  id="qtdestoque" name="qtdestoque" placeholder="00000" value="{{$produto->qtdestoque}}">
      </div>
      <div class="flex flex-col mb-4">
        <label class="mb-2 font-bold text-lg text-black font-light" for="">Estoque Mínimo:</label>
        <input class="border py-1 px-2 border-grey-500 rounded py-1 px-3 text-grey-800" type="int"  id="Estoquemin" name="Estoquemin" placeholder="00000"value="{{$produto->Estoquemin}}">
      </div>
      <div class="flex flex-col mb-4">
        <label class="mb-2 font-bold text-lg text-black font-light" for="Fornecedor_id">ID do Fornecedor:</label>
        <input class="border py-1 px-2 border-grey-500 rounded py-1 px-3 text-grey-800" type="int"  id="Fornecedor_id" name="Fornecedor_id" placeholder="00000" value="{{$produto->Fornecedor_id}}">
      </div>

      <div class="flex flex-col mb-4">
        <img class="object-scale-down h-48 w-full" src=" /produtos/{{$produto->imagem}}" alt="imagem de {{$produto->NomeProduto}}">
        <label class="mb-2 font-bold text-lg text-black font-light  " for="image">Imagem do Produto</label>

      </div>

      <input class="block border-2  bg-green-600 hover:bg-green-700 text-white font-bold uppercase text-lg mx-auto p-4 rounded" type="submit"  value="Finalizar Edição">

  </form>
</div>
<script>
    $(document).ready(function(){
        $('#preco').mask('000.000.000.000.000.00', {reverse: true});
      });
      </script>
@endsection
@endif