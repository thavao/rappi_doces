
@if (Auth::user()->nivel > 10)
<h1>Falha ao carregar a pagina</h1>
<h1>Falha ao carregar a pagina</h1>
<h1>Falha ao carregar a pagina</h1>
<h1>Falha ao carregar a pagina</h1>
<h1>Falha ao carregar a pagina</h1>
<h1>Falha ao carregar a pagina</h1>
<h1>Falha ao carregar a pagina</h1>
@endif
@extends('layouts.menu')
@section('title', 'Rappi Doces')
@section('content')


@if (Auth::user()->nivel < 10)
<div>
  <h1>Cadastre um produto</h1>
  <form action="/cadastrar" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">Nome do Produto</label>
      <input type="text"  id="NomeProduto" name="NomeProduto" placeholder="Nome do produto">
    </div>
    <div class="form-group">
      <label for="title">Preço:</label>
      <input type="float"  id="preco" name="preco" placeholder="R$ 00.0">
    </div>

    <div class="form-group">
      <label for="title">Descrição:</label>
      <textarea name="descricao" id="descricao"  placeholder="Descrição"></textarea>
    </div>
    <div class="form-group">
        <label for="title">Quantidade de estoque:</label>
        <input type="int"  id="qtdestoque" name="qtdestoque" placeholder="00000">
      </div>
      <div class="form-group">
        <label for="title">Estoque Mínimo:</label>
        <input type="int"  id="Esquetomin" name="Estoquemin" placeholder="00000">
      </div>
      <div class="form-group">
        <label for="title">ID do Fornecedor:</label>
        <input type="int"  id="Fornecedor_id" name="Fornecedor_id" placeholder="00000">
      </div>
      <div class="form-group">
        <label for="image">Imagem do produto:</label>
        <input type="file" id="imagem" name="imagem">
      </div>
    <input type="submit"  value="Finalizar Cadastro">
  </form>
</div>
<script>
    $(document).ready(function(){

        $('#preco').mask('000.000.000.000.000.00', {reverse: true});

      });
      </script>
@endsection
@endif
