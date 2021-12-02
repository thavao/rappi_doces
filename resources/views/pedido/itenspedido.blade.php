@extends('layouts.menu')
@section('title', 'Rappi Doces')
@section('content')

<div class="mt-2">
    <div><h1 class=" "style="text-align: center"> <a href="/p/painel_deletados">Ver produtos deletados</a></h1></div>
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
        </tr>
      </thead>
      @forelse ($itens as $item)


      <a href="/produtos/{{$item->produto->id}}">
      <tbody class="bg-gray-200">
        <tr class="bg-white border-b-2 border-gray-900">
          <td class="px-16 py-2 flex flex-row items-center">
            <a href="/produtos/{{$item->produto->id}}"><img
              class="h-8 w-8 rounded-full object-cover "
              src="\produtos\{{$item->produto->imagem}}"
              alt="Imagem de {{$item->produto->NomeProduto}}"

            /></a>
          </td>
          <td>
            <a href="/produtos/{{$item->produto->id}}"> <span class="text-center ml-2 font-semibold">{{$item->produto->NomeProduto}}</span></a>
          </td>

          <td class="px-16 py-2">
            <a href="/produtos/{{$item->produto->id}}"> <span>R$ {{number_format($item->produto->preco, 2,",",".") }}</span></a>
          </td>

          <td class="px-32 py-8">
            <a href="/produtos/{{$item->produto->id}}"> <span>{{$item->produto->descricao}}</span></a>
          </td>
        </tr>
      </tbody>

      @empty
      <h1>nada foi encontrado</h1>

      @endforelse
    </table>
  </div>

@endsection
