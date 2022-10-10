@extends('layouts.app')

@php
$title='Страница 3'
@endphp

@section('title')
{{$title}}
@endsection

@section('header')
<h1 class="display-4 text-center">{{$title}}</h1>
@endsection

@section('menu')
@include('admin.components.menu')
@endsection

@section('content')

<div class="mt-2 p-2 text-center col-6 m-auto">

    <div class="card  mt-2 mx-2">
        <div class="card-body">
            <p class="card-text">Некоторый контент на странице 3</p>
        </div>
    </div>

</div>
@endsection

@section('footer')
@include('components.footer')
@endsection