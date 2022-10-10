@extends('layouts.app')

@php
$title='Создать новость'
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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.create') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="title_news" class="form-label">Заголовок новости</label>
                            <input type="text" class="form-control" id="title_news" name="title_news" placeholder="Заголовок новости" require="true" value="{{old('title_news')}}">
                        </div>

                        <div class="mb-3">
                            <label for="news_category" class="form-label">Категория новости</label>
                            <select name="news_category" id="news_category" class="form-control">
                                @forelse($all_categories as $category_item)
                                <option value="{{$category_item['id']}}"  @if (old('news_category') == $category_item['id']) selected @endif>{{$category_item['title']}}</option>
                                @empty
                                <option value="0">Нет категорий</option>
                                @endforelse
                            </select>

                        </div>



                        <div class="mb-3">
                            <label for="short_discraption" class="form-label">Краткое описаниние новости</label>
                            <textarea class="form-control" id="short_discraptiont" name="short_discraption" rows="3" placeholder="Краткое описаниние новости" require="true">{{old('short_discraption')}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="full_news" class="form-label">Полное описаниние новости</label>
                            <textarea class="form-control" id="full_news" name="full_news" rows="10" placeholder="Полное описаниние новости" require="true">{{old('full_news')}}</textarea>
                        </div>

                        
                        <div class="mb-3">
                            <input type="checkbox" class="form-check-input" id="is_private" name="is_private" value="1"  @if (old('is_private') === '1') checked @endif>
                            <label for="is_private" class="form-label mx-2">Приватная новость</label>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Отправить новость</button>
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