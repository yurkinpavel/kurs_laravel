@extends('layouts.app')

@php
$title='Категории новостей'
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
<div class="mt-2 p-2 text-center d-flex flex-wrap justify-content-around">
    @forelse($categories as $category_item)

    <div class="card col-2 mt-2 mx-2">
        <img src="/images/no_photo.jpg" class="card-img-top" alt="панорама">
        <div class="card-body">
            <h5 class="card-title">Новости в категории "{{$category_item['title']}}"</h5>

            <a href="{{route('categoryNews', $category_item['slug'])}}" class="btn btn-light">Читать новости</a>
        </div>
    </div>

    @empty
    <div class="p-3 mb-2 bg-light">Нет категорий</div>
    @endforelse

</div>

@endsection

@section('footer')
@include('components.footer')
@endsection