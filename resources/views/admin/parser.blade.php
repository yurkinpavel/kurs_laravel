@extends('layouts.app')

@php
$title='Парсер новостей'
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
                    <form method="POST" action="{{ route('parser.start') }}">
                                        @csrf
 
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Категория </label>
                            <select name="category_id" id="category_id" class="form-control">
                                @forelse($all_categories as $category_item)
                                <option value="{{$category_item['id']}}" >{{$category_item['title']}}</option>
                                @empty
                                <option value="0">Нет категорий</option>
                                @endforelse
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="source_id" class="form-label">Источник</label>
                            <select name="source_id" id="source_id" class="form-control">
                                @forelse($all_sources as $source_item)
                                <option value="{{$source_item['id']}}" >{{$source_item['title']}} - {{$source_item['url_source']}}</option>
                                @empty
                                <option value="0">Нет категорий</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="mb-3">
                        <div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="parsall" name="parsall">
  <label class="form-check-label" for="flexSwitchCheckDefault">Парсить все источники в категории по умолчанию</label>
</div>
</div> 
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Запустить парсер</button>
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