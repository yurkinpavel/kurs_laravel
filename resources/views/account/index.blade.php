@extends('layouts.app')

@php
$title='Личный кабинет'
@endphp

@section('title')
{{$title}}
@endsection

@section('header')
<h1 class="display-4 text-center">{{$title}}</h1>
@endsection

@section('menu')
@include('components.menu')
@endsection

@section('content')
<div class="container">
@include('admin.components.error') 
    <div class="row justify-content-center">
        <div class="col-md-8">
<h3>Добро пожаловать, {{ Auth::user()->name }}</h3> 

    </div>
</div>
@endsection

@section('footer')
@include('components.footer')
@endsection