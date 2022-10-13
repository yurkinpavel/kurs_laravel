@extends('layouts.app')

@php
$title='Список новостей'
@endphp

@section('title')
{{$title}}
@endsection

@section('header')
<h1 class="display-4 text-center">{{$title}}</h1>
@endsection

@section('menu')
@include('admin.components.menu', ['all_categories' => $all_categories]) 
@endsection

@section('content')
<div class="mt-2 p-2 d-flex flex-wrap justify-content-around">
    @forelse($news as $item)

    <div class="col-8 mt-2 d-flex border border-secondary">
    <div class="col-2 mt-2"> <img src="/images/no_photo.jpg" class="card-img-top" alt="{{$item['title']}}">  </div>
     <div class="col-8 mt-2 p-2"><h5>{{$item['title']}}</h5> <p>{{$item['short_discraption']}}</p></div>
     <div class="col-2 mt-2 p-2">
        <a href="{{route('admin.edit_news', $item['id'])}}" class="btn btn-primary mb-2 w-100">Редактировать</a><br>
        <form method="POST" action="{{ route('admin.delete_news') }}">
        @csrf
        <!-- <a href="{{route('admin.delete_news', $item['id'])}}" class="btn btn-danger mt-2">Удалить</a> -->
        <input name="delete_id" type="hidden" value="{{$item['id']}}">
        <button type="submit" class="btn btn-danger mt-2 w-100">Удалить</button>
        </form>
    </div>
    </div>

    @empty
    <div class="p-3 mb-2 bg-light">Нет новостей</div>
    @endforelse

</div>
@endsection

@section('footer')
@include('components.footer')
@endsection