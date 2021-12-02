@extends('layouts.menu')
@section('title', 'Rappi Doces')
@section('content')

<div class="mt-2">
    <table class="max-w-2xl mx-auto table-auto">
      <thead class="justify-between">
        <tr class="bg-green-600">
          <th class="px-16 py-2">
            <span class="text-gray-100 font-semibold">ID</span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-100 font-semibold">Preço</span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-100 font-semibold">Data</span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-100 font-semibold">Ação</span>
          </th>
        </tr>
      </thead>

      @forelse ($pedido as $ped)

          <td>
            <a href="usuario/ver/pedido/{{$ped->id}}"> <span class="text-center ml-2 font-semibold">{{$ped->id}}</span></a>
          </td>

          <td class="px-32 py-8">
            <a href="usuario/ver/pedido/{{$ped->id}}"> <span>{{$ped->datapedido}}</span></a>
          </td>

          <td class="px-16 py-2">
            <a href="/usuario/pedidos/cancelar{{$ped->id}}"> <span>R$ {{number_format($ped->precoTotal(), 2,",",".") }}</span></a>
          </td>



        {  <td class="px-16 py-2">
            @if ($ped->status='RE')


              <form action="/usuario/pedidos/cancelar/{{$ped->id}}" method="post">
                @csrf
                @method('put')
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
          @endif
        </tr>
      </tbody>

      @empty
      <h1>Você ainda não possui nenhum pedido :(</h1>
      <h2>Que tal dar uma olhada nos <a href="/"> nossos produtos ?</a></h2>


      @endforelse
    </table>
  </div>

@endsection
