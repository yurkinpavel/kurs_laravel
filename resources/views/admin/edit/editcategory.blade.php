@extends('layouts.app')

@php
$title='Редактировать категорию'
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

 

@if ($category)
<div class="container">

@include('admin.components.error') 

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('categories.update', ['category' => $category['id']]) }}">
                    <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="mb-3">
                            <label for="title_news" class="form-label">Название</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Название категории" require="true" value="{{$category['title']}}">
                        </div>

                        <div class="mb-3">
                            <label for="title_news" class="form-label">Слаг</label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Слаг категории" require="true" value="{{$category['slug']}}">
                        </div>

                        <div class="mb-3">
                            <label for="short_discraption" class="form-label">Краткое описание категории</label>
                            <textarea class="form-control" id="short_discraption" name="short_discraption" rows="3" placeholder="Краткое описание категории" require="true">{{$category['short_discraption']}}</textarea>
                        </div>
     
                        <div class="mb-3">
                            <input type="checkbox" class="form-check-input" id="is_private" name="is_private" value="1"  @if ($category['is_private'] === '1') checked @endif>
                            <label for="is_private" class="form-label mx-2">Приватная категория</label>
                        </div>

                        <div class="col-12">
                             <input name="id" type="hidden" value="{{$category['id']}}">
                            <button type="submit" class="btn btn-primary">Сохранить категорию</button>
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
<h3>Такой категории не существует</h3>
        </div>
    </div>
</div>
@endif
@endsection

@section('footer')
@include('components.footer')
@endsection