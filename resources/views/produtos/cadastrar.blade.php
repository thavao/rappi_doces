
@extends('layouts.menu')
@section('title', 'Rappi Doces')
@section('content')


<div id="produtos-cadastrar-container" class="col-md-6 offset-md-3">
  <h1>Cadastre um produto</h1>
  <form action="/cadastrar" method="POST">
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
    <input type="submit"  value="Finalizar Cadastro">
  </form>
</div>
<script>
    $(document).ready(function(){

        $('#preco').mask('000.000.000.000.000.00', {reverse: true});

      });
      </script>
@endsection

