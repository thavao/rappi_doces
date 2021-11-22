@extends('layouts.menu')
@section('title', 'Rappi Doces')
@section('content')

<div class="container">
    <div class="row">
        <h3>Produtos no carrinho</h3>
        <hr/>
        @if (Session::has('mensagem-sucesso'))
        <div class ="card-panel green">
            <strong>{{Session::get('mensagem-sucesso')}}</strong>
        </div>

        @endif

        @if (Session::has('mensagem-falha'))
        <div class ="card-panel red">
            <strong>{{Session::get('mensagem-falha')}}</strong>
        </div>

        @endif






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
			<td>   {{ $pedido_produto->produto->nome }} </td>
			<td>R$ {{ number_format($pedido_produto->valor, 2, ',' , '.')}} </td>
			<td>R$ {{ number_format($pedido_produto->descontos, 2, ',' , '.')}} </td>
			@php
				$total_produto = $pedido_produto->valores - $pedido_produto->descontos;
				$total_pedido += $total_produto;
			@endphp
			<td>R$ {{number_format($total_produto, 2, ', ', '.')}}</td>
                    </tr>
			@endforeach
                </tbody>
            </table>
	    <div class="row">
		<strong class="col offset-16 offset-m6 offset-s6 l4 m4 s4 right-align">Total do produto: </strong>
		<span class="col 12 m2 s2">R$ {{number_format($total_pedido, 2, ', ', '.')}} </span>
	    </div>
            <div class="row">
		<a class="btn-large tooltiped col l4 s4 m4 offset-18 offset-m8 offset-s8"
		data-position="top" data-delay="50" data-tooltip="Voltar a página inicial para continuar comprando?"
		href="/">Continuar comprando</a>
	    </div>
	@empty
	     <h5>Não há nenhum pedido no carrinho</h5>
        @endforelse
    </div>
</div>
@endsection
