
@if (Auth::user()->nivel > 10)
<h1 style="text-align: center">Falha ao carregar a pagina</h1>

@endif
@extends('layouts.menu')
@section('title', 'Rappi Doces')
@section('content')


@if (Auth::user()->nivel < 10)
<div>
  <div class="border-color-green flex justify-center items-center w-full bg-white">
                <div class="w-1/2 bg-green-400 border-r-2 border-t-2 border-b-2 border-l-2 border-black rounded shadow-md p-8 m-4">
                <h1 class="block w-full text-center text-white text-2xl font-bold mb-6">Cadastro de Produtos</h1>
  <form action="/cadastrar" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-white font-light" for="NomeProduto">Nome do Produto</label>
                <input class="border py-1 px-2 border-red-500 rounded py-1 px-3 text-grey-800" type="text"  id="NomeProduto" name="NomeProduto" placeholder="Nome do produto">
    </div>
    <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-white font-light" for="title">Valor do Produto</label>
                <input class="border py-1 px-2 border-red-500 rounded py-1 px-3 text-grey-800" type="float"  id="preco" name="preco" placeholder="R$ 00.00">
    </div>

    <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-white font-light" for="descricao">Descrição</label>
                <textarea class="border py-1 px-2 border-red-500 rounded py-1 px-3 text-grey-800" name="descricao" id="descricao"  placeholder="Descrição"></textarea>
    </div>
    <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-white font-light" for="title">Quantidade de Estoque</label>
                <input class="border py-1 px-2 border-red-500 rounded py-1 px-3 text-grey-800" type="int"  id="qtdestoque" name="qtdestoque" placeholder="00000">
      </div>
      <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-white font-light" for="title">Estoque Mínimo</label>
                <input class="border py-1 px-2 border-red-500 rounded py-1 px-3 text-grey-800" type="int"  id="Esquetomin" name="Estoquemin" placeholder="00000">
      </div>
      <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-white font-light" for="title">ID do Fornecedor</label>
                <input class="border py-1 px-2 border-red-500 rounded py-1 px-3 text-grey-800" type="int"  id="Fornecedor_id" name="Fornecedor_id" placeholder="00000">
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
