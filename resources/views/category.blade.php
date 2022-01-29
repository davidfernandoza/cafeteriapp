@extends('template')

@section('title', 'Categorias')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/dataTables/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
	<categories-index :categories="{{json_encode($categories)}}" />
@endsection
