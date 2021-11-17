@extends('layouts.menu')
@section('title', $produto->NomeProduto)
@section('content')


<section class="text-gray-400 bg-white body-font overflow-hidden">
    <div class="container px-5 py-24 mx-auto">
      <div class="lg:w-4/5 mx-auto flex flex-wrap">
        <img alt="imagem de: {{$produto->NomeProduto}}" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="\produtos\{{$produto->imagem}}">
        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
          <h1 class="text-black text-3xl title-font font-medium mb-1">{{$produto->NomeProduto}}</h1>
          <div class="flex mb-4">
          </div>
          <p class="leading-relaxed">{{$produto->descricao}}</p>
          <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-800 mb-5">
            <div class="flex ml-0 items-center">
              <span class="mr-3 ">Quantidade</span>
              <div class="relative left-full">
                <select class="rounded border border-gray-700 focus:ring-2 focus:ring-green-600 bg-transparent appearance-none py-2 focus:outline-none focus:border-green-600 text-black pl-3 pr-10">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                </select>
                <span class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                    <path d="M6 9l6 6 6-6"></path>
                  </svg>
                </span>
              </div>
            </div>
          </div>
          <div class="flex">
            <span class="title-font font-medium text-2xl text-black"><p>R$ {{number_format($produto->preco, 2,",",".")}}</p></span>
            <button class="flex ml-auto text-white bg-green-600 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded">Enviar para o Carrinho</button>
            <button class="rounded-full w-10 h-10 bg-red-600 p-0 border-0 inline-flex items-center justify-center text-white ml-4">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
    
@endsection
