@extends('layouts.app')

@php
$title='Создать категорию'
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
                    <form method="POST" action="{{ route('categories.create') }}" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="HEAD">
                        @csrf
                        <div class="mb-3">
                            <label for="title_news" class="form-label">Название категории</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Название категории" require="true" value="{{old('title')}}">
                        </div>

                        <div class="mb-3">
                            <label for="title_news" class="form-label">Название категории</label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Слаг категории" require="true" value="{{old('slug')}}">
                        </div>


                        <div class="mb-3">
                            <label for="short_discraption" class="form-label">Краткое описание категории</label>
                            <textarea class="form-control" id="short_discraptiont" name="short_discraption" rows="3" placeholder="Краткое описание новости" require="true">{{old('short_discraption')}}</textarea>
                        </div>


                        <div class="mb-3">
                               <label  for="image" class="form-file-label"> Изображение к категории</label>
                               <p><input type="file" name="image" class="form-control" id="image" accept=".jpg, .jpeg, .png"></p>
                        </div>

   
                        <div class="mb-3">
                            <input type="checkbox" class="form-check-input" id="is_private" name="is_private" value="1"  @if (old('is_private') === '1') checked @endif>
                            <label for="is_private" class="form-label mx-2">Приватная категория</label>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Создать категорию</button>
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

@push('scripts')
@include('admin.components.editor')
@endpush