@extends('layout')
@section('pagina_titulo','Carrinho')

@section('pagina_conteudo')

<div class='container'>
	<div class='row'>
		<h3>Produtos no carrinho</h3>
		<hr/>
		@forelse ($pedidos as pedido)
			<h5 class='col 16 s12 m6'> Pedido: {{@pedido->id}}</h5>
			<h5 class='col 16 s12 m6'> Criado em: {{@pedido->created_at->format('d/m/y H:i')}}</h5>
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
					@foreach ($pedido->pedido_produtos as $pedido_produtos)
					
				<tr>
				    <td>
					    <img width='100' height='100' src='{{ $pedido_produto->produto->imagem}}'>
					</td>
					<td class='center-align'>
					    <div class='center-align'>
						    <a class='col 14 m4 s4' href='a'>
							    <i class='material-icons small'>add_circle_outline</i>
							</a>
							<span class='col 14 m4 s4'> {{ $pedido_produto->qtd }} </span>
							<a class='col 14 m4 s4' href='#'>
							    <i class='material-icons small'>add_circle_outline</i>
							</a>
						</div>
						<a href='a' class='tooltipped' data-position='right' data-delay='50' data-tooltip='Retirar preoduto de carrinho?'>Retirar produto</a>
		            </td>
					<td> {{ $pedido_produto->produto->nome }} </td>
					<td>R$ {{ number_format($pedido_produto->produto->valor, 2, ',', '.') }}</td>
					<td>R$ {{ number_format($pedido_produto->descontos, 2, ',', '.') }}</td>
					@php 
					    $total_produto = $pedido_produto->valores - $pedido_produto->descontos
						    ;
						$total_pedido = $total_produto;
						@endphp
						<td>R$ {{number_format($total_produto, 2, ',', '.') </td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class'row'>
			    <strong class='col offset-16 offset-m6 offset-s6 14 m4 s4 right-align'>Total do pedido: </strong>
				<span class='col 12 m2 s2'>R$ {{ number_format($total_pedido, 2, ',', '.') }} </span>
			</div>
			<div class='row'>
			    <a class='btn-large tooltipped col 14 s4 m4 offset-18 offset-s8 offset-m8 data-position='top' data-delay='50' data-tooltip='Voltar a pagina inicial para continuar comprando?' href='{{ route('index') }}'>Continuar comprando</a>
			</div>
		@empty
		    <h5>Não há nenhum pedido no carrinho</h5>
		@vendforelse
	</div>
</div>

@endsection