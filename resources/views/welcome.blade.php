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
    <div class="relative m-3 flex flex-wrap mx-auto justify-center">


        @if ($search)
        <div class="container">
            <!-- component -->
            <div class="flex justify-center text-center my-6">
                <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                    <div class="flex-1">
                        
                            <div class="card-panel green center">
                                <strong>Buscando por: {{ $search}}</strong>
                            </div>
                    </div>
                </div>
            </div>
        </div>


        @endif
       
        @forelse($produtos as $produto)
        <div class= "h-40 w-40 bg-white shadow-md rounded-3xl p-2 mx-1 my-3 cursor-pointer" >

            <div class="overflow-x-hidden rounded-2xl relative" >

                <a href="/produtos/{{$produto->id}}"><img class="h-40 w-40 rounded-2xl  object-cover image-fluid"  src="\produtos\{{$produto->imagem}}"></a>
                
            </div>
            <div class="mt-4 pl-2 mb-2 flex justify-between truncate ... ">
                <div>
                    <p class="text-lg font-semibold text-gray-900 mb-0"><a href="/produtos/{{$produto->id}}">{{$produto->NomeProduto}} </a></p>
                    <p class="text-md text-gray-800 mt-0"><a href="/produtos/{{$produto->id}}">R$ {{number_format($produto->preco, 2,",",".") }}</a></p>

                </div>
                
            </div>
        </div>



            @empty
            <p>Nenhum produto encontrado</p>


        @endforelse



    </div>

@endsection
