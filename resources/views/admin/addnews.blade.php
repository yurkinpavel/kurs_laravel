@extends('layouts.main')

@php
$title='Добавить новость'
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
<div class="mt-2 p-2 text-center col-6 m-auto text-dark bg-light">

  <form class="form_auth_style" action="#" method="post">
    <div class="form-floating mb-3">
      <input type="email" class="form-control" id="floatingInputTitle" placeholder="Заголовок новости">
      <label for="floatingInput">Заголовок новости</label>
    </div>
    <div class="mb-3">
      <label for="floatingInputShort" class="form-label">Краткое описаниние новости</label>
      <textarea class="form-control" id="floatingInputShort" rows="3" placeholder="Краткое описаниние новости"></textarea>
    </div>

    <div class="mb-3">
      <label for="floatingInputText" class="form-label">Полное описаниние новости</label>
      <textarea class="form-control" id="floatingInputText" rows="10" placeholder="Полное описаниние новости"></textarea>
    </div>

    <div class="col-12">
      <button type="submit" class="btn btn-primary">Отправить новость</button>
    </div>

  </form>

</div>
@endsection

@section('footer')
@include('footer')
@endsection