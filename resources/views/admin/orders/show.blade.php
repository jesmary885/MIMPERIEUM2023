@extends('adminlte::page')

@section('content')

    @livewire('status-order', ['order' => $order])

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop