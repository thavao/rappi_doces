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
<div class="mt-2">
    <div><h1 style="text-align: center"> <a href="/fornecedores/deletados">Ver Fornecedores deletados </a></h1></div>
    <table class="max-w-5xl mx-auto table-auto">
      <thead class="justify-between">
        <tr class="bg-green-600">

          <th class="px-16 py-2">
            <span class="text-gray-100 font-semibold">Nome</span>
          </th>

          <th class="px-16 py-2">
            <span class="text-gray-100 font-semibold">CNPJ</span>
          </th>

          <th class="px-16 py-2">
            <span class="text-gray-100 font-semibold">Ação</span>
          </th>
        </tr>
      </thead>
      @forelse ($fornecedor as $fornecedor)


          <td>
            <span class="text-center ml-2 font-semibold">{{$fornecedor->nome}}</span>
          </td>



          <td class="px-32 py-8">
             <span>{{$fornecedor->cnpj}}</span>
          </td>



           <td class="px-16 py-2">
            <span class="text-yellow-500 flex">
           <a href="/fornecedores/editar/{{$fornecedor->id}}"> <svg
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

              <form action="/fornecedores/detroy/{{$fornecedor->id}}" method="post">
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
      
 <h1>nada</h1>
      @endforelse
    </table>
  </div>

@endsection
