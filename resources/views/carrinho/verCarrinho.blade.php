@extends('layouts.menu')
@section('title', 'Rappi Doces')
@section('content')
<div class="container">
    <div class="row">
        <h3>Produtos no carrinho</h3>
        <hr/>
        @forelse ($pedidos as $pedido)
            <h5 class="col 16 s12 m6"> Pedido: {{$pedido->id}}</h5>
            <h5 class="col 16 s12 m6"> criado em: {{$pedido->created_at}}</h5>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Qtd</th>
                        <th>Produto</th>
                        <th>Valor Unit.</th>
                        <th>Desconto</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total_pedido = 0;
                    @endphp
                    @foreach ($pedido->carrinho as $pedido_produto)

                    <tr>
                        <td><img width="100" height="100" src="/produtos/{{$pedido_produto->produto->imagem}}" alt="{{$pedido_produto->produto->NomeProduto}}"></td>
                        <td class="center-align">
                            <div class="col l4 m4 s4">
                                <a class="col l4 m4 s4" href="#">
                                    <i class="material-icons samll">remove_circle_outline</i>
                                </a>
                                <span class="col l4 m4 s4">{{$pedido_produto->quantidade}}</span>
                                <a class="col l4 m4 s4" href="#">
                                    <i class="material-icons samll">add_circle_outline</i>
                                </a>
                            </div>
                            <a href="#" class="tooltipped" data-position="right" data-delay="50" data-tolltip="Retirar produto do carrinho?">Retirar produto</a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>


        @empty

        @endforelse
    </div>
</div>
@endsection
