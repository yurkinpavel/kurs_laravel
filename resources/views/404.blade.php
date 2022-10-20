@extends('layouts.app')

@php 
$title='404'
@endphp

@section('title')
{{$title}}
@endsection


@section('header')
<h1 class="text-center">{{$title}}</h1>
@endsection

@section('menu')
@include('components.menu')
@endsection

@section('content')
<div class="mt-2 p-2 text-center col-6 m-auto  text-dark bg-light ">
    <p class="p-3 mb-2">Страница не найдена. Но у нас есть мого других интересных страниц</p>
</div>
@endsection

@section('footer')
@include('components.footer')
@endsection