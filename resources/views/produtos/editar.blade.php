
@if (Auth::user()->nivel > 10)
<h1 style="text-align: center">Falha ao carregar a pagina</h1>

@endif
@extends('layouts.menu')
@section('title', 'Rappi Doces')
@section('content')


@if (Auth::user()->nivel < 10)
<div>
  <h1>Editando: {{$produto->NomeProduto}}</h1>
  <form action="/produtos/update/{{$produto->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="title">Nome do Produto: </label>
      <input type="text"  id="NomeProduto" name="NomeProduto" placeholder="Nome do produto" value="{{$produto->NomeProduto}}">
    </div>
    <div class="form-group">
      <label for="title">Preço:</label>
      <input type="float"  id="preco" name="preco" placeholder="R$ 00.0" value="{{$produto->preco}}" >
    </div>

    <div class="form-group">
      <label for="title">Descrição:</label>
      <textarea name="descricao" id="descricao"  placeholder="Descrição" value="{{$produto->descricao}}"></textarea>
    </div>
    <div class="form-group">
        <label for="title">Quantidade de estoque:</label>
        <input type="int"  id="qtdestoque" name="qtdestoque" placeholder="00000" value="{{$produto->qtdestoque}}">
      </div>
      <div class="form-group">
        <label for="title">Estoque Mínimo:</label>
        <input type="int"  id="Esquetomin" name="Estoquemin" placeholder="00000"value="{{$produto->Estoquemin}}">
      </div>
      <div class="form-group">
        <label for="title">ID do Fornecedor:</label>
        <input type="int"  id="Fornecedor_id" name="Fornecedor_id" placeholder="00000" value="{{$produto->Fornecedor_id}}">
      </div>

      <div class="form-group">
        <img src="/produtos/{{$produto->imagem}}" alt="imagem de {{$produto->NomeProduto}}">
        <label for="image">Imagem do produto:</label>
        <input type="file" id="imagem" name="imagem" >
      </div>
    <input type="submit"  value="Finalizar Edição">
  </form>
</div>
<script>
    $(document).ready(function(){

        $('#preco').mask('000.000.000.000.000.00', {reverse: true});

      });
      </script>
@endsection
@endif
