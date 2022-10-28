@extends('layouts.app')

@php
$title='Список категорий'
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

 
@include('admin.components.error') 
 
 
<div class="mt-2 p-2 d-flex flex-wrap justify-content-around">
 

    @forelse($all_categories as $item)

    <div class="col-8 mt-2 d-flex border border-secondary">
    <div class="col-2 mt-2"> <img src="/storage/{{$item['image']}}" class="card-img-top" alt="{{$item['title']}}">  </div>
     <div class="col-8 mt-2 p-2"><h5>{{$item['title']}}</h5> <p>{!!$item['short_discraption']!!}</p><p>Слаг - {{$item['slug']}}</p>   </div>
     <div class="col-2 mt-2 p-2">

     <form method="POST" action="{{ route('categories.store')}}">
        @csrf
        <input name="id" type="hidden" value="{{$item['id']}}">
        <button type="submit" class="btn btn-primary mt-2 w-100">Редактировать</button>
        </form>


        <form method="POST" action="{{ route('categories.destroy', ['category' => $item['id']]) }}">
        <input type="hidden" name="_method" value="DELETE">  
        @csrf
 <!--       <input name="delete_id" type="hidden" value="{{$item['id']}}"> -->
        <button type="submit" class="btn btn-danger mt-2 w-100">Удалить</button>
        </form>
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