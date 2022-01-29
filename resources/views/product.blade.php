@extends('template')

@section('title', 'Productos')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/dataTables/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
	<porducts-index :products="{{json_encode($products)}}" />
@endsection
