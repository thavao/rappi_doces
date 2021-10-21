@extends('layouts.menu')
@section('title', 'Rappi Doces')
@section('content')

<div class="mt-2">
    <div><h1 style="text-align: center"> <a href="/p/painel_deletados">Ver produtos deletados</a></h1></div>
    <table class="max-w-5xl mx-auto table-auto">
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
      @forelse ($produto as $produto)


      <a href="/produtos/{{$produto->id}}">
      <tbody class="bg-gray-200">
        <tr class="bg-white border-b-2 border-gray-200">
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
           <a href="/produtos/editar/{{$produto->id}}"> <svg
                                          xmlns="http://www.w3.org/2000/svg"
                                          class="h-5 w-5 text-green-700 mx-2"
                                          viewBox="0 0 20 20"
                                          fill="currentColor"
                                      >
                                          <path
                                              d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"
                                          />
                                          <path
                                              fill-rule="evenodd"
                                              d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                              clip-rule="evenodd"
                                          />
                                      </svg>
                                    </a>
              <form action="/produtos/destroy/{{$produto->id}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger delete-btn"> <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 text-red-700"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                >
                    <path
                        fill-rule="evenodd"
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                        clip-rule="evenodd"
                    />
                </svg></button>
            </form>


            </span>
          </td>
        </tr>
      </tbody>

      @empty
      <h1>nada foi encontrado</h1>

      @endforelse
    </table>
  </div>

@endsection
