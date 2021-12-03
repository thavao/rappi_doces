@extends('layouts.menu')
@section('title', 'Rappi Doces')
@section('content')

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

@forelse($produto as $produto)

<div class="mt-2">
    <div><h1 class=" "style="text-align: center">
    <table class="max-w-2xl mx-auto table-auto">
      <thead class="justify-between">
        <tr class="bg-green-600">
          <th class="px-16 py-2">
            <span class="text-gray-100 font-semibold">Imagem</span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-100 font-semibold">Nome</span>
          </th>

          <th class="px-16 py-2">
            <span class="text-gray-100 font-semibold">Preço</span>
          </th>

          <th class="px-32 py-2">
            <span class="text-gray-100 font-semibold">Descrição</span>
          </th>

          <th class="px-16 py-2">
            <span class="text-gray-100 font-semibold">Estoque</span>
          </th>

          <th class="px-16 py-2">
            <span class="text-gray-100 font-semibold">Ação</span>
          </th>
        </tr>
      </thead>

      <a href="/produtos/{{$produto->id}}">
      <tbody class="bg-gray-200">
        <tr class="bg-white border-b-2 border-gray-900">
          <td class="px-16 py-2 flex flex-row items-center">
            <a href="/produtos/{{$produto->id}}"><img
              class="h-8 w-8 rounded-full object-cover "
              src="\produtos\{{$produto->imagem}}"
              alt="Imagem de {{$produto->NomeProduto}}"

            /></a>
          </td>
          <td>
            <a href="/produtos/{{$produto->id}}"> <span class="text-center ml-2 font-semibold">{{$produto->NomeProduto}}</span></a>
          </td>

          <td class="px-16 py-2">
            <a href="/produtos/{{$produto->id}}"> <span>R$ {{number_format($produto->preco, 2,",",".") }}</span></a>
          </td>

          <td class="px-32 py-8">
            <a href="/produtos/{{$produto->id}}"> <span>{{$produto->descricao}}</span></a>
          </td>

          <td>
            <a href="/produtos/{{$produto->id}}">  <span class="text-center ml-2 font-semibold">{{$produto->qtdestoque}}</span></a>
          </td>

<td class="px-16 py-2">
    <span class="text-yellow-500 flex">
<form action="/produtos/restore/{{$produto->id}}" method="POST">
                @csrf
                @method('POST')
                <button type="submit"> <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
                  </svg></button>
            </form>
    </span>
</td>

            @empty
            < <div class="flex justify-center items-center w-full bg-grey-200 ">
        <div class="w-1/2 bg-white border-r-2 border-t-2 border-b-2 border-l-2 border-grey rounded shadow-lg p-8 m-4">
        <h3 class="text-lg text-center font-medium text-gray-800">Nenhum produto deletado</h3>
        <div><h1 class=" "style="text-align: center"> <a href="/p/painel">Voltar ao painel</a></h1></div>
        <div class="h-1 w-full mx-auto border-b my-4"></div>
    
            @endforelse
@endsection
