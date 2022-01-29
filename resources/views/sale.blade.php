@extends('template')

@section('title', 'Ventas')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/dataTables/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
	<sales-index :sales="{{json_encode($sales)}}" />
@endsection
