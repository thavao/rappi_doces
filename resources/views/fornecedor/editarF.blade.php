@extends('layouts.menu')
@section('title', 'Rappi Doces')
@section('content')

@if (Auth::user()->nivel < 10)
<div>
  <div class="flex justify-center items-center w-full bg-white ">
    <div class="w-1/2 bg-green-600 rounded .shadow ... p-8 m-4">
        <h1 class="block w-full text-center text-white text-2xl font-bold mb-6">Cadastro de Fornecedores</h1>
  <form action="/fornecedores/update/{{$fornecedor->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="flex flex-col mb-4">
        <label class="mb-2 font-bold text-lg text-white" for="nome">Nome do Fornecedor</label>
      <input class="border py-1 px-2 text-grey-800" type="text"  id="nome" name="nome" placeholder="Nome do Fornecedor" value="{{$fornecedor->nome}}">
    </div>
    <div class="flex flex-col mb-4">
        <label class="mb-2 font-bold text-lg text-white" for="cnpj">CNPJ</label>
      <input class="border py-1 px-2 text-grey-800" type="text"  id="cnpj" name="cnpj" placeholder="CPNJ" value="{{$fornecedor->cnpj}}">
    </div>


    <input class="block bg-green-700 hover:bg-green-800 text-white uppercase text-lg mx-auto p-4 rounded" type="submit"  value="Finalizar Endição">
  </form>
</div>
<script>
    $(document).ready(function(){


        $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
      });
      </script>


@endsection
@endif
