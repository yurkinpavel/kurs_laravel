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
            <h3 class="text-center">Добро пожаловать, {{ Auth::user()->name }}</h3>


            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Ваш профиль
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p><strong>Имя: </strong>{{ Auth::user()->name }}</p>
                            <p><strong>E-mail: </strong>{{ Auth::user()->email }}</p>
                            <p><strong>Авторизация: </strong>{{ Auth::user()->type_auth }}</p>
                            <p><strong>Последний раз входили: </strong>{{ Auth::user()->last_login_at }}</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Редактировать профиль
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        <form method="POST" action="{{ route('account.update')}}">
                                             @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Имя</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Имя" require="true" value="{{Auth::user()->name}}">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" require="true" value="{{Auth::user()->email}}">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Пароль</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Пароль"  value="">
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Подтвердить пароль</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Подтвердить пароль"  value="">
                        </div>

    

                        <div class="col-12">
                             <input name="id" type="hidden" value="{{Auth::user()->id}}">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                   
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
    @endsection

    @section('footer')
    @include('components.footer')
    @endsection