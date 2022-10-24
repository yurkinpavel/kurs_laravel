@extends('layouts.app')

@php
$title='Список источников'
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

@php
$category_arr = array();
foreach ($all_categories as $item_category) {
$category_arr[$item_category['id']] = $item_category['title'];
}
@endphp

<div class="mt-2 p-2 d-flex flex-wrap justify-content-around">
    @forelse($sources as $item)

    <div class="col-8 mt-2 d-flex border border-secondary">

        <div class="col-10 mt-2 p-2">
            <h5>Источник: "{{$item['title']}}"</h5>
            <p> {{$item['short_discraption']}}</p>
            <p>Для категории "{{$category_arr[$item['category_id']]}}"</p>
            <p>URL {{$item['url_source']}}</p>
        </div>

        <div class="col-2 mt-2 p-2">
            <a href="{{route('sources.edit', $item['id'])}}" class="btn btn-primary mb-2 w-100">Редактировать</a><br>

            <form method="POST" action="{{ route('sources.destroy', ['source' => $item['id']]) }}">
                <input type="hidden" name="_method" value="DELETE">
                @csrf
                <input name="delete_id" type="hidden" value="{{$item['id']}}">
                <button type="submit" class="btn btn-danger mt-2 w-100">Удалить</button>
            </form>
        </div>
    </div>

    @empty
    <div class="p-3 mb-2 bg-light">Нет источников</div>
    @endforelse

</div>
@endsection

@section('footer')
@include('components.footer')
@endsection