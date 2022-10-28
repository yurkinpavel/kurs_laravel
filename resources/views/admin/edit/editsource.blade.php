@extends('layouts.app')

@php
$title='Редактировать источник'
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
@if ($source)
<div class="container">
@include('admin.components.error') 
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('sources.update', ['source' => $source['id']]) }}">
                    <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Название источника</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Название источника" require="true" value="{{$source['title']}}">
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Категория</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @forelse($all_categories as $category_item)
                                <option value="{{$category_item['id']}}"  @if ($source['category_id'] == $category_item['id']) selected @endif>{{$category_item['title']}}</option>
                                @empty
                                <option value="0">Нет категорий</option>
                                @endforelse
                            </select>

                        </div>

                        <div class="mb-3">
                            <label for="url_source" class="form-label">URL</label>
                            <input type="text" class="form-control" id="url_source" name="url_source" placeholder="URL источника" require="true" value="{{$source['url_source']}}">
                        </div>

                        <div class="col-12">
                             <input name="id" type="hidden" value="{{$source['id']}}">
                            <button type="submit" class="btn btn-primary">Сохранить источник</button>
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
<h3>Такой новости не существует</h3>
        </div>
    </div>
</div>
@endif
@endsection

@section('footer')
@include('components.footer')
@endsection