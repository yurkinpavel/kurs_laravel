@extends('layouts.app')

@php
$title='Редактировать пользователя'
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
@if ($user)
<div class="container">
@include('admin.components.error') 
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', ['user' => $user['id']]) }}">
                    <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Имя</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Имя" require="true" value="{{$user['name']}}">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" require="true" value="{{$user['email']}}">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Пароль</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Пароль" require="true" value="">
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Подтвердить пароль</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Подтвердить пароль" require="true" value="">
                        </div>

   
                        <div class="mb-3">
                            <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin" value="1"  
                            @if ($user['is_admin'] === true) 
                            checked 
                            @endif>
                            <label for="is_private" class="form-label mx-2">Админ</label>
                        </div>

                        <div class="col-12">
                             <input name="id" type="hidden" value="{{$user['id']}}">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<h3>Такого пользователя не существует</h3>
        </div>
    </div>
</div>
@endif
@endsection

@section('footer')
@include('components.footer')
@endsection