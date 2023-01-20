@extends('adminlte::page')

@section('content')

    <div class="container py-8">
        <figure class="mb-4">
            <img class="w-full h-80 object-cover object-center" src="{{ Storage::url($category->image) }}" alt="">
        </figure>


        @livewire('category-filter', ['category' => $category])

    </div>

    @stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
