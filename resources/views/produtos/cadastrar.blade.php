@php
if (Auth::user()->nivel > 10){

    return redirect('/ttttt');
    }
@endphp



@extends('layouts.menu')
@section('title', 'Rappi Doces')
@section('content')


@if (Auth::user()->nivel < 10)
<div>
<div class="flex justify-center my-6">
  <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
    <div class="flex-1">
                <h1 class="block w-full text-center text-balck text-2xl font-bold mb-6">Cadastro de Produtos</h1>
  <form action="/cadastrar" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-black font-light" for="NomeProduto">Nome do Produto</label>
                <input class="border py-1 px-2 border-gray-500ds rounded py-1 px-3 text-grey-800" type="text"  id="NomeProduto" name="NomeProduto" placeholder="Nome do produto">
    </div>
    <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-black font-light" for="title">Valor do Produto</label>
                <input class="border py-1 px-2 border-gray-500 rounded py-1 px-3 text-grey-800" type="decimal"  id="preco" name="preco" placeholder="R$ 00.00">
    </div>

    <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-black font-light" for="descricao">Descrição</label>
                <textarea class="border py-1 px-2 border-gray-500 rounded py-1 px-3 text-grey-800" name="descricao" id="descricao"  placeholder="Descrição"></textarea>
    </div>
    <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-black font-light" for="title">Quantidade de Estoque</label>
                <input class="border py-1 px-2 border-gray-500 rounded py-1 px-3 text-grey-800" type="int"  id="qtdestoque" name="qtdestoque" placeholder="00000">
      </div>
      <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-black font-light" for="title">Estoque Mínimo</label>
                <input class="border py-1 px-2 border-gray-500 rounded py-1 px-3 text-grey-800" type="int"  id="Esquetomin" name="Estoquemin" placeholder="00000">
      </div>
      <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-white font-light" for="title">ID do Fornecedor</label>
                <input class="border py-1 px-2 border-gray-500 rounded py-1 px-3 text-grey-800" type="int"  id="Fornecedor_id" name="Fornecedor_id" placeholder="00000">
      </div>
      <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-white font-light  " for="image">Imagem do Produto</label>
                <input type="file" id="imagem" name="imagem">
      </div>
                <input class="block border-2 border-black bg-green-600 hover:bg-green-700 text-white font-bold uppercase text-lg mx-auto p-4 rounded" type="submit"  value="Finalizar Cadastro">
  </form>
</div>
<script>
    $(document).ready(function(){

        $('#preco').mask('000.000.000.000.000.00', {reverse: true});

      });
      </script>
@endsection
@endif
