@extends('layouts.app')

@php
$title='Создать пользователя'
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
<div class="container">

@include('admin.components.error') 

<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('users.create') }}">
                    <input type="hidden" name="_method" value="HEAD">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Имя</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Имя" require="true" value="{{old('name')}}">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" require="true" value="{{old('email')}}">
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
                            <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin" value="1">
                            <label for="is_private" class="form-label mx-2">Админ</label>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Создать пользователя</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('footer')
@include('components.footer')
@endsection