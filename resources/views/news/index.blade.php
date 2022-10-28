@extends('layouts.app')

@php
$title='Новости'
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
    @forelse($news as $item)

    <div class="card col-2 mt-2 mx-2">
    <img src="/storage/{{$item['image']}}" class="card-img-top" alt="{{$item['title']}}">
        <div class="card-body">
            <h5 class="card-title">{{$item['title']}}</h5>

            <a href="{{route('newsOne', $item['id'])}}" class="btn btn-light">Читать</a>
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