@extends('layouts.menu')
@section('title', 'Rappi Doces')
@section('content')




<div class="container">
   <!-- component -->
<div class="flex justify-center my-6">
  <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
    <div class="flex-1">
      @if (Session::has('mensagem-sucesso'))
<div class ="card-panel green center" >
    <strong>{{Session::get('mensagem-sucesso')}}</strong>
</div>

@endif

@if (Session::has('mensagem-falha'))
<div class ="card-panel red place-items-center">
    <strong>{{Session::get('mensagem-falha')}}</strong>
</div>

@endif
      <table class="w-full text-sm lg:text-base" cellspacing="0">
        <thead>
          <tr class="h-12 uppercase">
            <th class="hidden md:table-cell"></th>
            <th class="text-left">Produto</th>
            <th class="lg:text-right text-left pl-5 lg:pl-0">
              <span class="lg:hidden" title="Quantity">Qtd</span>
              <span class="hidden lg:inline">Quantidade</span>
            </th>
            <th class="hidden text-right md:table-cell"> Valor unitário</th>
            <th class="text-right">Valor Total</th>
          </tr>
        </thead>

        @forelse ($carrinho as $car)
        <tbody>
         
          <tr>
            <td class="hidden pb-4 md:table-cell">
              <a href="#">
                <img src="/produtos/{{$car->produto->imagem}}" class="w-20 rounded" alt="Thumbnail">
              </a>
            </td>
            <td>
              <a href="#">
                <p class="mb-2 md:ml-4">{{$car->produto->NomeProduto}}</p>
                <form action="" method="POST">
                  <button type="submit" class="text-gray-700 md:ml-4">
                    <small>(Remove item)</small>
                  </button>
                </form>
              </a>
            </td>
            <td class="justify-center md:justify-end md:flex mt-6">
              <div class="w-20 h-10">
                {{-- <div class="relative flex flex-row w-full h-8">
                <input type="number" value="2" 
                  class="w-full font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-black focus:text-black" />
                </div> --}}
                <p>{{$car->quantidade}}</p>
              </div>
            </td>
            <td class="hidden text-right md:table-cell">
              <span class="text-sm lg:text-base font-medium">
                <p>R$ {{ number_format($car->produto->preco, 2, ',', '.') }}</p>
              </span>
            </td>
            <td class="text-right">
              <span class="text-sm lg:text-base font-medium">
                <p>R$ {{ number_format($car->total(), 2, ',', '.') }}</p>
              </span>
            </td>


            @empty
            <p>Carrinho Vazio :(</p>
                
            
            @endforelse
          
      <hr class="pb-6 mt-6">
          <div class="p-4 mt-6 bg-gray-100 rounded-full">
            <h1 class="ml-2 font-bold uppercase">Observações</h1>
          </div>
          <div class="p-4">
            <p class="mb-4 italic">Se você tem alguma observação para o vendedor, por favor deixe na caixa abaixo</p>
            <textarea class="w-full h-24 p-2 bg-gray-100 rounded"  >
            </textarea>
            <input class:="type="text"  id="observacao" name="observacao" placeholder="Observacao">"
          </div>
        </div>
        <div class="lg:px-2 lg:w-1/2">
          <div class="p-4 bg-gray-100 rounded-full">
            <h1 class="ml-2 font-bold uppercase">Detalhes do Pedido</h1>
          </div>
          <div class="p-4">
            <p class="mb-6 italic"></p>
              <div class="flex justify-between border-b">
              </div>
                <div class="flex justify-between pt-4 border-b">
                  <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                    Total:
                  </div>
                  <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                  <p class="mb-2 md:ml-4">{{$car->produto->preco}}</p>
                  </div>
                </div>
              <a href="#">
                <button class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-green-800 rounded-full shadow item-center hover:bg-green-700 focus:shadow-outline focus:outline-none">
                  <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z"/></svg>
                  <span class="ml-2 mt-5px">Prosseguir com a compra</span>
                </button>
              </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endSection