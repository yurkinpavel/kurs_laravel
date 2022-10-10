@extends('layouts.app')

@php
$title='Агрегатор новостей'
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
<div class="mt-2 p-2  col-6 m-auto">

  <div class="card  p-2">
    <img src="/images/no_photo.jpg" class="card-img-top" alt="Laravel">
    <div class="card-body">
      <h5 class="card-title">Тестовое приложение агрегатора новостей</h5>
      <p class="card-text">
      <h3 class="m-b">Чему Вы научитесь</h3>
      <ul class="row m-r-lg">
        <li>Настраивать веб-сервер и разворачивать приложение;</li>
        <li>Понимать шаблон проектирования MVC;</li>
        <li>Понимать структуру и логику фреймворка;</li>
        <li>Проектировать БД и работать с моделями и формами Laravel;</li>
        <li>Использовать расширения и особенности фреймворка;</li>
        <li>Работать с внешними API;</li>
        <li>Придумывать фейковые новости;</li>
      </ul>
      </p>
    </div>
  </div>
</div>
@endsection

@section('footer')
@include('components.footer')
@endsection