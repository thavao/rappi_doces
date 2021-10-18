@extends('layouts.menu')
@section('title', $produto->NomeProduto)
@section('content')

<h1>{{$produto->NomeProduto}}</h1>
<h1>{{$produto->preco}}</h1>
<h1>{{$produto->qtdestoque}}</h1>

<img src="\produtos\{{$produto->imagem}}" alt="{{$produto->NomeProduto}}">

@endsection
