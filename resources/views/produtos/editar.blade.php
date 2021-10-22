
@if (Auth::user()->nivel > 10)
<h1 style="text-align: center">Falha ao carregar a pagina</h1>

@endif
@extends('layouts.menu')
@section('title', 'Rappi Doces')
@section('content')


@if (Auth::user()->nivel < 10)
<div>
   <div class="flex justify-center items-center w-full bg-white ">
        <div class="w-1/2 bg-green-400 border-r-2 border-t-2 border-b-2 border-l-2 border-black rounded shadow-md p-8 m-4">
        <h1 class="block w-full text-center text-white text-2xl font-bold mb-6">EDITANDO: {{$produto->NomeProduto}}</h1>
<form action="/produtos/update/{{$produto->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<div class="flex flex-col mb-4">
        <label class="mb-2 font-bold text-lg text-white font-light" for="NomeProduto">Nome do Produto:</label>
        <input class="border py-1 px-2 border-red-500 rounded py-1 px-3 text-grey-800" type="text"  id="NomeProduto" name="NomeProduto" placeholder="Nome do produto" value="{{$produto->NomeProduto}}">
</div>
    <div class="flex flex-col mb-4">
        <label class="mb-2 font-bold text-lg text-white font-light" for="preco">Valor do Produto:</label>
        <input class="border py-1 px-2 border-red-500 rounded py-1 px-3 text-grey-800" type="float"  id="preco" name="preco" placeholder="R$ 00.0" value="{{$produto->preco}}" >
</div>

    <div class="flex flex-col mb-4">
        <label class="mb-2 font-bold text-lg text-white font-light" for="descricao">Descrição:</label>
      <input autocapitalize="border py-1 px-2 border-red-500 rounded py-1 px-3 text-grey-800" name="descricao" id="descricao"  placeholder="Descrição" value="{{$produto->descricao}}"></input>
    </div>
    <div class="flex flex-col mb-4">
        <label class="mb-2 font-bold text-lg text-white font-light" for="qtdestoque">Quantidade de Estoque:</label>
        <input class="border py-1 px-2 border-red-500 rounded py-1 px-3 text-grey-800" type="int"  id="qtdestoque" name="qtdestoque" placeholder="00000" value="{{$produto->qtdestoque}}">
      </div>
      <div class="flex flex-col mb-4">
        <label class="mb-2 font-bold text-lg text-white font-light" for="">Estoque Mínimo:</label>
        <input class="border py-1 px-2 border-red-500 rounded py-1 px-3 text-grey-800" type="int"  id="Estoquemin" name="Estoquemin" placeholder="00000"value="{{$produto->Estoquemin}}">
      </div>
      <div class="flex flex-col mb-4">
        <label class="mb-2 font-bold text-lg text-white font-light" for="Fornecedor_id">ID do Fornecedor:</label>
        <input class="border py-1 px-2 border-red-500 rounded py-1 px-3 text-grey-800" type="int"  id="Fornecedor_id" name="Fornecedor_id" placeholder="00000" value="{{$produto->Fornecedor_id}}">
      </div>

      <div class="flex flex-col mb-4">
        <img class="object-scale-down h-48 w-full" src=" /produtos/{{$produto->imagem}}" alt="imagem de {{$produto->NomeProduto}}">
        <label class="mb-2 font-bold text-lg text-white font-light  " for="image">Imagem do Produto</label>
        <input class="text-grey-800" type="file" id="imagem" name="imagem" >
      </div>
      
  </form>
</div>
<script>
    $(document).ready(function(){

        $('#preco').mask('000.000.000.000.000.00', {reverse: true});

      });
      </script>
@endsection
@endif
