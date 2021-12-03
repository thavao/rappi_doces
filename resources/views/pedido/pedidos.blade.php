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
            <a href="/usuario/ver/pedido/{{$ped->id}}"> <span class="text-center ml-2 font-semibold">{{$ped->id}}</span></a>
          </td>

          <td class="px-16 py-2">
            <a href="/usuario/ver/pedido/{{$ped->id}}"> <span>R$ {{number_format($ped->precoTotal(), 2,",",".") }}</span></a>
          </td>


          <td class="px-32 py-8">
            <a href="/usuario/ver/pedido/{{$ped->id}}"> <span>{{$ped->datapedido}}</span></a>
          </td>

          


          @if ($ped->status == 'RE')
          <td class="px-16 py-2">
            


              <form action="/usuario/pedidos/cancelar/{{$ped->id}}" method="post">
                @csrf
                @method('put')
                <button type="submit" class="btn btn-danger delete-btn"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
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
