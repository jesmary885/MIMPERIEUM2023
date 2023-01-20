@extends('adminlte::page')

@section('content')

@livewire('financiero.retiro-create',['isopen' => $isopen]) 

   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop