@extends('layouts.app')

@php
$title='Редактировать новость'
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
@if ($news)
<div class="container">
@include('admin.components.error') 
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('news.update', ['news' => $news['id']]) }}">
                    <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Заголовок новости</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Заголовок новости" require="true" value="{{$news['title']}}">
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Категория новости</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @forelse($all_categories as $category_item)
                                <option value="{{$category_item['id']}}"  @if ($news['category_id'] == $category_item['id']) selected @endif>{{$category_item['title']}}</option>
                                @empty
                                <option value="0">Нет категорий</option>
                                @endforelse
                            </select>

                        </div>



                        <div class="mb-3">
                            <label for="short_discraption" class="form-label">Краткое описание новости</label>
                            <textarea class="form-control" id="short_discraptiont" name="short_discraption" rows="3" placeholder="Краткое описание новости" require="true">{{$news['short_discraption']}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="text" class="form-label">Полное описание новости</label>
                            <textarea class="form-control" id="text" name="text" rows="10" placeholder="Полное описание новости" require="true">{{$news['text']}}</textarea>
                        </div>

                        
                        <div class="mb-3">
                            <input type="checkbox" class="form-check-input" id="is_private" name="is_private" value="1"  @if ($news['is_private'] === '1') checked @endif>
                            <label for="is_private" class="form-label mx-2">Приватная новость</label>
                        </div>

                        <div class="col-12">
                             <input name="id" type="hidden" value="{{$news['id']}}">
                            <button type="submit" class="btn btn-primary">Сохранить новость</button>
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