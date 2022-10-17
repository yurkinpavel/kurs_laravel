@extends('layouts.app')

@php
$title='О тестовом проекте'
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
  <img src="https://frontend-scripts.hb.bizmrg.com/unique-hf/svg/logo_gb_light.svg" class="card-img-top" alt="Laravel">
  <div class="card-body">
    <h5 class="card-title">Тестовое приложение агрегатора новостей</h5>
    <p class="card-text">
      <p>Вебинарный курс «Laravel» ориентирован на начинающих специалистов в области PHP-разработки и знакомых с PHP и ООП на базовом уровне. В данном курсе рассмотрим шаблон проектирования MVC, работу и структуру фреймворка, разработаем приложение агрегатора данных. Выполняя домашние задания, вы получите понимание и навыки работы с Laravel и создадите полноценный проект для портфолио.</p></p>
     <p><h3 class="m-b">Чему Вы научитесь</h3><ul class="row m-r-lg"><li>Настраивать веб-сервер и разворачивать приложение;
</li><li>Понимать шаблон проектирования MVC;
</li><li>Понимать структуру и логику фреймворка;
</li><li>Проектировать БД и работать с моделями и формами Laravel;
</li><li>Использовать расширения и особенности фреймворка;
</li><li>Работать с внешними API
</li></ul></p>
  </div>
</div>
</div>
@endsection

@section('footer')
@include('components.footer')
@endsection