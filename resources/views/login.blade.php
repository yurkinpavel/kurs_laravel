@extends('layouts.main')

@php
$title='Войти'
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
<div class="mt-2 p-2 col-3  m-auto  text-dark bg-light ">


  <form class="form_auth_style" action="#" method="post">
    <div class="form-floating mb-3">
      <input type="email" class="form-control" id="floatingInput" placeholder="login">
      <label for="floatingInput">Логин</label>
    </div>
    <div class="form-floating  mb-3">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Пароль</label>
    </div>

    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Запомнить мои данные
      </label>
    </div>

    <div class="col-12">
    <button type="submit" class="btn btn-primary">Войти в систему</button>
  </div>

  </form>

</div>

@endsection

@section('footer')
@include('components.footer')
@endsection