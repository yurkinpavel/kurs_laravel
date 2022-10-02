@extends('layouts.app')

@php
$title='Страница 2'
@endphp

@section('title')
{{$title}}
@endsection

@section('header')
<h1 class="display-4 text-center">{{$title}}</h1>
@endsection

@section('menu')
@include('admin.menu')
@endsection

@section('content')

<div class="mt-2 p-2 text-center col-6 m-auto">

    <div class="card  mt-2 mx-2">
        <div class="card-body">
            <p class="card-text">Некоторый контент на странице 2</p>
        </div>
    </div>

</div>

@endsection

@section('footer')
@include('footer')
@endsection