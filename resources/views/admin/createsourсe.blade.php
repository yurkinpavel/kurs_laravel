@extends('layouts.app')

@php
$title='Создать источник'
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
                    <form method="POST" action="{{ route('sources.create') }}">
                    <input type="hidden" name="_method" value="HEAD">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Название источника</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Название источника" require="true" value="{{old('title')}}">
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">URL</label>
                            <input type="text" class="form-control" id="url_source" name="url_source" placeholder="URL источника" require="true" value="{{old('url_source')}}">
                        </div>


                        <div class="mb-3">
                            <label for="short_discraption" class="form-label">Краткое описание источника</label>
                            <textarea class="form-control" id="short_discraptiont" name="short_discraption" rows="3" placeholder="Краткое описание источника" require="true">{{old('short_discraption')}}</textarea>
                        </div>


                        <div class="mb-3">
                            <label for="category_id" class="form-label">Категория</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @forelse($all_categories as $category_item)
                                <option value="{{$category_item['id']}}">{{$category_item['title']}}</option>
                                @empty
                                <option value="0">Нет категорий</option>
                                @endforelse
                            </select>

                        </div>
 

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Создать источник</button>
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