@extends('adminlte::page')

@section('content_header')
    
@stop

@section('content')
 @livewire('admin.pagar-membresia',['isopen' => $isopen]) 
@stop

@section('css')

@stop

@section('js')

@stop